<?php
session_start();
include '../config/database.php';

// Cek apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin_loggedin'])) {
    header('Location: admin_login.php'); // Arahkan ke halaman login admin
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $image_url = trim($_POST['image_url']);

    // Masukkan produk ke database
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image_url);

    if ($stmt->execute()) {
        header("Location: products.php"); // Redirect setelah berhasil
        exit;
    } else {
        $error = "Error: " . $stmt->error; // Tangani kesalahan
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/add_products.css"> <!-- Gunakan CSS yang sama -->
</head>
<body>
    <div class="container">
        <h1>Tambah Produk</h1>
        <form action="" method="POST">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Deskripsi Produk:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Harga Produk:</label>
            <input type="text" id="price" name="price" required>

            <label for="image_url">URL Gambar:</label>
            <input type="text" id="image_url" name="image_url" required>

            <button type="submit">Tambah Produk</button>

            <p><a href="admin.php">Kembali ke Dashboard</a></p>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
<script>
    document.getElementById('price').addEventListener('input', function (e) {
        // Allow only numbers, letters, and periods to be input
        this.value = this.value.replace(/[^0-9a-zA-Z. ]/g, '');
    });
</script>
</html>
