<?php
session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM mahasiswa";
$rows = query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f0f2f5;">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-primary">Data Mahasiswa</h1>
            <div>
                <a href="tambahdata.php" class="btn btn-success me-2">Tambah Data</a>
                <a href="logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($rows as $mhs): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="images/<?= htmlspecialchars($mhs['foto']); ?>" alt="<?= htmlspecialchars($mhs['nama']); ?>" width="100"></td>
                    <td><?= htmlspecialchars($mhs["nama"]); ?></td>
                    <td><?= htmlspecialchars($mhs["nim"]); ?></td>
                    <td><?= htmlspecialchars($mhs["jurusan"]); ?></td>
                    <td><?= htmlspecialchars($mhs["nohp"]); ?></td>
                    <td>
                        <a href="hapusdata.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="btn btn-danger btn-sm mb-1">Hapus</a>
                        <a href="ubahdata.php?id=<?= $mhs['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>