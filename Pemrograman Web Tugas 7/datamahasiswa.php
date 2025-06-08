<?php
    
    $koneksi = mysqli_connect("localhost:3307", "root", "", "webif");

    if(!$koneksi)
    {
        die("koneksi Gagal".mysqli_connect_error());
    }
    
    $query = "SELECT * FROM mahasiswa";

    $result = mysqli_query($koneksi, $query);  //// object
    
    // ambil data dari lemari result 
    $mhs = mysqli_fetch_row($result);
    // mysqli_fetch_assoc()
    // mysqli_fetch_array()
    // mysqli_fetch_object()

    var_dump($result);
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
            <th>Nama</th>
            <th>Nim</th>
            <th>Prodi</th>
            <th>No. HP</th>
        </tr>
    </table>
</body>
</html>