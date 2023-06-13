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

        $sql_transaksi = "SELECT transaksi.id_transaksi, transaksi.tanggal, pelanggan.nama_pelanggan, paket_cuci.paket, transaksi.qty, transaksi.biaya, transaksi.bayar, transaksi.kembalian 
                    FROM transaksi 
                    INNER JOIN pelanggan 
                    ON transaksi.id_pelanggan = pelanggan.id_pelanggan
                    INNER JOIN paket_cuci 
                    ON transaksi.id_paket = paket_cuci.id_paket 
                    WHERE transaksi.kembalian < 0 AND pelanggan.id_pelanggan = :id_pelanggan
                    ORDER BY transaksi.id_transaksi ASC";

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

    <link rel="stylesheet" href="tagihan.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tagihan</title>
</head>

<body>
    <section class="dashboard">
    <div class="dash-content">
       <a href="dashboardpelanggan.php" class="home">home</a>
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">List Tagihan</span>
                </div>
                <div class="top">
                    <div class="search-box">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>

                <div class="card-body">
                    <br>
                    <table id="dataTables" class="table table-hover">
                        <thead>
                            <tr style="text-align: center;">
                                <th>No</th>
                                <th>Id Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Paket</th>
                                <th>Quantity</th>
                                <th>Biaya</th>
                                <th>Bayar</th>
                                <th>Jumlah yang Belum dibayar</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $no = 1?>;
                        <?php foreach ($transaksi as $row) : ?>
                            <?php if ($row['kembalian'] < 0) : ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;"><?= $row['id_transaksi']; ?></td>
                                    <td style="text-align: center;"><?= $row['tanggal']; ?></td>
                                    <td style="text-align: center;"><?= $row['nama_pelanggan']; ?></td>
                                    <td style="text-align: center;"><?= $row['paket']; ?></td>
                                    <td style="text-align: center;"><?= $row['qty']; ?></td>
                                    <td style="text-align: center;"><?= $row['biaya']; ?></td>
                                    <td style="text-align: center;"><?= $row['bayar']; ?></td>
                                    <td style="text-align: center;"><?= $row['kembalian']; ?></td>
                                    <td style="text-align: center;"><span class='keterangan-lunas'>Belum Lunas</span></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="../script.js"></script>
</body>

</html>
