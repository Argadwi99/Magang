<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        // Jika prepare statement gagal
        header("Location: login.php?status=failed"); 
        exit();
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            
            // Redirect ke dashboard admin jika role adalah 'admin'
            if ($_SESSION['role'] === 'admin') {
                header("Location: Admin/dashboard.php");
            } else {
                // Redirect ke halaman utama jika role bukan 'admin'
                header("Location: index.php");
            }
            exit();
        } else {
            // Password salah
            header("Location: login.php?status=failed"); 
            exit();
        }
    } else {
        // Username tidak ditemukan
        header("Location: login.php?status=failed"); 
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Jika diakses tanpa metode POST
    header("Location: login.php"); 
    exit();
}
?>