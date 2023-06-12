<?php
    require '../conn.php';

    $query = "SELECT transaksi.id_transaksi, transaksi.tanggal, transaksi.id_pelanggan, transaksi.id_paket, transaksi.qty, transaksi.biaya, transaksi.bayar, transaksi.kembalian 
              FROM transaksi
              INNER JOIN pelanggan
              ON transaksi.id_pelanggan = pelanggan.id_pelanggan
              INNER JOIN paket_cuci
              ON transaksi.id_paket = paket_cuci.id_paket
              ORDER BY transaksi.id_transaksi DESC LIMIT 5";
    
    // Menampilkan Jumlah Data ( Tabel )
    function numData($table) {
        global $conn;
        $stmt = $conn->query("SELECT * FROM $table");
        return $stmt->rowCount();
    }
    
    // Menampilkan Jumlah Data ( Query )
    function numQueryData($query) {
        global $conn;
        $stmt = $conn->query($query);
        return $stmt->rowCount();
    }
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
                <a href="<?php echo "dashboard.php"; ?>" class="active">
                    <i class='bx bxs-home-smile'></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="<?php echo "../admin/dashboard.php"; ?>">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href=" <?php echo "../pelanggan/list_pelanggan.php"; ?> ">
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
                    <a href=" <?php echo "../paketlaundry/list_paketlaundry.php "; ?>">
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
                    <span class="text">Home</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class='bx bxs-user'></i>
                        <span class="text">Jumlah Pelanggan</span>
						<span class="number"><?= numData('pelanggan'); ?></span>
                    </div>
                    <div class="box box2">
                        <i class='bx bxs-t-shirt'></i>
                        <span class="text">Jumlah Paket Laundry</span>
                        <span class="number"><?= numData('paket_cuci'); ?></span>
                    </div>
                    <div class="box box3">
                        <i class='bx bxs-user-voice'></i>
                        <span class="text">Jumlah Karyawan</span>
                        <span class="number"><?= numData('karyawan'); ?></span>
                    </div>                    
                    <div class="box box4">
                        <i class='bx bx-transfer'></i>
                        <span class="text">Jumlah Transaksi</span>
                        <span class="number"><?= numData('transaksi'); ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Transactions</span>
                </div>

                <div class="activity-data">
                    <!--isi-->
                </div>
            </div>
        </div>

    </section>

    <script src="../script.js"></script>
   
</body>

</html>
