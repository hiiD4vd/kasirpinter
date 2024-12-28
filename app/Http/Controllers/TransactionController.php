<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\Pengguna;
use App\Models\Diskon;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{


    public function index()
    {
        $transactions = Transaction::with(['user', 'details.product'])->get();
        return view('transaction.index', compact('transactions'));
    }


    public function create()
    {
        $products = Product::all();
        $users = User::all();
        $diskon = Diskon::all();
        return view('transaction.create', compact('products', 'users', 'diskon'));
    }


    public function store(Request $request)
    {
        Log::info('Data yang diterima: ', $request->all());

        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'total' => 'required|numeric',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric',
            'products.*.subtotal' => 'required|numeric',
            'tema_diskon' => 'nullable|string',
        ]);


        DB::beginTransaction();

        try {

            $transaction = Transaction::create([
                'users_id' => $validated['id_user'],
                'total' => $validated['total'],
                'tema_diskon' => $request->tema_diskon,
            ]);


            foreach ($validated['products'] as $product) {
                Log::info('Menyimpan produk ke detail transaksi: ', $product);


                $productModel = Product::find($product['id']);
                if ($productModel && $productModel->stock >= $product['quantity']) {

                    $productModel->decrement('stock', $product['quantity']);


                    $transaction->details()->create([
                        'product_id' => $product['id'],
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                        'subtotal' => $product['subtotal'],
                    ]);
                } else {

                    throw new \Exception('Stok produk ' . ($productModel->name ?? 'tidak diketahui') . ' tidak cukup.');
                }
            }

            $receipt = Receipt::create([
                'transaction_id' => $transaction->id,
                'receipt_code' => 'REC-' . strtoupper(uniqid()),
                'printed_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('receipt.print', ['transaction' => $transaction->id])
                ->with('success', 'Transaksi berhasil dibuat. Silakan cetak resi.');
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Error saat menyimpan transaksi: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function printReceipt($transactionId)
    {
        $transaction = Transaction::with('details', 'user')->findOrFail($transactionId);
        $receipt = Receipt::where('transaction_id', $transactionId)->firstOrFail();

        return view('receipts.print', compact('transaction', 'receipt'));
    }


    public function show($id)
    {
        $transaction = Transaction::with('user')->findOrFail($id);
        return view('transaction.show', compact('transaction'));
    }

    public function profitReport()
    {
        $products = Product::all(); // Mengambil semua produk dari database

        // Hitung keuntungan per produk dan total keuntungan berdasarkan stok
        $profitReport = $products->map(function ($product) {
            $profit = $product->harga_jual - $product->harga_beli;
            $total_profit = $profit * $product->stock; // Keuntungan total per produk
            return [
                'name' => $product->name,
                'profit' => $profit,
                'harga_beli' => $product->harga_beli,
                'harga_jual' => $product->harga_jual,
                'total_profit' => $total_profit,
                'stock' => $product->stock
            ];
        });

        // Mengirim data ke view
        return view('transaction.profit_report', compact('profitReport'));
    }
}
