<?php
    
    require 'function.php';

    
    $query = "SELECT * FROM mahasiswa";

    $rows = query($query); // hasilnya wadah dengan isinya

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>No. HP</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($rows as $mhs) { ?>
        <tr>
           <td><?= $i ?></td>
           <td><img src="images/<?= $mhs['foto']; ?>" alt="<?= $mhs['nama'];?>"width="90"></td>
           <td><?= $mhs["nama"] ?></td>
           <td><?= $mhs["nim"] ?></td>
           <td><?= $mhs["jurusan"] ?></td>
           <td><?= $mhs["nohp"] ?></td>
        </tr>
        <?php $i++; } ?>

    </table>
</body>
</html>