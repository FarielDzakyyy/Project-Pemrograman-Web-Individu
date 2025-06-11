<?php 

    $koneksi = mysqli_connect("localhost:3307", "root", "", "webif");

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

?>