<?php
session_start();
include "./config/config.php";

if ($_SESSION['role'] !== 'Admin') {
    header("Location: index.php?error=Akses tidak diizinkan");
    exit();
}

$error = "";
$nama = $nim = $prodi = $faculty = "";
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'edit') {
    $id = $_GET['id'];
    $queryGet = "SELECT * FROM mahasiswa WHERE id = ?";
    $stmt = mysqli_prepare($conn, $queryGet);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($result);

    if ($data) {
        $nama = $data['nama'];
        $nim = $data['nim'];
        $prodi = $data['prodi'];
        $faculty = $data['faculty'];
    } else {
        $error = "Data tidak ditemukan";
    }
    mysqli_stmt_close($stmt);
}

if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $faculty = $_POST['faculty'];

    if ($nim && $nama && $prodi && $faculty) {
        // Pengecekan apakah NIM sudah ada
        $queryCheckNIM = "SELECT COUNT(*) FROM mahasiswa WHERE nim = ?";
        $stmt = mysqli_prepare($conn, $queryCheckNIM);
        mysqli_stmt_bind_param($stmt, "s", $nim);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $count);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($action == 'edit') {
            $queryUpdate = "UPDATE mahasiswa SET nim = ?, nama = ?, prodi = ?, faculty = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $queryUpdate);
            mysqli_stmt_bind_param($stmt, "ssssi", $nim, $nama, $prodi, $faculty, $id);
            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.php?success=Data berhasil diperbarui");
                exit();
            } else {
                $error = "Data gagal diperbarui";
            }
            mysqli_stmt_close($stmt);
        } else {
            if ($count > 0) {
                $error = "NIM sudah terdaftar. Silakan gunakan NIM yang lain.";
            } else {
                $queryInsert = "INSERT INTO mahasiswa(nim, nama, prodi, faculty) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $queryInsert);
                mysqli_stmt_bind_param($stmt, "ssss", $nim, $nama, $prodi, $faculty);
                if (mysqli_stmt_execute($stmt)) {
                    // Tambahkan pengguna baru ke tabel users
                    $username = $nim; // Menggunakan NIM sebagai username
                    $default_password = password_hash('000000', PASSWORD_DEFAULT);
                    $queryInsertUser = "INSERT INTO users(username, password, role) VALUES (?, ?, 'Mahasiswa')";
                    $stmtUser = mysqli_prepare($conn, $queryInsertUser);
                    mysqli_stmt_bind_param($stmtUser, "ss", $username, $default_password);
                    mysqli_stmt_execute($stmtUser);
                    mysqli_stmt_close($stmtUser);

                    header("Location: index.php?success=Data mahasiswa berhasil ditambahkan");
                    exit();
                } else {
                    $error = "Data mahasiswa gagal ditambahkan";
                }
                mysqli_stmt_close($stmt);
            }
        }
    } else {
        $error = "Semua inputan harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"><?= $action == 'edit' ? 'Edit Data Mahasiswa' : 'Tambah Data Mahasiswa' ?></h2>
        <?php if ($error) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" value="<?= $nim ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama ?>" required>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Program Studi" value="<?= $prodi ?>" required>
            </div>
            <div class="form-group">
                <label for="faculty">Fakultas</label>
                <select class="form-control" name="faculty" id="faculty" required>
                    <option value="">- Pilih Fakultas -</option>
                    <option value="Kedokteran" <?= $faculty == 'Kedokteran' ? "selected" : "" ?>>Kedokteran</option>
                    <option value="MIPA" <?= $faculty == 'MIPA' ? "selected" : "" ?>>MIPA</option>
                    <option value="Teknik" <?= $faculty == 'Teknik' ? "selected" : "" ?>>Teknik</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="save">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.2.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
