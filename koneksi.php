<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "bunda_laundry";

    $koneksi = mysqli_connect($host, $username, $password);

    if ($koneksi) {
        echo "database berhasil";
    } else {
        echo "database gagal";
    }

    $hasil = mysqli_select_db($koneksi, $db);
    
    if ($hasil) {
        echo "berhasil $db dipilih";
    } else {
        echo "gagal $db dipilih";
    }

    // if ($koneksi->connect_error){
    //     die("Koneksi ke database gagal");
    // } else {
    //     echo ("koneksi ke database berhasl");
    // }
?>