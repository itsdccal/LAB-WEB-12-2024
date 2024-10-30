<?php
    session_start();
    require 'config.php';

    if (!isset($_SESSION['username']) && $_SESSION['role'] !== 'admin') {
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['user_id']) && is_numeric($_POST['user_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $userId = $_POST['user_id'];
    } else {
        header('Location: dashboard.php');
        exit();
    }

    $error = '';
    $conn = getConnection();
    $query = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $query->bind_param('i', $userId);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['message'] = "User tidak ditemukan.";
        header('Location: dashboard.php');
        exit();
    }

    $user = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $name = trim($_POST['nama']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $nim = trim($_POST['nim']);
        $prodi = trim($_POST['prodi']);

        $checkQuery = $conn->prepare("SELECT * FROM users WHERE (username = ? OR email = ? OR nim = ?) AND id != ?");
        $checkQuery->bind_param('sssi', $username, $email, $nim, $userId);
        $checkQuery->execute();
        $checkResult = $checkQuery->get_result();

        if ($checkResult->num_rows > 0) {
            $_SESSION['error'] = "Username, Email, atau NIM sudah terdaftar!";
        } else {
            $updateQuery = $conn->prepare("UPDATE users SET nama = ?, username = ?, email = ?, nim = ?, prodi = ? WHERE id = ?");
            $updateQuery->bind_param('sssssi', $name, $username, $email, $nim, $prodi, $userId);
            $updateQuery->execute();
            header('Location: dashboard.php');
            exit();
        }
    }

    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container bg-white mx-auto p-5 rounded-lg shadow-2xl max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit User</h1>

        <form method="post">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['id']); ?>">
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama:</label>
                <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($user['nama']); ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="nim" class="block text-gray-700">NIM:</label>
                <input type="text" name="nim" id="nim" value="<?php echo htmlspecialchars($user['nim']); ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="prodi" class="block text-gray-700">Prodi:</label>
                <input type="text" name="prodi" id="prodi" value="<?php echo htmlspecialchars($user['prodi']); ?>" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            
            <div class="mb-4 <?php echo !empty($error) ? 'bg-red-100 text-red-700' : 'bg-transparent'; ?> p-2 rounded-lg" style="min-height: 50px;">
                <?php echo !empty($error) ? htmlspecialchars($error) : ''; ?>
            </div>

            <button type="submit" name="update" class="w-full mb-4 bg-blue-500 text-white p-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                Update
            </button>
            
            <a href="dashboard.php" class="block text-center mb-4 bg-gray-200 text-gray-700 p-3 rounded-lg shadow-md hover:bg-gray-300 transition">
                Back
            </a>
        </form>
    </div>

    <?php $conn->close(); ?>
</body>
</html>