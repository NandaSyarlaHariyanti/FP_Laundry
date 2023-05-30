<?php

//Koneksi Ke Database
require '../conn.php';

function addpaket($data)
{
    global $conn;

    $id_paket =  htmlspecialchars($data["id_paket"]);
    $nama_paket =  htmlspecialchars($data["nama_paket"]);
    $harga_kilo =  htmlspecialchars($data["harga_kilo"]);
    $deskripsi =  htmlspecialchars($data["deskripsi"]);

    $query = "INSERT INTO  paket_cuci VALUES ('$id_paket', '$nama_paket', '$harga_kilo', '$deskripsi')";
    $result = $conn->query($query);

    return $result;
}

