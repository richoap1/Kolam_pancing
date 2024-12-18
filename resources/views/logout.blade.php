<?php
session_start();
session_destroy(); // Menghancurkan semua sesi
header("Location: home.php"); // Redirect ke homepage setelah logout
exit;
?>
