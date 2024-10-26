<?php
session_start(); 
include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE Username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    $query1 = $conn->prepare("SELECT * FROM users WHERE Name = ?");
    $query1->bind_param("s",$name);
    $query1->execute();
    $result1 = $query1->get_result();

    if ($result->num_rows > 0) {
        
        echo "Username sudah ada, coba buat yang lain!";
    } else if ($result1->num_rows > 0) {
            
            echo "Name sudah ada, coba buat yang lain!";
    } else {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = $conn->prepare("INSERT INTO users (Name, Username, Password) VALUES (?, ?, ?)");
        $query->bind_param("sss", $name, $username, $hashed_password);

        if ($query->execute()) {
            $_SESSION['message'] = "Registrasi berhasil! Silakan login.";
            header("Location: login.php");
        } else {
            echo "Error: " . $query->error;
        }
    }

    $conn->close();
}
