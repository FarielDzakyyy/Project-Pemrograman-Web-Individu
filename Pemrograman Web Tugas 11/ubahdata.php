<?php
require 'function.php';

$id = $_GET["id"];

// Ambil data mahasiswa berdasarkan ID
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];

if (isset($_POST["submit"])) {
    if (ubahdata($_POST, $id) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'datamahasiswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = 'datamahasiswa.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Ubah Data Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama" id="name" required value="<?= htmlspecialchars($mhs['nama']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM:</label>
                        <input type="text" class="form-control" name="nim" id="nim" required value="<?= htmlspecialchars($mhs['nim']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan:</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" required value="<?= htmlspecialchars($mhs['jurusan']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="nohp" class="form-label">No HP:</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" required value="<?= htmlspecialchars($mhs['nohp']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto:</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                    <a href="datamahasiswa.php" class="btn btn-secondary ms-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>