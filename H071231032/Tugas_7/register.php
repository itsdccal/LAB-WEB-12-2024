<?php
    session_start();
    require 'config.php';

    if (!isset($_SESSION['email']) && $_SESSION['role'] !== 'admin') {
        header('Location: login.php');
        exit();
    }

    $conn = getConnection();
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
        $name = trim($_POST['name']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $nim = trim($_POST['nim']);
        $prodi = trim($_POST['prodi']);
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $checkQuery = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ? OR nim = ?");
        $checkQuery->bind_param('sss', $username, $email, $nim);
        $checkQuery->execute();
        $result = $checkQuery->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = 'Username, Email, atau NIM sudah terdaftar. Silakan gunakan yang lain.';
            header('Location: register.php');
            exit();
        } else {
            $insertQuery = $conn->prepare("INSERT INTO users (email, username, password, nama, nim, prodi, role) VALUES (?, ?, ?, ?, ?, ?, 'mahasiswa')");
            $insertQuery->bind_param('ssssss', $email, $username, $passwordHash, $name, $nim, $prodi);

            if ($insertQuery->execute()) {
                header('Location: dashboard.php');
                exit();
            } else {
                $_SESSION['error'] = 'Gagal mendaftar. Silakan coba lagi.';
                header('Location: register.php');
                exit();
            }
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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container bg-white mx-auto p-5 rounded-lg shadow-2xl max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Register</h1>
        
        <form method="post">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" name="username" id="username" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded-lg" required>
                <div class="flex mt-2">
                    <input data-password='{
                        "target": "#password"
                    }' id="hs-toggle-password-checkbox" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-toggle-password-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Show password</label>
                </div>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="nim" class="block text-gray-700">NIM:</label>
                <input type="text" name="nim" id="nim" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="nim" class="block text-gray-700">Prodi:</label>
                <input type="text" name="prodi" id="prodi" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4 <?php echo !empty($error) ? 'bg-red-100 text-red-700' : 'bg-transparent'; ?> p-2 rounded-lg" style="min-height: 50px;">
                <?php echo !empty($error) ? htmlspecialchars($error) : ''; ?>
            </div>

            <button type="submit" name="register" class="w-full mb-4 bg-blue-500 text-white p-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                Register
            </button>
        </form>

        <a href="dashboard.php" class="block text-center mb-4 bg-gray-200 text-gray-700 p-3 rounded-lg shadow-md hover:bg-gray-300 transition">
            Back
        </a>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const toggleCheckbox = document.getElementById('hs-toggle-password-checkbox');

        toggleCheckbox.addEventListener('change', function () {
            if (this.checked) {
            passwordInput.type = 'text';
            } else {
            passwordInput.type = 'password';
            }
        });
    </script>

    <?php $conn->close(); ?>

</body>
</html>