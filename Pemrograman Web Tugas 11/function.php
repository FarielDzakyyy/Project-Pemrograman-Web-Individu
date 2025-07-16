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


function register($data)
{
   global $koneksi;

   $username = stripslashes($data["username"]);
   $password1 = $data["password1"];
   $password2 = $data["password2"];

   $query = "SELECT * FROM user WHERE username='$username'";

   $username_check = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($username_check) > 0)
    {
        return "Username Sudah Terdaftar!";
    }

    if(!preg_match('/^[a-zA-Z0-9.-_]+$/', $username))
    {
        return "Username Tidak Valid!";
    }

    if($password1 !== $password2)
    {
        return "Konfirmasi Password Tidak Sesuai!";
    }

    $encrypt_pass = password_hash($password1, PASSWORD_DEFAULT);

    $query_insert = "INSERT INTO user (username, password) VALUE ('$username', '$encrypt_pass')";

    if(mysqli_query($koneksi, $query_insert))
    {
        return "Register Berhasil";
    }
    else
    {
        return "Gagal" . mysqli_error($koneksi);
    }

}

?>