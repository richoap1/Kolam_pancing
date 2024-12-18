<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Pemesanan</title>
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
</head>
<body>
    <header>
        <h1>Rincian Pemesanan Anda</h1>
    </header>

    <div class="logo-container">
        <a href="{{ url('/') }}">
        <img src="{{ asset('images/profile/Logo.png') }}" alt="Logo">
        </a>
    </div>

    <div class="container">
        <p><strong>Nama:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Tanggal Penyewaan:</strong> {{ $booking->date }}</p>
        <p><strong>Jam Mulai:</strong> {{ $booking->time }}</p>
        <p><strong>Sistem Pemancingan:</strong> {{ $booking->duration }}</p>
        <p><strong>Opsi Harian:</strong> {{ $booking->hourly_option }}</p>
        <p><strong>Harga Sewa:</strong> Rp {{ number_format($booking->price, 2, ',', '.') }}</p> <!-- Displaying the rental price -->
        <p>Terima kasih telah memesan di Kolam Pancing Chocho.</p>
    </div>

    <div class="back-button">
        <a href="javascript:history.back()">Kembali</a>
    </div>

    <footer>
        <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
    </footer>
</body>
</html>
