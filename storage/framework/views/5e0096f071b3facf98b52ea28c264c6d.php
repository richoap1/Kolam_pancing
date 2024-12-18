<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas - Kolam Pancing Chocho</title>
    <link rel="stylesheet" href="css/fasilitas.css"> <!-- Menghubungkan ke CSS -->
</head>
<body>

<header>
    <h1>Fasilitas di Kolam Pancing Chocho</h1>
</header> 
    <nav>
    <a href="<?php echo e(route('home')); ?>">Beranda</a>
        <a href="pemesanan.html">Pesan Sekarang</a>
        <a href="history.php">History</a>
        <a href="register.php">Registrasi</a>
        <a href="products.php">List Produk</a>

        <div class="profile-dropdown">
            <button class="dropbtn">
                <img src="assets/profile_logo.png" alt="Profile Logo" style="width: 30px; height: auto;">
                <!-- Remove the notification count or properly calculate and display it -->
            </button>
            <div class="dropdown-content">
                <a href="profile.php">Profil</a>
                <a href="login.php">Login</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <!-- <div class="logo-container">
        <a href="home.html">
            <img src="assets/Logo.png" alt="logo">
        </a>
    </div> -->

<div class="container">
    <h2>Fasilitas Kolam Pancing</h2>
    <p>Kami menawarkan berbagai fasilitas untuk memastikan pengalaman memancing Anda menyenangkan:</p>

    <div class="facility-item" onclick="toggleDetails(this)">
        <h3>Kolam Kiloan</h3>
        <p class="description">Sistem memancing dengan harga berdasarkan berat ikan yang didapatkan.</p>
        <p class="details" style="display:none;">Menikmati petualangan memancing yang memuaskan!</p>
    </div>

    <div class="facility-item" onclick="toggleDetails(this)">
        <h3>Kolam Harian</h3>
        <p class="description">Paket penyewaan kolam harian yang terjangkau dengan berbagai pilihan durasi.</p>
        <p class="details" style="display:none;">Ideal untuk kegiatan sehari-hari dengan harga terjangkau.</p>
    </div>

    <div class="facility-item" onclick="toggleDetails(this)">
        <h3>Peralatan Lengkap</h3>
        <p class="description">Disediakan semua peralatan memancing untuk memudahkan Anda.</p>
        <p class="details" style="display:none;">
            <a href="products.php" style="text-decoration: none; color: inherit;">Kami menyediakan joran, umpan, dan perlengkapan lainnya</a>
        </p>
    </div>    

    <div class="facility-item" onclick="toggleDetails(this)">
        <h3>Fasilitas Makan dan Minum</h3>
        <p class="description">Rasakan hidangan lezat di kafe kami yang terletak di dekat kolam pancing.</p>
        <p class="details" style="display:none;">Menu kami mencakup berbagai pilihan makanan dan minuman.</p>
    </div>

    <h2>Informasi Tambahan</h2>
    <p>Untuk pertanyaan lebih lanjut, silakan hubungi kami di <a href="mailto:info@chocho-pancing.com">info@chocho-pancing.com</a></p>
</div>

<!-- <div class="back-button">
    <a href="javascript:history.back()">Kembali</a>
</div> -->

<footer>
    <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
</footer>

<script>
    function toggleDetails(item) {
        const details = item.querySelector('.details');
        details.style.display = details.style.display === 'none' ? 'block' : 'none';
    }
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/fasilitas.blade.php ENDPATH**/ ?>