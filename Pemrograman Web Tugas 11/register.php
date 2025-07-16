<?php
require 'function.php';

$message = ""; // Untuk menampung hasil dari fungsi register()

if (isset($_POST["register"])) {
    $message = register($_POST);

    // Redirect jika sukses
    if ($message === "Register Berhasil!") {
        header("Location: login.php?success=1");
        exit;
    } else {
        // Gagal, tampilkan alert
        echo "<script>
                alert('" . addslashes($message) . "');
                window.location.href = 'register.php';
              </script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(199, 83, 207);
        }
        .card-custom {
            background-color: rgb(124, 73, 128);
            color: rgb(248, 248, 248);
        }
        .form-label, h2 {
            color: rgb(248, 248, 248);
        }
        a {
            color: #ffc107;
            font-weight: bold;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg card-custom" style="width: 500px;">
            <div class="card-body">
                <h2 class="text-center mb-4">REGISTER AKUN</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password1" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password1" name="password1" required>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password:</label>
                        <input type="password" class="form-control" id="password2" name="password2" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-light w-100">Daftar</button>
                </form>
                <p class="text-center mt-3">
                    Sudah punya akun? <a href="login.php">Login di sini</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>