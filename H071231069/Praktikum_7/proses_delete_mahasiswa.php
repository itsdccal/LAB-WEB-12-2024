<?php

include 'conn.php';

$id = $_GET['id'];

$query = $conn->prepare("DELETE FROM mahasiswa WHERE ID = ?");
$query->bind_param('i', $id);

if($query->execute()) {
    $conn->close();
    header('Location: home_admin.php');
} else {
    echo 'Error: ' . $query->error;
}