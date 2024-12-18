<?php
session_start();
include '../config/database.php'; // Ensure this file contains the database connection

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_loggedin'])) {
    header('Location: admin_login.php'); // Redirect to admin login page
    exit;
}

// Check if the request method is POST and an ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = intval($_POST['id']); // Sanitize input

        // Prepare the SQL statement for deletion
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Successfully deleted
            header('Location: products.php'); // Redirect to products page
            exit;
        } else {
            // Output error for debugging
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid product ID.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
