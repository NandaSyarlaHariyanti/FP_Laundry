<?php
    require '../conn.php';

    $query = "SELECT transaksi.id_transaksi, transaksi.tanggal , pelanggan.nama_pelanggan, paket_cuci.paket, transaksi.qty, transaksi.biaya, transaksi.bayar, transaksi.kembalian 
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

    // Logout
    if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
        // Tampilkan konfirmasi alert sebelum logout
        echo "<script>
            var confirmLogout = confirm('Anda yakin untuk logout?');
            if (confirmLogout) {
                // Hapus cookie dengan nama 'login'
                document.cookie = 'login=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                // Redirect ke halaman login atau halaman lain yang sesuai
                alert('Logout Berhasil');
                window.location.href = '../index.php';
            } else {
                // Batal logout
                alert('Logout Dibatalkan');
                window.location.href = '../admin/dashboard.php';
            }
        </script>";
        exit;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>BINATO (FP)</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            text-align: center;
            border-radius: 6px;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        .modal-content .buttons {
            margin-top: 20px;
        }

        .modal-content .buttons button {
            margin: 0 10px;
        }

        table {
            border-collapse: collapse;
            margin: 30px 40px;
            width: 90%;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            max-width: auto;
            text-align: center;
        }
        #action {
            white-space: nowrap;

        }

        td.description {
            max-width: 250px;
            word-wrap: break-word;
            text-align: left;
        }

        th {
            background-color: #789EA2;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
            margin-right: 5px;
        }

        .btn-edit {
            background-color: transparent;
            border-color: #ffc107;
            color: #ffc107;
        }

        .btn-hapus {
            background-color: transparent;
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-edit:active,
        .btn-edit:hover {
            background-color: #ffc107;
            color: #000;
        }

        .btn-hapus:active,
        .btn-hapus:hover {
            background-color: #dc3545;
            color: #fff;
        }
        #icon {
            margin-top: 15px;
            margin-bottom:5px;
        }
    </style>
</head>

<body>
    <div class="sidebar close">

    <div class="logo-details">
        <i class='bx bxs-washer'></i>
        <span class="logo_name">BINATO</span>

    </div>

    <ul class="nav-links">
        <li>
            <a href="<?php echo "../admin/dashboard.php"; ?>" class="active">
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
                <i class="bx bx-chevron-down"></i>
                <div class="dropdown">
                    
                    <a href="?logout=true" id="logout">
                        <i class="fas fa-sign-out-alt"></i> Log Out
                    </a>
                </div>
            </div>
        </div>
           

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class='bx bxs-user' id="icon"></i>
                        <span class="text"><center>Jumlah Pelanggan<center></span>
						<span class="number"><?= numData('pelanggan'); ?></span>
                    </div>
                    <div class="box box2">
                        <i class='bx bxs-t-shirt' id="icon"></i>
                        <span class="text"><center>Jumlah Paket Laundry<center></span>
                        <span class="number"><?= numData('paket_cuci'); ?></span>
                    </div>
                    <div class="box box3">
                        <i class='bx bxs-user-voice' id= "icon"></i>
                        <span class="text"><center>Jumlah Karyawan<center></span>
                        <span class="number"><?= numData('karyawan'); ?></span>
                    </div>                    
                    <div class="box box4">
                        <i class='bx bx-transfer'id="icon"></i>
                        <span class="text"><center>Jumlah Transaksi<center></span>
                        <span class="number"><?= numData('transaksi'); ?></span>
                    </div>
                </div>
            </div>

            <div class="database">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Transactions</span>
                </div>

                <div class="database-data">
                    <div class="center">
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
                                        <td id="action">    
                                            <a href="<?php echo "../transaksi/updatetransaksi.php?id_transaksi=" . $data['id_transaksi']; ?>" class="btn btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form method="POST" action="../transaksi/hapustransaksi.php" style="display: inline;">
                                                <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>">
                                                <button type="submit" name="deletes" class="btn btn-hapus">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>                       
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="../script.js"></script>
   
</body>

</html>
