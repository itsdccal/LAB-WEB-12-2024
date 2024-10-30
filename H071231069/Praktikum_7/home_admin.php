<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$name = htmlspecialchars($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">

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
            background-size: cover; /* Ensures the image covers the area without distortion */
            width: 60px;
            height:60px;
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
        h1 {
            font-family: 'Playball', cursive;
            color: #ffffff;
            text-align: center;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
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
            background: rgba(255, 255, 255, 0.15); /* Slight transparency for the table background */
            border-radius: 10px;
            color: #ffffff;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Adds a soft shadow for depth */
        }

        .table th {
            background-color: #800000; /* Dark red color for table header */
            color: #ffffff;
            text-align: center;
            padding: 10px; /* Increased padding for improved readability */
            border-top: 1px solid rgba(255, 255, 255, 0.2); /* Subtle border between rows */
        }

        .table td {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.2); /* Subtle border between rows */
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.2); /* Adds a light hover effect on rows */
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
        <div class="user-icon"></div>
        <h1 >Selamat datang, <?php echo $name; ?>!</h1>        
        <form action="proses_input_mahasiswa.php" method="POST">
            <div class="row g-3">
                <div class="col">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Nama" required>
                </div>
                <div class="col">
                    <label for="nim" class="form-label">NIM:</label>
                    <input type="text" name="nim" id="nim" class="form-control" placeholder="Enter NIM" required>
                </div>
                <div class="col">
                    <label for="prodi" class="form-label">Program Studi:</label>
                    <input type="text" name="prodi" id="prodi" class="form-control" placeholder="Enter Program Studi" required>
                </div>
            </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah Mahasiswa</button>
        </form>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Program Studi</th>
                    <th>Action</th>
                </tr>
                <?php
                include 'conn.php';

                $query = 'SELECT * FROM mahasiswa';
                $user = $conn->query($query);

                while ($row = $user->fetch_assoc()) {
                    $id = htmlspecialchars($row['ID']);
                    $nama = htmlspecialchars($row['Nama']);
                    $nim = htmlspecialchars($row['Nim']);
                    $prodi = htmlspecialchars($row['Program Studi']);
                ?>
                    <tr>
                        <td><?= $nama ?></td> <!-- Menggunakan = akan langsung meng-echo -->
                        <td><?= $nim ?></td>
                        <td><?= $prodi ?></td>
                        <td>
                            <a href="edit_mahasiswa.php?id=<?= $id ?>">Edit</a>
                            <a href="proses_delete_mahasiswa.php?id=<?= $id ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                } ?>
            </table>

            <form action="proses_logout.php" method="POST" class="mt-3 py-3">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>