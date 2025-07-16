<?php
require 'function.php';

if (isset($_POST["submit"])) {
    if (tambahmahasiswa($_POST) > 0) {
        echo "<script>alert('Berhasil!'); document.location.href = 'datamahasiswa.php';</script>";
    } else {
        echo "<script>alert('Gagal!'); document.location.href = 'datamahasiswa.php';</script>";
        mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #eef2f7;">
    <div class="container mt-5">
        <div class="card shadow-lg" style="max-width: 600px; margin: auto;">
            <div class="card-body">
                <h3 class="text-center text-primary mb-4">Tambah Data Mahasiswa</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="nama" id="name" class="form-control" placeholder="Nama Lengkap" required />
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" name="nim" id="nim" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No HP</label>
                        <input type="text" name="nohp" id="nohp" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" required />
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>