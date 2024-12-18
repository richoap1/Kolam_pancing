<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>"> <!-- Linking to your CSS file -->
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Laravel CSRF Token -->
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>

            <p>Belum punya akun? <a href="<?php echo e(url('/register')); ?>">Daftar di sini.</a></p>
            <p><a href="<?php echo e(url('/admin_login')); ?>">Login sebagai Admin</a></p> <!-- Link to the admin login page -->
        </form>
        
        <!-- Display validation errors -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/auth/login.blade.php ENDPATH**/ ?>