<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <style>
        body {
            background-image: url('images/rebg.jpg'); /* Specify the path to your background image */
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .user-icon {
            background: url('images/ico.png') no-repeat center center;
            background-size: cover; /* Ensures the image covers the area without distortion */
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #B8001F;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #800000;
        }
        .form-label {
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card glass-effect shadow-lg">
                    <div class="card-body">
                        <div class="user-icon"></div>

                        <h2 class="card-title text-center mb-4" style="color: white;">Sign In</h2>
                        <form action="proses_login.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" class="form-control" placeholder="Enter Username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">SIGN IN</button>
                        </form>
                        <div class="text-center mt-3">
                            <p style="color: white;">Not a member? <a href="register.php" >Create New Account</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>