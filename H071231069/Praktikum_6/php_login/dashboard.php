<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$user = $_SESSION['user'];
$admin = ($user['email'] === 'admin@gmail.com');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('images/bgdb.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            position: relative;
        }
        .card {
            background-color: #C8ACD6;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #black;
            font-weight: bold;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.1rem;
            color: #black;
        }
        thead.table th {
            background-color :  #433D8B;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .text-center {
            text-align: center;
        }

        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
        }

        h3 {
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
        }

        ul {
            padding-left: 0;
        }

        ul li {
            display: flex;
            justify-content: space-between;
            background: #f9f9f9;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
        }

        ul li p {
            margin: 0;
            font-weight: 500;
            color: #333;
        }

        
    </style>
</head>
<body>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center">Welcome, <?= htmlspecialchars($user['name']) ?>!</h2>
                        <p class=" "><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                        <p class=" "><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>

                        <?php if ($admin): ?>
                            <h3 class="mt-4 ">All Users</h3>
                            <table class="table table-striped table-bordered mt-3">
                                <thead class="table" >
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Faculty</th>
                                        <th>Batch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['users'] as $userData): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($userData['name']) ?></td>
                                            <td><?= htmlspecialchars($userData['username']) ?></td>
                                            <td><?= htmlspecialchars($userData['email']) ?></td>
                                            <td><?= htmlspecialchars($userData['gender'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($userData['faculty'] ?? 'N/A') ?></td>
                                            <td><?= htmlspecialchars($userData['batch'] ?? 'N/A') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h3 class="mt-4 text-center">Your Data</h3>
                            <ul class="mt-3">
                                <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></li>
                                <li class="list-group-item"><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></li>
                                <li class="list-group-item"><strong>Gender:</strong> <?= htmlspecialchars($user['gender'] ?? 'N/A') ?></li>
                                <li class="list-group-item"><strong>Faculty:</strong> <?= htmlspecialchars($user['faculty'] ?? 'N/A') ?></li>
                                <li class="list-group-item"><strong>Batch:</strong> <?= htmlspecialchars($user['batch'] ?? 'N/A') ?></li>
                            </ul>
                        <?php endif; ?>
                        
                        <form action="logout.php" method="POST" class="mt-4 text-center">
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
