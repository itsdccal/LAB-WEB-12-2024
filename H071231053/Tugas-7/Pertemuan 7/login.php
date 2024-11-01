<?php
session_start();
include "./config/config.php";

$error = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan prepared statement
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }

    mysqli_stmt_close($stmt);
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
<body class="bg-[#a1d2d2] text-white flex flex-col gap-4 items-center justify-center h-screen">
    <h2 class="text-5xl h-14 mb-9 text-center text-black">Welcome User :3 </h2>
    <div class="bg-[#e0e0e0] p-8 rounded-xl w-full max-w-lg shadow-[8px_8px_16px_#bcbcbc,-8px_-8px_16px_#ffffff]">
        <?php if ($error): ?>
            <p class="text-red-500 text-center mb-4"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-4">
                <label for="username" class="block text-lg mb-2 text-gray-600">Username</label>
                <input placeholder="Enter your username" type="text" id="username" name="username" required class="w-full px-4 py-2 bg-[#e0e0e0] border-none rounded-lg shadow-[8px_8px_16px_#bcbcbc,-8px_-8px_16px_#ffffff] focus:outline-none focus:ring-2 focus:ring-gray-400 text-gray-700">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-lg mb-2 text-gray-600">Password</label>
                <input placeholder="Enter your password" type="password" id="password" name="password" required class="w-full px-4 py-2 bg-[#e0e0e0] border-none rounded-lg shadow-[8px_8px_16px_#bcbcbc,-8px_-8px_16px_#ffffff] focus:outline-none focus:ring-2 focus:ring-gray-400 text-gray-700">
            </div>
            <button type="submit" name="login" class="w-full bg-[#e0e0e0] text-black font-semibold py-2 rounded-lg shadow-[8px_8px_16px_#bcbcbc,-8px_-8px_16px_#ffffff] transition duration-300 ease-in-out active:translate-y-1">Login</button>
        </form>
    </div>
</body>
</html>
