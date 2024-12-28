<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
    
        // Filter berdasarkan pencarian nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Filter berdasarkan kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
    
        // Filter berdasarkan harga minimum
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
    
        // Filter berdasarkan harga maksimum
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
    
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();
    
        // Ambil produk sesuai filter dengan paginasi
        $products = $query->paginate(10);
    
        return view('products.index', compact('products', 'categories'))->with('filters', $request->all());
    }
    
    

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.create', compact('categories', 'suppliers'));
    }



    public function store(Request $request)
    {

        // dd($validated);

        $validated = $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'harga_beli' => 'required|numeric', // Validasi harga beli
        'harga_jual' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);


        if ($request->hasFile('photo')) {
            // Log::info('File photo ditemukan. Memulai proses penyimpanan...');
            $photoPath = $request->file('photo')->store('products', 'public');
            // Log::info('Photo disimpan ke path: ' . $photoPath);
        } else {
            // Log::warning('File photo tidak ditemukan dalam request.');
            $photoPath = null;
        }


        Product::create([
            'name' => $validated['name'],
            'stock' => $validated['stock'],
            'price' => $validated['price'],
            'harga_beli' => $validated['harga_beli'],  // Simpan harga beli
            'harga_jual' => $validated['harga_jual'],  // Simpan harga jual
            'category_id' => $validated['category_id'],
            'supplier_id' => $validated['supplier_id'] ?? null,
            'photo' => $photoPath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        // $product = Product::findOrFail($product->id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'harga_beli' => 'required|numeric',  // Validasi harga beli
        'harga_jual' => 'required|numeric',  // Validasi harga jual
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar baru
        ]);

        if ($request->hasFile('photo')) {
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }
            $photoPath = $request->file('photo')->store('products', 'public');
            $validated['photo'] = $photoPath;
        }

        $oldData = $product->toArray();
        $product->update($validated);
        $newData = $product->toArray();


        $user = Auth::user();
        Log::info('Product updated', [
            'updated_by' => $user ? $user->name : 'Guest',
            'product_id' => $product->id,
            'old_data' => $oldData,
            'new_data' => $newData,
            'timestamp' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }



    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->restore();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dipulihkan.');
    }


    public function deleted()
    {
        $deletedProducts = Product::onlyTrashed()->get();
        return view('products.deleted', compact('deletedProducts'));
    }
}
