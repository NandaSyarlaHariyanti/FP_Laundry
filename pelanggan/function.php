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

    // Mendapatkan ID terakhir yang disisipkan
    $lastIdQuery = "SELECT MAX(SUBSTRING(id_pelanggan, 4)) AS max_id FROM pelanggan";
    $stmt = $conn->prepare($lastIdQuery);
    $stmt->execute();
    $lastIdRow = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastId = $lastIdRow['max_id'];
    $newIdNumber = ($lastId !== null) ? intval($lastId) + 1 : 1;

    // Menghasilkan ID baru dengan gabungan karakter dan angka
    $newId = 'PLG' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

    $query = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, username, password, alamat_pelanggan, no_hp_pelanggan)
            VALUES ('$newId', '$nama_pelanggan', '$username', '$password', '$alamat_pelanggan', '$no_hp_pelanggan')";
    $result = $conn->query($query);

    // Mengubah auto increment pada kolom id_pelanggan
    $alterQuery = "ALTER TABLE pelanggan AUTO_INCREMENT = " . ($newIdNumber + 1);
    $conn->query($alterQuery);


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

