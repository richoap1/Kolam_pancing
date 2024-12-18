<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan - Kolam Pancing Chocho</title>
    <link rel="stylesheet" href="{{ asset('css/pemesanan.css') }}">
    <script>
        function toggleAdditionalOptions() {
            const durationSelect = document.getElementById('duration');
            const additionalOptions = document.getElementById('additional-options');

            // Show or hide additional options based on the selection
            if (durationSelect.value === 'Harian') {
                additionalOptions.style.display = 'block'; // Show options for "Harian"
            } else {
                additionalOptions.style.display = 'none'; // Hide options for "Kiloan"
            }
        }
    </script>
</head>
<body>
<header>
    <h1>Pemesanan Kolam Pancing</h1>
</header>

<nav>
    <a href="{{ url('/') }}">Beranda</a>
    <a href="{{ url('/fasilitas') }}">Fasilitas</a>
    <a href="{{ url('/pemesanan') }}">Pesan Sekarang</a>
    <a href="{{ url('/history') }}">History</a>
</nav>

<div class="container">
    <h2>Form Pemesanan</h2>
    <form action="{{ url('/bookings') }}" method="POST">
        @csrf <!-- CSRF protection -->
        
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required> <!-- Pre-fill email field -->

        <label for="date">Tanggal Penyewaan:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Jam Mulai:</label>
        <input type="time" id="time" name="time" required>

        <label for="duration">Sistem Pemancingan:</label>
        <select id="duration" name="duration" required onchange="toggleAdditionalOptions()">
            <option value="Kiloan">Kiloan</option>
            <option value="Harian">Harian</option>
        </select>

        <div id="additional-options" style="display:none;"> <!-- Additional options for daily system -->
            <label for="hourly">Pilih Opsi Harian:</label>
            <select id="hourly" name="hourly_option" required>
                <option value="per jam">Sewa per jam: Rp 50.000</option>
                <option value="setengah hari">Sewa setengah hari: Rp 250.000</option>
                <option value="sehari penuh">Sewa sehari penuh: Rp 400.000</option>
            </select>
        </div>

        <button type="submit">Pesan Sekarang</button> <!-- Submit booking request -->
    </form>
</div>

<footer>
    <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
</footer>
</body>
</html>
