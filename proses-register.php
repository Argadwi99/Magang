<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    $role = 'admin';

    $sql_check = "SELECT id FROM users WHERE username = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        header("Location: register.php?status=userexists");
        exit();
    }
    $stmt_check->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    
    if (!$stmt_insert) {
        header("Location: register.php?status=error"); exit();
    }
    
    $stmt_insert->bind_param("sss", $username, $hashed_password, $role);
    
    if ($stmt_insert->execute()) {
        header("Location: login.php?status=registered"); exit();
    } else {
        header("Location: register.php?status=error"); exit();
    }

    $stmt_insert->close();
    $conn->close();
} else {
    header("Location: register.php"); exit();
}
?>