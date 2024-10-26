<?php
include 'conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    
    $in = $conn->prepare("INSERT INTO mahasiswa (Nama, Nim, `Program Studi`) VALUES (?, ?, ?)");
    $in->bind_param('sss', $nama, $nim, $prodi);

    if($in->execute()) {
        header('Location: home_admin.php');
    } else {
        echo 'Error' . $in->error;
    }
}