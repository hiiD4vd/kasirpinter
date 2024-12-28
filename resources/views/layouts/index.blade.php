<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
        }

        .sidebar {
            background-color: #4c1d95;
            color: white;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar a {
            color: #c3b4f3;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            font-size: 14px;
        }

        .sidebar a:hover {
            color: white;
        }

        .content {
            padding: 20px;
            width: 100%;
        }

        .navbar {
            background-color: white;
            border-bottom: 1px solid #e3e3e3;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .search-bar {
            flex-grow: 1;
            margin: 0 20px;
        }

        .navbar input[type="search"] {
            width: 100%;
            padding: 8px 15px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        .navbar .profile {
            display: flex;
            align-items: center;
        }

        .navbar .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar .profile-dropdown {
            position: relative;
        }

        .navbar .profile-dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 1000;
            width: 200px;
        }

        .dropdown-menu a {
            color: #333;
            padding: 10px;
            display: block;
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            background-color: #f4f5f7;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2 class="text-center">Sudah Pintar</h2>
            <nav>
                <a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i> Dashboard</a>
                <a href="{{ route('products.index') }}"><i class="fas fa-box"></i> Products</a>
                <a href="{{ route('transaction.index') }}"><i class="fas fa-receipt"></i> Transactions</a>
                <a href="{{ route('categories.index') }}"><i class="fas fa-th"></i> Categories</a>
                <a href="{{ route('discount.index') }}"><i class="fas fa-tags"></i> Discounts</a>
                <a href="{{ route('laporan.keuangan') }}"><i class="fas fa-chart-line"></i> Financial Reports</a>
                <a href="{{ route('karyawan.index') }}"><i class="fas fa-chart-line"></i> Manajement Karyawan</a>
                <a href="{{ route('transaction.profit_report') }}"><i class="fas fa-chart-bar"></i> Profit Report</a>




            </nav>
        </div>

        <!-- Main Content -->
        <div class="content w-100">
            <!-- Navbar -->
            <div class="navbar">
                <form class="search-bar">
                    <input type="search" placeholder="Search...">
                </form>
                {{-- <i class="fas fa-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ count($notifications) }} <!-- Menampilkan jumlah notifikasi -->
                </span>
                <ul class="dropdown-menu dropdown-menu-end">
                    @forelse ($notifications as $notif)
                        <li><a class="dropdown-item" href="#">{{ $notif['message'] }}</a></li>
                    @empty
                        <li><a class="dropdown-item text-muted" href="#">Tidak ada notifikasi baru</a></li>
                    @endforelse
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-center" href="{{ route('notification.index') }}">Lihat semua
                            notifikasi</a></li>
                </ul> --}}

                <div class="profile-dropdown">
                    <div class="profile">
                        @if (auth()->check())
                            <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" alt="Foto Profil">
                        @else
                            <p>wkwkwkkwk</p>
                        @endif

                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down ml-2"></i>
                    </div>
                    <div class="dropdown-menu">
                        <a href="{{ route('profile.edit') }}">Profile</a>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('foto_profil').addEventListener('change', function(event) {
                    const file = event.target.files[0]; // Ambil file yang diunggah
                    if (file) {
                        const reader = new FileReader(); // Membaca file
                        reader.onload = function(e) {
                            const preview = document.getElementById('preview-foto');
                            preview.src = e.target.result; // Perbarui src gambar
                        }
                        reader.readAsDataURL(file); // Membaca file sebagai URL data
                    }
                });
            </script>

            <!-- Page Content -->
            <div>
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
