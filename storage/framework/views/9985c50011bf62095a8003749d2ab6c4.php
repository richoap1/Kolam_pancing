<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">
</head>
<body>
<header>
    <h1>Profil Pengguna</h1>
</header>

<nav>
    <a href="<?php echo e(url('/')); ?>">Beranda</a>
    <a href="<?php echo e(url('/pemesanan')); ?>">Pesan Sekarang</a>
    <a href="<?php echo e(url('/history')); ?>">History</a>
    <a href="<?php echo e(url('/register')); ?>">Registrasi</a>
</nav>

<div class="container">
    <h2>Informasi Profil</h2>
    <form action="<?php echo e(url('/update_profile')); ?>" method="POST"> <!-- Adjust to correct URL -->
        <?php echo csrf_field(); ?> <!-- CSRF protection -->
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo e(old('username', $user->username)); ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required>

        <label for="gender">Jenis Kelamin:</label>
        <select name="gender" required>
            <option value="L" <?php echo e($user->gender == 'L' ? 'selected' : ''); ?>>Laki-laki</option>
            <option value="P" <?php echo e($user->gender == 'P' ? 'selected' : ''); ?>>Perempuan</option>
            <option value="J" <?php echo e($user->gender == 'J' ? 'selected' : ''); ?>>Jomok</option>
        </select>

        <label for="address">Alamat:</label>
        <input type="text" name="address" value="<?php echo e(old('address', $user->address)); ?>" required>

        <button type="submit">Perbarui Profil</button>
    </form>

    <form action="<?php echo e(route('delete_profile')); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile?');">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
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
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/profile.blade.php ENDPATH**/ ?>