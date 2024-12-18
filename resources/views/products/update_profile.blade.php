<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Mengambil data yang diperbarui
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$gender = $_POST['gender'];
$address = trim($_POST['address']); // Tambahan untuk alamat

// Siapkan pernyataan untuk memperbarui data pengguna
$stmt = $conn->prepare("UPDATE users SET username=?, email=?, gender=?, address=? WHERE id=?");
$stmt->bind_param("ssssi", $username, $email, $gender, $address, $user_id);

if ($stmt->execute()) {
    header("Location: profile.php"); // Redirect ke halaman profil setelah pembaruan
    exit;
} else {
    echo "Error: " . $stmt->error; // Menampilkan kesalahan jika ada
}

$stmt->close();
$conn->close();
?>
