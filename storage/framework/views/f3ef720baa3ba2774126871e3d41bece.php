<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolam Pancing Chocho</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>"> <!-- Linking to an external CSS file -->
    <script src="<?php echo e(asset('js/slider.js')); ?>" defer></script> <!-- Linking to your slider JS file -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <h1>Selamat Datang di Kolam Pancing Chocho</h1>
                <p>Sistem Penyewaan Kolam Pancing yang Mudah dan Praktis</p>
            </div>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <a href="<?php echo e(url('/')); ?>">Beranda</a>
        <a href="<?php echo e(url('/fasilitas')); ?>">Fasilitas</a>
        <a href="#pricing">Harga</a>
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
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); this.closest('form').submit();" class="btn logout-btn">Logout</a>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(url('/login')); ?>">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="logo-container">
        <a href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('images/profile/Logo.png')); ?>" alt="Logo"> <!-- Updated to match your image path -->
        </a>
    </div>

    <!-- Image Slider -->
    <div class="slider">
        <div class="slides-container">
            <div class="slide active">
                <img src="<?php echo e(asset('images/banners/fishing1.jpg')); ?>" alt="Fishing Image 1">
            </div>
            <div class="slide">
                <img src="<?php echo e(asset('images/banners/fishing2.jpg')); ?>" alt="Fishing Image 2">
            </div>
            <div class="slide">
                <img src="<?php echo e(asset('images/banners/fishing3.jpg')); ?>" alt="Fishing Image 3">
            </div>
        </div>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Kolam Pancing Chocho menawarkan pengalaman memancing yang menyenangkan dengan fasilitas lengkap dan lokasi yang strategis. Kami menyediakan berbagai pilihan kolam dan paket harga yang sesuai dengan kebutuhan Anda.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <h2>Fasilitas</h2>
            <div class="services-grid">
                <div class="service-item">
                    <h3>Kolam Kiloan</h3>
                    <p>Sistem memancing dengan harga berdasarkan berat ikan yang didapatkan.</p>
                </div>
                <div class="service-item">
                    <h3>Kolam Harian</h3>
                    <p>Paket penyewaan kolam harian yang terjangkau dengan berbagai pilihan durasi.</p>
                </div>
                <div class="service-item">
                    <h3>Peralatan Lengkap</h3>
                    <p>Disediakan peralatan memancing untuk memudahkan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="section">
        <div class="container">
            <h2>Harga Sewa</h2>
            <ul class="pricing-list">
                <li>Sewa per jam: Rp 50.000</li>
                <li>Sewa setengah hari (6 jam): Rp 250.000</li>
                <li>Sewa sehari penuh: Rp 400.000</li>
                <li>Sistem Kiloan: Rp 45.000/kg</li>
            </ul>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <h2>Hubungi Kami</h2>
            <p>Untuk informasi lebih lanjut, hubungi kami melalui email: info@chocho-pancing.com atau telepon: (021) 555-5555</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>Kolam Pancing Chocho - Semua Hak Cipta Dilindungi © 2024</p>
    </footer>

    <script>
        function changeSlide(n) {
            let slides = document.getElementsByClassName("slide");
            let currentIndex = [...slides].findIndex(slide => slide.style.display !== "none");
            slides[currentIndex].style.display = "none"; // Hide current slide
            currentIndex = (currentIndex + n + slides.length) % slides.length; // Calculate new index
            slides[currentIndex].style.display = "block"; // Show new slide
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/home.blade.php ENDPATH**/ ?>