<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Pemesanan</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/invoice.css')); ?>">
</head>
<body>
    <header>
        <h1>Rincian Pemesanan Anda</h1>
    </header>

    <div class="logo-container">
        <a href="<?php echo e(url('/')); ?>">
        <img src="<?php echo e(asset('images/profile/Logo.png')); ?>" alt="Logo">
        </a>
    </div>

    <div class="container">
        <p><strong>Nama:</strong> <?php echo e($booking->name); ?></p>
        <p><strong>Email:</strong> <?php echo e($booking->email); ?></p>
        <p><strong>Tanggal Penyewaan:</strong> <?php echo e($booking->date); ?></p>
        <p><strong>Jam Mulai:</strong> <?php echo e($booking->time); ?></p>
        <p><strong>Sistem Pemancingan:</strong> <?php echo e($booking->duration); ?></p>
        <p><strong>Opsi Harian:</strong> <?php echo e($booking->hourly_option); ?></p>
        <p><strong>Harga Sewa:</strong> Rp <?php echo e(number_format($booking->price, 2, ',', '.')); ?></p> <!-- Displaying the rental price -->
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
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/invoice.blade.php ENDPATH**/ ?>