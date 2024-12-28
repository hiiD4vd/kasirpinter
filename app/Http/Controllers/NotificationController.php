<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Mengambil notifikasi dari session
        $notifications = session('notification', []);  // Jika session tidak ada, kita set sebagai array kosong

        // Mengirimkan data notifications ke view
        return view('dashboard.index', compact('notifications'));
    }

    public function store(Request $request)
    {
        // Menambahkan notifikasi baru
        $notifications = session('notification', []);

        $newNotification = [
            'message' => $request->message,
            'is_read' => false,
        ];

        $notifications[] = $newNotification; // Menambahkan ke array notifikasi

        // Menyimpan kembali ke session
        session(['notification' => $notifications]);

        return redirect()->route('notification.index')->with('success', 'Notifikasi berhasil ditambahkan.');
    }

    public function markAsRead($index)
    {
        // Mengambil notifikasi dari session
        $notifications = session('notification', []);

        // Menandai notifikasi sebagai dibaca
        if (isset($notifications[$index])) {
            $notifications[$index]['is_read'] = true;
            session(['notification' => $notifications]);
        }

        return redirect()->route('notification.index');
    }
}
