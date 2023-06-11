<?php include('../conn.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styletransaksi.css">
    <link rel="stylesheet" href="styletransaksi2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>BINATO (FP)</title>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-washer'></i>
            <span class="logo_name">BINATO</span>
        </div>

        <ul class="nav-links">
            <li>
                <a href="<?php echo "../admin/dashboard.php"; ?>" >
                    <i class='bx bxs-home-smile'></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="<?php echo "../admin/dashboard.php"; ?>">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="<?php echo "../pelanggan/list_pelanggan.php"; ?>" >
                        <i class='bx bxs-user'></i>
                        <span class="link_name">Pelanggan</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Pelanggan</a></li>
                    <li><a href="<?php echo "../pelanggan/list_pelanggan.php"; ?>">List Pelanggan </a></li>
                    <li><a href="<?php echo "../pelanggan/add_pelanggan.php"; ?>">Tambah Pelanggan</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="<?php echo "../paketlaundry/list_paketlaundry.php "; ?>">
                        <i class='bx bxs-t-shirt'></i>
                        <span class="link_name">Paket Laundry</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Paket Laundry</a></li>
                    <li><a href="<?php echo "../paketlaundry/list_paketlaundry.php "; ?>">List Paket Laundry</a></li>
                    <li><a href="<?php echo "../paketlaundry/add_paketlaundry.php "; ?>">Tambah Paket Laundry </a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="<?php echo "../karyawan/list_karyawan.php"; ?>">
                        <i class='bx bxs-user-voice'></i>
                        <span class="link_name">Karyawan</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Karyawan</a></li>
                    <li><a href="<?php echo "../karyawan/list_karyawan.php"; ?>">List Karyawan</a></li>
                    <li><a href="<?php echo "../karyawan/add_karyawan.php"; ?>">Tambah Karyawan</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="<?php echo "../transaksi/transaksi.php"; ?>">
                        <i class='bx bx-transfer'></i>
                        <span class="link_name">Transaksi</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Transaksi</a></li>
                    <li><a href="<?php echo "../transaksi/transaksi.php"; ?>">List Transaksi</a></li>
                    <li><a href="<?php echo "../transaksi/add_transaksi.php"; ?>">Tambah Transaksi</a></li>
            </li>

        </ul>
    </div>

    <section class="dashboard">
        <div class="top">
            <div class="sidebar-button">
                <i class='bx bx-menu sidebar-toggle'></i>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">List Transaksi</span>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-start mb-4">
                        <a href="../transaksi/add_transaksi.php" class="btn btn-sm btn-primary mr-3">
                            <i class="fas fa-plus fa-sm text-white"></i> Tambah Transaksi
                        </a>
                        <a href="../transaksi/cetaktransaksi.php" target="_blank" class="btn btn-sm btn-info mr-3">
                            <i class="fas fa-download fa-sm text-white"></i> Cetak Transaksi</a>
                    </div>
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
                                <th>Kembalian</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT transaksi.id_transaksi, transaksi.tanggal , pelanggan.nama_pelanggan, paket_cuci.paket, transaksi.qty, transaksi.biaya, transaksi.bayar, transaksi.kembalian 
                                        FROM transaksi 
                                        INNER JOIN pelanggan 
                                        ON transaksi.id_pelanggan = pelanggan.id_pelanggan
                                        INNER JOIN paket_cuci 
                                        ON transaksi.id_paket = paket_cuci.id_paket 
                                        ORDER BY transaksi.id_transaksi ASC";
                            $result = $conn->query($query);
                            ?>

                            <?php $no = 1;
                            while ($data = $result->fetch(PDO::FETCH_ASSOC)) : ?>
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
                                    <td style="text-align: center;">
                                        <div class="btn-group">
                                            <a href="<?php echo "../transaksi/updatetransaksi.php?id_transaksi=" . $data['id_transaksi']; ?>" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form method="POST" action="../transaksi/hapustransaksi.php" style="display: inline;">
                                                <input class="bx bxs-delete" type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>">
                                                <button class="btn btn-outline-danger btn-sm" type="submit" name="deletes">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
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
