<?php
    $koneksi = mysqli_connect("localhost:3306", "root", "", "webif");

    if(!$koneksi)
    {
        die("koneksi Gagal".mysqli_connect_error());
    }

    function query($query)
    {
      global $koneksi;
       $result = mysqli_query($koneksi, $query);
       
       $rows = [];

       while ($row = mysqli_fetch_assoc($result) )
       {
         $rows[] = $row;
       }

       return $rows;
    }


    function tambahmahasiswa($data)
    {
        global $koneksi;

        $nama = $data["nama"];
        
        $nim = $data["nim"];
        $jurusan = $data["jurusan"];
        $nohp = $data["nohp"];

        $file = $_FILES['foto']['name'];
        $namafile = date ('dmy_hm'). '_' . $file;
        $temp = $_FILES['foto']['tmp_name'];
        $folder = 'images/';
        $path = $folder . $namafile;

        if(move_uploaded_file($temp, $path))
{
    $query = "INSERT INTO mahasiswa (foto, nama, nim, jurusan, nohp) 
              VALUES ('$namafile', '$nama', '$nim', '$jurusan', '$nohp')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

    }

    function hapusdata($id)
    {
        global $koneksi;
        $query = "DELETE FROM mahasiswa where id=$id";
        mysqli_query($koneksi,$query);

        return mysqli_affected_rows($koneksi);
    }
    
    function ubahdata($data, $id)
{
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $nohp = $data["nohp"];

    $namafile = ''; // default kosong

    // Cek apakah user upload foto baru
    if ($_FILES['foto']['error'] === 0) {
        $file = $_FILES['foto']['name'];
        $namafile = date('dmy_hm') . '_' . $file;
        $temp = $_FILES['foto']['tmp_name'];
        $folder = 'images/';
        $path = $folder . $namafile;

        move_uploaded_file($temp, $path);

        // Jika foto diupload
        $query = "UPDATE mahasiswa SET
            foto = '$namafile',
            nama = '$nama',
            nim = '$nim',
            jurusan = '$jurusan',
            nohp = '$nohp'
            WHERE id = $id";
    } else {
        // Jika tidak upload foto
        $query = "UPDATE mahasiswa SET
            nama = '$nama',
            nim = '$nim',
            jurusan = '$jurusan',
            nohp = '$nohp'
            WHERE id = $id";
    }

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


?>