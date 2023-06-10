<?php

//Koneksi Ke Database
require '../conn.php';

function addpaket($data)
{
    global $conn;

    $id_paket =  htmlspecialchars($data["id_paket"]);
    $paket =  htmlspecialchars($data["paket"]);
    $harga_kilo =  htmlspecialchars($data["harga_kilo"]);
    $deskripsi =  htmlspecialchars($data["deskripsi"]);

    $query = "INSERT INTO  paket_cuci VALUES ('$id_paket', '$paket', '$harga_kilo', '$deskripsi')";
    $result = $conn->query($query);

    return $result;
}

function updatepaket($data)
{
    global $conn;

    $id_paket = $data["id_paket"];
    $paket = htmlspecialchars($data["paket"]);
    $harga_kilo = htmlspecialchars($data["harga_kilo"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $query = "UPDATE paket_cuci SET 
                paket = :paket,
                harga_kilo = :harga_kilo,
                deskripsi = :deskripsi
                WHERE id_paket = :id_paket";

    $statement = $conn->prepare($query);
    $statement->bindParam(':paket', $paket);
    $statement->bindParam(':harga_kilo', $harga_kilo);
    $statement->bindParam(':deskripsi', $deskripsi);
    $statement->bindParam(':id_paket', $id_paket);

    $result = $statement->execute();

    return $result;
}
