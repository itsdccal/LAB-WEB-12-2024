<?php
session_start(); 
include 'conn.php'; 

if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] === "adminxxx"){ 
        header("Location: home_admin.php"); 
        exit();
    } else{
        header("Location: home_user.php"); 
        exit();
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $name = isset($_POST['name']) ? $_POST['name'] : ''; 
    $username = isset($_POST['username']) ? $_POST['username'] : ''; 
    $password = isset($_POST['password']) ? $_POST['password'] : ''; 

    $query = 'SELECT * FROM users WHERE Username = ?'; 
    $stmt = $conn->prepare($query); 
    $stmt->bind_param('s', $username); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) { 
        $user = $result->fetch_assoc(); 
        
        if (password_verify($password, $user['Password'])) { 
            $_SESSION['name'] = $user['Name'];
            $_SESSION['username'] = $user['Username']; 
            if ($user['Username'] === "adminxxx") {
                header("Location: home_admin.php"); 
            } else {
                header("Location: home_user.php"); 
            }
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}
