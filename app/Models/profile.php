<?php
namespace App\Models;

use PDO;

class profile {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getProfileById($id) {
        $stmt = $this->db->prepare("SELECT username, email, gender, address FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch user profile info
    }

    public function updateProfile($id, $username, $email, $gender, $address) {
        $stmt = $this->db->prepare("UPDATE users SET username = ?, email = ?, gender = ?, address = ? WHERE id = ?");
        return $stmt->execute([$username, $email, $gender, $address, $id]); // Update user profile
    }
}
?>
