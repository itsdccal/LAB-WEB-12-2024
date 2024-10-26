<?php
session_start();
include 'conn.php';

$query = 'SELECT * FROM users';
$user = $conn->query($query);

$name = htmlspecialchars($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playball&display=swap">
</head>

<style>
    /* Background */
    body {
        background-image: url('images/rekbg.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
        color: white;
        font-family: Arial, sans-serif;
    }
    .user-icon {
        background: url('images/image.png') no-repeat center center;
        background-size: cover;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    /* Container and glass effect */
    .container {
        max-width: 80%;
        margin-top: 50px;
        padding: 20px;
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    /* Titles */
    h1, h2 {
        color: #ffffff;
        text-align: center;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    }
    h1 {
        font-family: 'Playball', cursive;
    }

    /* Form inputs */
    .form-control {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .form-label {
        color: #ffffff;
        font-weight: bold;
    }

    /* Button styling */
    .btn-primary, .btn-danger {
        border: none;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .btn-primary {
        background-color: #B8001F;
    }

    .btn-primary:hover {
        background-color: #800000;
    }

    .btn-danger {
        background-color: #B8001F;
    }

    .btn-danger:hover {
        background-color: #800000;
    }

    /* Table styling */
    .table {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        color: #ffffff;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .table th {
        background-color: #800000;
        color: #ffffff;
        font-weight: bold;
        text-align: center;
        padding: 12px;
        border-top: none;
        border-bottom: 2px solid #ffffff;
    }

    .table td {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        padding: 10px;
        text-align: center;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .table tbody tr:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    /* Links */
    a {
        color: #B8001F;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        color: #800000;
    }
</style>

<body>
    <div class="container mt-5">
        <h1>Selamat datang, <?php echo $name; ?>!</h1>
        
        <!-- Bootstrap Table -->
        <h2 class="text-center mb-4">Daftar Mahasiswa</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'conn.php';

                $query = 'SELECT * FROM mahasiswa';
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    $nama = htmlspecialchars($row['Nama']);
                    $nim = htmlspecialchars($row['Nim']);
                    $prodi = htmlspecialchars($row['Program Studi']);
                    $id = htmlspecialchars($row['ID']);
                ?>
                    <tr>
                        <td><?= $nama ?></td>
                        <td><?= $nim ?></td>
                        <td><?= $prodi ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Form logout dengan spacing tambahan -->
        <form action="proses_logout.php" method="POST" class="mt-3 py-3">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>

</html>
