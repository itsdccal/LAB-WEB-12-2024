<?php
include 'conn.php';
$id = $_GET['id'];

$query = "SELECT * FROM mahasiswa WHERE ID = $id";
$user = $conn->query($query);

$result = $user->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<style>
        body {
            background-image: url('images/rekbg.jpg'); /* Specify the path to your background image */
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .user-icon {
            background: url('images/ico.png') no-repeat center center;
            background-size: cover; /* Ensures the image covers the area without distortion */
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #B8001F;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #800000;
        }
        .form-label {
            color: #FFFFFF;
        }
    </style>

<body>
<div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card glass-effect shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Edit Mahasiswa</h2>
                        <!-- Form inside the card -->
                        <form action="proses_edit_mahasiswa.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($result['ID']) ?>">
                            
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($result['Nama']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" value="<?= htmlspecialchars($result['Nim']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control" value="<?= htmlspecialchars($result['Program Studi']) ?>" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>