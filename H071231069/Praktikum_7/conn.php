<?php

// Tentukan kredensial database
$server_name = 'localhost';
$username = 'root';
$password = '';
$database = 'praktikum7';

// Buat koneksi
$conn = new mysqli($server_name, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die('Koneksi Gagal: ' . $conn->connect_error);
}