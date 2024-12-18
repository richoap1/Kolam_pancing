<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>History Pemesanan</title>
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
</head>
<body>
<header>
    <h1>History Pemesanan Anda</h1>
</header>

<nav>
    <a href="{{ url('/') }}">Beranda</a>
    <a href="{{ url('/pemesanan') }}">Pesan Sekarang</a>
    <a href="{{ url('/history') }}">History</a>
    <a href="{{ url('/register') }}">Registrasi</a>

    <div class="profile-dropdown">
        <button class="dropbtn">
        <img src="{{ asset('images/profile/profile_logo.png') }}" style="width:30px" alt="User Profile Picture">
        </button>
        <div class="dropdown-content">
            @if (Auth::check()) <!-- Check if user is logged in -->
                <a href="{{ url('/profile') }}">Profil</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <a type="submit" class="btn logout-btn">Logout</a>
                </form>
            @else
                <a href="{{ url('/login') }}">Login</a>
            @endif
        </div>
    </div>
</nav>

<div class="container">
    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Sistem Pemancingan</th>
                <th>Opsi Harian</th>
                <th>Harga Sewa</th> <!-- Column for pricing -->
                <th>Aksi</th> <!-- Column for actions -->
            </tr>
        </thead>
        <tbody>
            @if ($bookings->isEmpty())
                <tr>
                    <td colspan="8">Tidak ada pemesanan ditemukan.</td>
                </tr>
            @else
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->duration }}</td>
                        <td>{{ $booking->hourly_option }}</td>
                        <td>Rp {{ number_format($booking->price, 2, ',', '.') }}</td> <!-- Displaying price -->
                        <td><a href="{{ url('/invoice/' . $booking->id) }}">Lihat Invoice</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="back-button">
        <a href="javascript:history.back()">Kembali</a> <!-- Back button -->
    </div>
</div>

<footer>
    <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
</footer>
</body>
</html>
