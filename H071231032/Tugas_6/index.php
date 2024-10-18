<?php
    session_start();
    require 'session.php';
    require 'users.php';

    // Redirect jika sudah login
    if (isset($_SESSION['email'])) {
        header('Location: dashboard.php');
        exit();
    }

    $error = "";

    // Mengecek apakah ada flash error message
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']); // Hapus pesan error setelah ditampilkan
    }

    if (isset($_POST['login'])) {
        $input = safeOutput($_POST['email_or_username']);  // Sanitasi input untuk cegah XSS
        $password = $_POST['password'];

        foreach ($users as $user) {
            // Validasi login bisa dengan email atau username
            if (($user['email'] === $input || $user['username'] === $input) && password_verify($password, $user['password'])) {
                $_SESSION['email'] = $user['email'];
                header('Location: dashboard.php');
                exit();
            }
        }

        $_SESSION['error'] = 'Email/Username atau password salah!';
        header('Location: index.php'); // Redirect untuk menghilangkan data POST dan menghindari reload ulang
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-400 to-purple-500">
    <div class="bg-white shadow-lg min-w-[100px] rounded-2xl p-10 w-96 transform hover:scale-105 transition-transform">
        <h2 class="text-2xl font-bold text-center mb-8">Login</h2>
        <?php if (!empty($error)) echo "<p class='text-red-500'>" . safeOutput($error) . "</p>"; ?>
        
        <form method="POST" action="">
            <div class="mb-6">
                <label for="email_or_username" class="block mb-2 text-sm font-medium text-gray-900">Email/Username</label>
                <input type="text" name="email_or_username" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter email/username" required>
            </div>

            <div class="mb-6">
                <label for="hs-toggle-password-with-checkbox" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input id="hs-toggle-password-with-checkbox" type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
                <!-- Checkbox -->
                <div class="flex mt-2">
                    <input data-hs-toggle-password='{
                        "target": "#hs-toggle-password-with-checkbox"
                    }' id="hs-toggle-password-checkbox" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-toggle-password-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Show password</label>
                </div>
                <!-- End Checkbox -->
            </div>

            <button type="submit" name="login" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition-colors">Login</button>
        </form>
    </div>

    <script>
        const passwordInput = document.getElementById('hs-toggle-password-with-checkbox');
        const toggleCheckbox = document.getElementById('hs-toggle-password-checkbox');

        toggleCheckbox.addEventListener('change', function () {
            if (this.checked) {
            passwordInput.type = 'text';
            } else {
            passwordInput.type = 'password';
            }
        });
    </script>

</body>
</html>