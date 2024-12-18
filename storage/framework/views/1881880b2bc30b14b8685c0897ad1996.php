<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kolam Pancing Chocho</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>Dashboard Admin Kolam Pancing Chocho</h1>
    </header>

    <nav>
        <a href="<?php echo e(url('/')); ?>">Beranda</a>
        <a href="<?php echo e(url('/products')); ?>">Daftar Produk</a>
        <a href="<?php echo e(url('/add_products')); ?>">Tambah Produk</a>

        <div class="profile-dropdown">
            <button class="dropbtn">
                <img src="<?php echo e(asset('images/profile/profile_logo.png')); ?>" alt="Profile Logo" style="width: 30px;">
            </button>
            <div class="dropdown-content">
                <?php if(Auth::check()): ?> <!-- Check if the user is logged in -->
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

    <div class="logo-container">
        <a href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('images/profile/Logo.png')); ?>" alt="logo">
        </a>
    </div>

    <div class="container">
        <h2>Akses Halaman:</h2>
        <ul>
            <li><button onclick="window.location.href='<?php echo e(url('products/add_products')); ?>'">Tambah Produk</button></li>
            <li><button onclick="window.location.href='<?php echo e(url('products/products')); ?>'">Daftar Produk</button></li>
        </ul>
        <h3>Selamat datang, Admin!</h3>
        <p>Anda berhasil masuk ke dashboard admin.</p>
    </div>

    <footer>
        <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
    </footer>

    <script>
        // JavaScript to handle the dropdown behavior
        document.addEventListener("DOMContentLoaded", function() {
            const dropdown = document.querySelector('.profile-dropdown');
            const dropdownContent = document.querySelector('.dropdown-content');

            dropdown.addEventListener('click', function() {
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });

            // Close the dropdown if clicked outside
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    dropdownContent.style.display = 'none'; // Hide if clicked outside
                }
            };
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/admin/admin_dashboard.blade.php ENDPATH**/ ?>