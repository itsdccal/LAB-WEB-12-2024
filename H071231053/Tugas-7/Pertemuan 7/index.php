<?php
session_start();
include "./config/config.php";

$success = "";
$error = "";

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Pesan sukses atau error
if (isset($_GET['success'])) {
    $success = $_GET['success'];
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

// Cek tindakan jika user adalah Admin
$action = "";
if (isset($_GET['action']) && $_SESSION['role'] === 'Admin') {
    $action = $_GET['action'];
    if ($action == 'delete') {
        $id = $_GET['id'];
        // Menggunakan prepared statement untuk menghapus data
        $queryDelete = "DELETE FROM mahasiswa WHERE id = ?";
        $stmt = mysqli_prepare($conn, $queryDelete);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $success = "Berhasil menghapus data";
        } else {
            $error = "Gagal menghapus data";
        }
        mysqli_stmt_close($stmt);
    }
}

// Ubah Password
if (isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($old_password && $new_password && $confirm_password) {
        $username = $_SESSION['username'];
        $queryCheckPassword = "SELECT password FROM users WHERE username=?";
        $stmt = mysqli_prepare($conn, $queryCheckPassword);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_array($result);

        if (password_verify($old_password, $user['password'])) {
            if ($new_password === $confirm_password) {
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $queryChangePassword = "UPDATE users SET password=? WHERE username=?";
                $stmt = mysqli_prepare($conn, $queryChangePassword);
                mysqli_stmt_bind_param($stmt, "ss", $new_password_hash, $username);
                if (mysqli_stmt_execute($stmt)) {
                    $success = "Password berhasil diubah.";
                } else {
                    $error = "Gagal mengubah password.";
                }
                mysqli_stmt_close($stmt);
            } else {
                $error = "Password baru dan konfirmasi tidak cocok.";
            }
        } else {
            $error = "Password lama tidak benar.";
        }
    } else {
        $error = "Semua kolom harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Data Mahasiswa</h2>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success ?></div>
        <?php endif; ?>

        <table class="table table-bordered">
            <tr class="table-light">
                <th>Username</th>
                <td><?php echo $_SESSION['username']; ?></td>
            </tr>
        </table>

        <?php if ($_SESSION['role'] == 'Admin'): ?>
            <a href="form.php" class="btn btn-primary mb-3">Tambah Data</a>
        <?php endif; ?>

        <button class="btn btn-secondary mb-3" data-toggle="modal" data-target="#changePasswordModal">Ubah Password</button>

        <table class="table table-bordered">
            <thead>
                <tr class="table-light">
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Fakultas</th>
                    <?php if ($_SESSION['role'] == 'Admin') echo "<th>Aksi</th>"; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                $queryGet = "SELECT * FROM mahasiswa ORDER BY id ASC";
                $executeQGet = mysqli_query($conn, $queryGet);
                while ($data = mysqli_fetch_array($executeQGet)) {
                    $id = $data['id'];
                    echo "<tr>
                            <td>$number</td>
                            <td>{$data['nim']}</td>
                            <td>{$data['nama']}</td>
                            <td>{$data['prodi']}</td>
                            <td>{$data['faculty']}</td>";
                    if ($_SESSION['role'] == 'Admin') {
                        echo "<td>
                                <a href='form.php?action=edit&id=$id' class='btn btn-warning btn-sm'>Edit</a> 
                                <a href='index.php?action=delete&id=$id' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>";
                    }
                    echo "</tr>";
                    $number++;
                }
                ?>
            </tbody>
        </table>

        <!-- Modal Ubah Password -->
        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="old_password">Password Lama</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Password Baru</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" name="change_password">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
