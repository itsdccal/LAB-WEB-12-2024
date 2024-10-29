<?php
    session_start();
    require 'config.php';

    if (!isset($_SESSION['email']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: login.php');
        exit();
    }

    $conn = getConnection();
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $query = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $query->bind_param('ss', $email, $username);
    $query->execute();
    $currentUser = $query->get_result()->fetch_assoc();

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy(); 
        header('Location: login.php');
        exit();
    }

    $usersQuery = $conn->prepare("SELECT * FROM users WHERE role = 'mahasiswa'");
    $searchTerm = '';

    // Fitur pencarian
    if (isset($_POST['search'])) {
        $searchTerm = $_POST['searchTerm'];
        $likeTerm = "%" . $searchTerm . "%";
        $usersQuery = $conn->prepare(
            "SELECT * FROM users WHERE role = 'mahasiswa' AND (email LIKE ? OR username LIKE ? OR nama LIKE ?)"
        );
        $usersQuery->bind_param('sss', $likeTerm, $likeTerm, $likeTerm);
    }

    $usersQuery->execute();
    $usersResult = $usersQuery->get_result();

    // Cek apakah ada data mahasiswa
    $hasUsers = $usersResult->num_rows > 0;
    $users = $usersResult->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-400 to-purple-500 min-h-screen flex items-center justify-center">
    <div class="container bg-white mx-auto p-5 rounded-lg shadow-2xl max-w-5xl">
        <!-- Section Foto Profil -->
        <div class="flex items-center mb-8">
            <div class="mr-5">
                <img src="assets/defaultProfile.png" alt="Default Profile Picture" class="rounded-full shadow-lg" style="width: 100px; height: 100px;">
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Welcome, <?php echo htmlspecialchars($currentUser['nama']); ?>!</h1>
            <form method="post" class="ml-auto">
                <button type="submit" name="logout" class="bg-red-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-red-600 transition duration-300">
                    Logout
                </button>
            </form>
        </div>

        <!-- Informasi Pengguna -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- All -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Email:</h3>
                <p class="text-md text-gray-600"><?php echo htmlspecialchars($currentUser['email']); ?></p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Username:</h3>
                <p class="text-md text-gray-600"><?php echo htmlspecialchars($currentUser['username']); ?></p>
            </div>

            <!-- Mahasiswa only -->
            <?php if ($currentUser['role'] !== 'admin'): ?>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">NIM:</h3>
                    <p class="text-md text-gray-600"><?php echo htmlspecialchars($currentUser['nim']); ?></p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Prodi:</h3>
                    <p class="text-md text-gray-600"><?php echo htmlspecialchars($currentUser['prodi']); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($currentUser['role'] === 'admin'): ?>
            <!-- Register -->
            <div class="mb-4">
                <form method="post" action="register.php">
                    <input type="hidden">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                        Register User
                    </button>
                </form>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">Data Mahasiswa</h2>
            
            <!-- Search feature -->
            <form method="post" class="mb-4">
                <input type="text" name="searchTerm" value="<?php echo htmlspecialchars($searchTerm); ?>" placeholder="Search..." class="p-2 border border-gray-300 rounded-lg">
                <button type="submit" name="search" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                    Search
                </button>
            </form>

            <!-- Tabel data mahasiswa -->
            <?php if ($hasUsers): ?>
                <div class="overflow-x-auto overflow-y-auto h-64">
                    <table class="min-w-full border-collapse border border-gray-300 bg-white shadow-lg">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Email</th>
                                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Username</th>
                                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Nama</th>
                                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">NIM</th>
                                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Program Studi</th>
                                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['email']) ?? '-'; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['username']); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['nama']); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['nim']); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($user['prodi']); ?></td>
                                    <td class="border border-gray-300 px-4 py-2 flex justify-around">
                                        <form method="post" action="edit_user.php" style="display:inline;">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                                                Edit
                                            </button>
                                        </form>
                                        <form method="post" action="delete_user.php" style="display:inline;">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition duration-300" onclick="return confirm('Are you sure you want to delete this user?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-center text-gray-700 mt-4">Tidak ada data mahasiswa yang tersedia.</p>
            <?php endif; ?>

        <?php endif; ?>
    </div>

    <?php $conn->close(); ?>
</body>
</html>