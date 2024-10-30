<?php
    require 'session.php';
    require 'users.php';
    checkLogin();

    $currentUser = null;

    // Menentukan pengguna yang login
    foreach ($users as $user) {
        if ($user['email'] === $_SESSION['email']) {
            $currentUser = $user;
            break;
        }
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php'); // Redirect ke halaman login setelah logout
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-purple-500 min-h-screen flex items-center justify-center">
    <div class="container bg-white mx-auto p-5 rounded-lg shadow-2xl max-w-5xl">
        
        <!-- Section Foto Profil -->
        <div class="flex items-center mb-8">
            <img src="assets/defaultPP.png" alt="Profile Picture" class="rounded-full shadow-lg mr-5 size-28">
            <h1 class="text-3xl font-bold text-gray-800">Welcome, <?php echo safeOutput($currentUser['name']); ?>!</h1>
            <form method="post" class="ml-auto">
                <button type="submit" name="logout" class="bg-red-500 text-white px-6 py-2 rounded-full shadow-md hover:bg-red-600 transition duration-300">
                    Logout <i class="fas fa-sign-out-alt ml-2"></i>
                </button>
            </form>
        </div>

        <!-- Informasi Pengguna -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Email:</h3>
                <p class="text-md text-gray-600"><?php echo safeOutput($currentUser['email']); ?></p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Username:</h3>
                <p class="text-md text-gray-600"><?php echo safeOutput($currentUser['username']); ?></p>
            </div>
            <?php if ($currentUser['role'] !== 'admin'): ?>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">NIM:</h3>
                <p class="text-md text-gray-600"><?php echo safeOutput($currentUser['nim']); ?></p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Gender:</h3>
                <p class="text-md text-gray-600"><?php echo safeOutput($currentUser['gender']); ?></p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Faculty:</h3>
                <p class="text-md text-gray-600"><?php echo safeOutput($currentUser['faculty']); ?></p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Batch:</h3>
                <p class="text-md text-gray-600"><?php echo safeOutput($currentUser['batch']); ?></p>
            </div>
            <?php endif; ?>
        </div>

        <?php if ($currentUser['role'] === 'admin'): ?>
        <!-- Tabel Semua Pengguna -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">All Users</h2>
        <div class="overflow-x-auto overflow-y-auto h-64">
            <table class="min-w-full border-collapse border border-gray-300 bg-white shadow-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Username</th>
                        <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">NIM</th>
                        <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Gender</th>
                        <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Faculty</th>
                        <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Batch</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user):
                        if ($user['role'] === 'admin') { continue; }
                    ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2"><?php echo safeOutput($user['email']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo safeOutput($user['username']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo safeOutput($user['nim']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo safeOutput($user['name']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo safeOutput($user['gender']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo safeOutput($user['faculty']); ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo safeOutput($user['batch']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>