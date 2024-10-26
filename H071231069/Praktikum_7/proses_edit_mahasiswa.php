<?php
include 'conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    $query = $conn->prepare("UPDATE mahasiswa SET Nama = ?, Nim = ?, `Program Studi` = ? WHERE ID = ?");
    $query->bind_param('sssi', $nama, $nim, $prodi, $id);

    if($query->execute()) {
        header('Location: home_admin.php');
    } else {
        echo 'Error: ' . $query->error;
    }
}