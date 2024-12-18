<?php
session_start();
include '../config/database.php'; // Pastikan ini berisi koneksi ke database

// Cek apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin_loggedin'])) {
    header('Location: admin_login.php'); // Arahkan ke halaman login admin
    exit;
}

// Ambil ID produk yang akan diperbarui
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data produk dari database
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Produk tidak ditemukan."); // Menangani jika produk tidak ada
    }
} else {
    die("ID produk tidak dikirim."); // Menangani jika ID tidak ada
}

// Proses update data produk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $sql = "UPDATE products SET name=?, description=?, price=?, image_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssdsi', $name, $description, $price, $image_url, $id);
    $stmt->execute();
    $stmt->close();
    header('Location: products.php'); // Redirect setelah berhasil
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Produk</title>
    <link rel="stylesheet" href="css/update_products.css"> <!-- Tautan ke CSS yang sesuai -->
</head>
<body>
    <div class="container">
        <h1>Update Produk</h1>
        <form action="" method="POST">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

            <label for="description">Deskripsi Produk:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>

            <label for="price">Harga Produk:</label>
            <input type="text" id="price" name="price" required>

            <label for="image_url">URL Gambar:</label>
            <input type="text" id="image_url" name="image_url" value="<?php echo htmlspecialchars($product['image_url']); ?>" required>

            <button type="submit">Perbarui Produk</button>

            <p><a href="products.php">Kembali ke Daftar Produk</a></p>
        </form>
    </div>
</body>
<script>
    document.getElementById('price').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9a-zA-Z. ]/g, '');
    });
</script>

</html>
