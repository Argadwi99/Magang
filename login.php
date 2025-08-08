<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Balai Konservasi Sumber Daya Alam - Login</title>
    <link rel="icon" type="image/png" href="img/logo2.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/gunung.jpg') no-repeat center center;
            background-size: cover;
            position: relative;
            z-index: 1;
        }
        .login-card {
            max-width: 450px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card card p-5 shadow-sm">
            <div class="text-center mb-4">
                <img src="img/logo2.png" alt="Logo BKSDA Jawa Tengah" style="width: 80px; height: auto;" class="mb-3">
                <h1 class="h3 mb-3 fw-bold text-primary">Login Admin</h1>
                <p class="text-muted">Masuk untuk mengakses dashboard admin.</p>
            </div>
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'failed') {
                echo '<div class="alert alert-danger" role="alert">Username atau password salah!</div>';
            }
            if (isset($_GET['status']) && $_GET['status'] == 'registered') {
                echo '<div class="alert alert-success" role="alert">Registrasi berhasil! Silakan login.</div>';
            }
            ?>
            <form action="proses-login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
            </form>
            <div class="mt-3 text-center">
                <p class="mb-0">Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
            </div>
        </div>
    </div>
</body>
</html>