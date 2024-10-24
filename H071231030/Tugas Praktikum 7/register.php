<?php
session_start();
include './config/config.php';

$errors = [];
$success = false;

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = 'mahasiswa';
    
    if (empty($username)) {
        $errors[] = "Username cannot be empty";
    } elseif (strlen($username) < 4) {
        $errors[] = "Username must be at least 4 characters";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            $errors[] = "Username is already taken";
        }
    }

    if (empty($password)) {
        $errors[] = "Password cannot be empty";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Password confirmation does not match";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $role);
        
        if ($stmt->execute()) {
            $success = true;
        } else {
            $errors[] = "An error occurred during registration. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - University of Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    body {
    background-image: linear-gradient(to top, #ffc80080, #fff10000 75%), url(assets/img/Background-UI.jpg);
    background-size: cover;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    background: rgba(255, 255, 255, 0.6);
    border: none;
    border-radius: 23px;
    box-shadow: 0 10px 20px #00000030, 0 6px 6px #0000003b;
}

.card-header {
    background: #000000b3;
    padding: 20px;
    border-radius: 23px 23px 0 0 !important;
    text-align: center;
}

.ui-logo {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
}

.btn-primary {
    background: #FDB515;
    border: none;
    padding: 12px;
    color: #1C1C1C;
    font-weight: bold;
}

.btn-primary:hover {
    background: #e6a313;
    color: #1C1C1C;
    transform: translateY(-1px);
    box-shadow: 0 7px 14px #0000001a, 0 3px 6px #0000001a;
}

.btn-primary:active,
.btn-primary:focus,
.btn-primary:focus-visible {
    background-color: #D49412 !important;
    color: #1C1C1C;
    border: none;
    box-shadow: 0 2px 4px #0000001a;
    transform: translateY(1px);
}

.form-control {
    border-radius: 10px;
    padding: 12px;
    border: 1px solid #ced4da;
}

.form-control:focus {
    box-shadow: 0 0 0 3px #fdb51533;
    border-color: #FDB515;
}

.alert {
    border-radius: 10px;
}

.login-link {
    color: #FDB515;
    text-decoration: none;
    font-weight: 500;
}

.login-link:hover {
    color: #e6a313;
    text-decoration: underline;
}

.animated {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(0); }
    to { opacity: 1; transform: translateY(0); }
}

.form-label {
    color: var(--ui-dark);
    font-weight: 500;
}

.password-requirements {
    font-size: 0.875rem;
    color: #6c757d;
    margin-top: 0.25rem;
    margin-left: 0.5rem;
}

.alert ul {
    margin-bottom: 0;
    padding-left: 1.5rem;
}

.alert-success {
    background-color: #e8f5e9;
    border-color: #c8e6c9;
    color: #2e7d32;
}

.alert-success a {
    color: #1b5e20;
    font-weight: 500;
}

.alert-danger {
    background-color: #ffebee;
    border-color: #ffcdd2;
    color: #c62828;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow animated">
                    <div class="card-header">
                        <img src="./assets/img/Logo-UI.png" alt="UI Logo" class="ui-logo">
                        <h4 class="card-title text-white text-center mb-0">STUDENT REGISTRATION</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php if ($success): ?>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>
                                Registration successful! Please Login
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if (!$success): ?>
                            <form method="POST" action="" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="username" class="form-label">
                                        <i class="fas fa-user me-2"></i>Username
                                    </label>
                                    <input type="text" class="form-control" id="username" name="username" 
                                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                                           required minlength="4" placeholder="Enter username">
                                    <div class="password-requirements">
                                        <i class="fas fa-info-circle me-1"></i>Username must be at least 4 characters
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-lock me-2"></i>Password
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" 
                                            required minlength="6" placeholder="Enter password">
                                        <span class="input-group-text password-toggle" onclick="togglePassword()">
                                            <i class="far fa-eye" id="toggleIcon"></i>
                                        </span>
                                    </div>
                                    <div class="password-requirements">
                                        <i class="fas fa-info-circle me-1"></i>Password must be at least 6 characters
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="confirm_password" class="form-label">
                                        <i class="fas fa-lock me-2"></i>Confirm Password
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirm_password" 
                                            name="confirm_password" required placeholder="Confirm password">
                                        <span class="input-group-text password-toggle" onclick="toggleConfirmPassword()">
                                            <i class="far fa-eye" id="toggleConfirmIcon"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-user-plus me-2"></i>Register
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>
                        
                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account? 
                                <a href="login.php" class="login-link">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
    })();

    document.getElementById('confirm_password').addEventListener('input', function () {
        if (this.value !== document.getElementById('password').value) {
            this.setCustomValidity('Passwords do not match');
        } else {
            this.setCustomValidity('');
        }
    });

    document.getElementById('password').addEventListener('input', function () {
        var confirmPassword = document.getElementById('confirm_password');
        if (confirmPassword.value !== '') {
            if (this.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('Passwords do not match');
            } else {
                confirmPassword.setCustomValidity('');
            }
        }
    });

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        function toggleConfirmPassword() {
            const confirmPasswordInput = document.getElementById('confirm_password');
            const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');
        
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            toggleConfirmIcon.classList.remove('fa-eye');
            toggleConfirmIcon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordInput.type = 'password';
            toggleConfirmIcon.classList.remove('fa-eye-slash');
            toggleConfirmIcon.classList.add('fa-eye');
        }
    }
    </script>
</body>
</html>