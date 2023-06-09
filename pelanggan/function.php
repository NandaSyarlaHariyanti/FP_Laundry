<?php

//Koneksi Ke Database
require '../conn.php';

function addPelanggan($data)
{
    global $conn;

    $id_pelanggan =  htmlspecialchars($data["id_pelanggan"]);
    $nama_pelanggan =  htmlspecialchars($data["nama_pelanggan"]);
    $username =  htmlspecialchars($data["username"]);
    $password =  htmlspecialchars($data["password"]);
    $alamat_pelanggan =  htmlspecialchars($data["alamat_pelanggan"]);
    $no_hp_pelanggan =  htmlspecialchars($data["no_hp_pelanggan"]);

    $query = "INSERT INTO  pelanggan VALUES ('$id_pelanggan', '$nama_pelanggan', '$username', '$password', '$alamat_pelanggan', '$no_hp_pelanggan')";
    $result = $conn->query($query);

    return $result;
}

function updatePelanggan($data)
{
    global $conn;

    $id_pelanggan = $data["id_pelanggan"];
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $alamat_pelanggan =  htmlspecialchars($data["alamat_pelanggan"]);
    $no_hp_pelanggan =  htmlspecialchars($data["no_hp_pelanggan"]);

    $query = "UPDATE pelanggan SET 
                nama_pelanggan = :nama_pelanggan,
                username = :username,
                password = :password,
                alamat_pelanggan = :alamat_pelanggan,
                no_hp_pelanggan = :no_hp_pelanggan
                WHERE id_pelanggan = :id_pelanggan";

    $statement = $conn->prepare($query);
    $statement->bindParam(':nama_pelanggan', $nama_pelanggan);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':alamat_pelanggan', $alamat_pelanggan);
    $statement->bindParam(':no_hp_pelanggan', $no_hp_pelanggan);
    $statement->bindParam(':id_pelanggan', $id_pelanggan);

    $result = $statement->execute();

    return $result;
}

