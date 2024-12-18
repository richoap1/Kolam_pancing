<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin_login.css')); ?>">
</head>
<body>
    <div class="form-container">
        <h1>Login Admin</h1>
        <form action="<?php echo e(url('/admin/login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
            <p>Atau <a href="customer_login.php">masuk sebagai pelanggan</a></p>
        </form>
        <?php if($errors->any()): ?>
            <p style='color:red;'><?php echo e($errors->first()); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kolam_pancing\resources\views/admin/admin_login.blade.php ENDPATH**/ ?>