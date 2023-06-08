<?php include('../conn.php'); ?>

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
    <?php if (isset($_GET['name'])) { $name = $_GET['name'];}?>
    <section class="dashboard">
    <div class="dash-content">
        <a href="pelanggan.php?name=<?= urlencode($name) ?>" class="home">home</a>
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
                        <?php
                            if (isset($_GET['name'])) {
                                $name = $_GET['name'];
                                $query = "SELECT transaksi.id_transaksi, transaksi.tanggal , pelanggan.nama_pelanggan, paket_cuci.paket, transaksi.qty, transaksi.biaya, transaksi.bayar, transaksi.kembalian 
                                            FROM transaksi 
                                            INNER JOIN pelanggan 
                                            ON transaksi.id_pelanggan = pelanggan.id_pelanggan
                                            INNER JOIN paket_cuci 
                                            ON transaksi.id_paket = paket_cuci.id_paket 
                                            WHERE transaksi.kembalian < 0 AND pelanggan.nama_pelanggan = :name
                                            ORDER BY transaksi.id_transaksi ASC";
                                $stmt = $conn->prepare($query);
                                $stmt->bindParam(':name', $name);
                                $stmt->execute();
                            } else {
                                echo "No name parameter provided.";
                                exit;
                            }
                        ?>

                            <?php $no = 1;
                            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;"><?= $data['id_transaksi']; ?></td>
                                    <td style="text-align: center;"><?= $data['tanggal']; ?></td>
                                    <td style="text-align: center;"><?= $data['nama_pelanggan']; ?></td>
                                    <td style="text-align: center;"><?= $data['paket']; ?></td>
                                    <td style="text-align: center;"><?= $data['qty']; ?></td>
                                    <td style="text-align: center;"><?= $data['biaya']; ?></td>
                                    <td style="text-align: center;"><?= $data['bayar']; ?></td>
                                    <td style="text-align: center;"><?= $data['kembalian']; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($data['kembalian'] < 0) {
                                            echo "<span class='keterangan-lunas'>Belum Lunas</span>";
                                        } else {
                                            echo "<span class='keterangan-belum-lunas'>Lunas</span>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="../script.js"></script>
</body>

</html>
