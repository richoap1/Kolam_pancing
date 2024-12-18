<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
<header>
    <h1>Profil Pengguna</h1>
</header>

<nav>
    <a href="{{ url('/') }}">Beranda</a>
    <a href="{{ url('/pemesanan') }}">Pesan Sekarang</a>
    <a href="{{ url('/history') }}">History</a>
    <a href="{{ url('/register') }}">Registrasi</a>
</nav>

<div class="container">
    <h2>Informasi Profil</h2>
    <form action="{{ url('/update_profile') }}" method="POST"> <!-- Adjust to correct URL -->
        @csrf <!-- CSRF protection -->
        <label for="username">Username:</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

        <label for="gender">Jenis Kelamin:</label>
        <select name="gender" required>
            <option value="L" {{ $user->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ $user->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
            <option value="J" {{ $user->gender == 'J' ? 'selected' : '' }}>Jomok</option>
        </select>

        <label for="address">Alamat:</label>
        <input type="text" name="address" value="{{ old('address', $user->address) }}" required>

        <button type="submit">Perbarui Profil</button>
    </form>

    <form action="{{ route('delete_profile') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile?');">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Profile</button>
</form>



    <div class="back-button">
        <a href="javascript:history.back()">Kembali</a>
    </div>
</div>

<footer>
    <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
</footer>
</body>
</html>
