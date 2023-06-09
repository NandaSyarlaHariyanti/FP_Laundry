<?php
    session_start();
    include '../conn.php';

    if (!isset($_SESSION['username'])) {
        header("Location: loginpelanggan.php");
        exit();
    }

    $username = $_SESSION['username'];

    $sql_pelanggan = "SELECT id_pelanggan, `nama_pelanggan` FROM pelanggan WHERE username = :username";
    $stmt_pelanggan = $conn->prepare($sql_pelanggan);
    $stmt_pelanggan->bindParam(':username', $username);
    $stmt_pelanggan->execute();
    $hasil_pelanggan = $stmt_pelanggan->fetch(PDO::FETCH_ASSOC);
    $id_pelanggan = $hasil_pelanggan['id_pelanggan'];
    $nama = $hasil_pelanggan['nama_pelanggan'];

    $sql_transaksi = "SELECT * FROM transaksi WHERE id_pelanggan = :id_pelanggan";
    $stmt_transaksi = $conn->prepare($sql_transaksi);
    $stmt_transaksi->bindParam(':id_pelanggan', $id_pelanggan);
    $stmt_transaksi->execute();
    $transaksi = $stmt_transaksi->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="styleriwayattransaksi.css">
</head>
<body>
    
        <h2>Selamat datang, <?php echo $nama; ?>!</h2>
        <div class="container">
        <h2>Daftar Transaksi</h2>
        <table>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>ID Pelanggan</th>
                <th>ID Paket</th>
                <th>Qty</th>
                <th>Biaya</th>
                <th>Bayar</th>
                <th>Kembalian</th>
            </tr>
            <?php foreach ($transaksi as $row) : ?>
                <?php if ($row['kembalian'] > 0) : ?>
                    <tr>
                        <td><?php echo $row['id_transaksi']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['id_pelanggan']; ?></td>
                        <td><?php echo $row['id_paket']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td><?php echo $row['biaya']; ?></td>
                        <td><?php echo $row['bayar']; ?></td>
                        <td><?php echo $row['kembalian']; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <br>
        <div class="button">
            <a href="loginpelanggan.php" class="button button-primary">Log Out</a>
            <a href="notasatuan.php" class="button button-secondary">Cetak</a>
        </div>

    </div>
</body>
</html>
