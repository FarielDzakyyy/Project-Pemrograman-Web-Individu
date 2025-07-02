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
            document.location.href = '../datamahasiswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = '../datamahasiswa.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

        <label for="name">Nama:</label>
        <input type="text" name="nama" id="name" required value="<?= $mhs['nama'] ?>" /><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required value="<?= $mhs['nim'] ?>" /><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan'] ?>" /><br>

        <label for="nohp">No HP:</label>
        <input type="text" name="nohp" id="nohp" required value="<?= $mhs['nohp'] ?>" /><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto"><br>
        <small>Biarkan kosong jika tidak ingin mengubah foto</small><br><br>

        <button type="submit" name="submit">Ubah</button>
    </form>
</body>
</html>