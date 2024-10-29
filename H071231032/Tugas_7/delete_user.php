<?php
    session_start();
    require 'config.php';

    if (!isset($_SESSION['email']) && $_SESSION['role'] !== 'admin') {
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['user_id']) && is_numeric($_POST['user_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $userId = $_POST['user_id'];
        
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $conn->close();

        header('Location: dashboard.php');
        exit();
    } else {
        header('Location: dashboard.php');
        exit();
    }