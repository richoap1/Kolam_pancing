<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>History Pemesanan</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/history.css')); ?>">
</head>
<body>
<header>
    <h1>History Pemesanan Anda</h1>
</header>

<nav>
    <a href="<?php echo e(url('/')); ?>">Beranda</a>
    <a href="<?php echo e(url('/pemesanan')); ?>">Pesan Sekarang</a>
    <a href="<?php echo e(url('/history')); ?>">History</a>
    <a href="<?php echo e(url('/register')); ?>">Registrasi</a>

    <div class="profile-dropdown">
        <button class="dropbtn">
        <img src="<?php echo e(asset('images/profile/profile_logo.png')); ?>" style="width:30px" alt="User Profile Picture">
        </button>
        <div class="dropdown-content">
            <?php if(Auth::check()): ?> <!-- Check if user is logged in -->
                <a href="<?php echo e(url('/profile')); ?>">Profil</a>
                <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <a type="submit" class="btn logout-btn">Logout</a>
                </form>
            <?php else: ?>
                <a href="<?php echo e(url('/login')); ?>">Login</a>
            <?php endif; ?>
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
            <?php if($bookings->isEmpty()): ?>
                <tr>
                    <td colspan="8">Tidak ada pemesanan ditemukan.</td>
                </tr>
            <?php else: ?>
                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($booking->name); ?></td>
                        <td><?php echo e($booking->email); ?></td>
                        <td><?php echo e($booking->date); ?></td>
                        <td><?php echo e($booking->time); ?></td>
                        <td><?php echo e($booking->duration); ?></td>
                        <td><?php echo e($booking->hourly_option); ?></td>
                        <td>Rp <?php echo e(number_format($booking->price, 2, ',', '.')); ?></td> <!-- Displaying price -->
                        <td><a href="<?php echo e(url('/invoice/' . $booking->id)); ?>">Lihat Invoice</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/history.blade.php ENDPATH**/ ?>