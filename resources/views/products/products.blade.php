<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Kolam Pancing Chocho</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- Link to the appropriate CSS -->
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-content">
                <h1>Selamat Datang di Kolam Pancing Chocho</h1>
                <p>Sistem Penyewaan Kolam Pancing yang Mudah dan Praktis</p>
            </div>
        </div>
    </header>

    <nav>
        <a href="/">Beranda</a>
        <a href="/fasilitas">Fasilitas</a>
        <a href="/pemesanan.html">Pesan Sekarang</a>
        <a href="/history">History</a>
        <a href="/admin">Admin Page</a> <!-- Ensure correct path to admin page -->

        <div class="profile-dropdown">
            <button class="dropbtn">
                <img src="{{ asset('assets/profile_logo.png') }}" alt="Profile Logo" style="width: 30px; height: auto;">
            </button>
            <div class="dropdown-content">
                <a href="/profile">Profil</a>
                <a href="/login">Login</a>
                <a href="/logout">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Daftar Produk</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($products->isEmpty())
                    <tr>
                        <td colspan="6">Tidak ada produk ditemukan.</td>
                    </tr>
                @else
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ htmlspecialchars($product->name) }}</td>
                            <td>{{ htmlspecialchars($product->description) }}</td>
                            <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td><img src="{{ asset('assets/' . $product->image_url) }}" alt="{{ htmlspecialchars($product->name) }}"></td>
                            <td>
                                @if(session('admin_loggedin')) <!-- Only show action buttons for admin -->
                                    <form action="/update_product/{{ $product->id }}" method="get" style="display:inline;">
                                        <button type="submit" class="btn edit-btn">Edit</button>
                                    </form>
                                    <form action="/delete_product/{{ $product->id }}" method="post" style="display:inline;" onsubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
                                        @csrf <!-- Include CSRF token -->
                                        <button type="submit" class="btn delete-btn">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="button-container">
            <form action="/admin" method="get">
                <button type="submit" class="btn back-btn">Kembali ke Dashboard</button>
            </form>
        </div>
    </div>

    <footer>
        <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
    </footer>
</body>
</html>
    