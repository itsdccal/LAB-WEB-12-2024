<?php
    session_start();
    require 'config.php';
    
    if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
        header('Location: dashboard.php');
        exit();
    }
    
    $conn = getConnection();
    $error = '';

    // Mengecek apakah ada flash error message
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }

    function safeOutput($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    if (isset($_POST['login'])) {
        $input = safeOutput($_POST['email_or_username']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT email, username, password FROM users WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $input, $input);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: dashboard.php');
                exit();
            } else {
                $_SESSION['error'] = 'Email/Username atau password salah!';
            }
        } else {
            $_SESSION['error'] = 'Email/Username atau password salah!';
        }

        $stmt->close();
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-400 to-purple-500">
    <div class="bg-white shadow-lg min-w-[100px] rounded-2xl p-10 w-96 transform hover:scale-105 transition-transform" style="min-height: 500px;">
        <h2 class="text-2xl font-bold text-center mb-8">Login</h2>

        <form method="POST" action="">
            <div class="mb-6">
                <label for="email_or_username" class="block mb-2 text-sm font-medium text-gray-900">Email/Username</label>
                <input type="text" name="email_or_username" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter email/username" required>
            </div>

            <div class="mb-6">
                <label for="hs-toggle-password-with-checkbox" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input id="hs-toggle-password-with-checkbox" type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter password" required>
                <div class="flex mt-2">
                    <input data-hs-toggle-password='{
                        "target": "#hs-toggle-password-with-checkbox"
                    }' id="hs-toggle-password-checkbox" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-toggle-password-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Show password</label>
                </div>
            </div>
            
            <button type="submit" name="login" class="mb-6 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition-colors">Login</button>
        </form>

        <div class="<?php echo !empty($error) ? 'bg-red-100 text-red-700' : 'hidden'; ?> mb-6 p-3 rounded-lg" style="min-height: 50px;">
            <?php echo safeOutput($error); ?>
        </div>
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
    
    <?php $conn->close(); ?>
</body>
</html>