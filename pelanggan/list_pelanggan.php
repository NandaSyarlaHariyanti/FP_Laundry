<?php
include('../conn.php');
include('../function.php');

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
            window.location.href = 'list_pelanggan.php';
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

    <link rel="stylesheet" href="stylepelanggan.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>BINATO (FP)</title>
    <style>
        .card-body {
            margin: 10px 10px;
        }

        .button-group {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 4px;
        }

        .button-tambah {
            background-color: #007bff;
            border-radius: 5px;
            color: #fff;
            border: none;
            padding: 0.5rem;
            margin-right: 3px;
            text-decoration: none;
        }

        .button-cetak {
            background-color: #17a2b8;
            border-radius: 5px;
            color: #fff;
            border: none;
            padding: 0.5rem;
            margin-right: 3px;
            text-decoration: none;
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
                    <a href="<?php echo "../pelanggan/list_pelanggan.php"; ?>" class="active">
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
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">List Pelanggan</span>
                </div>
                <div class="card-body">
                    <!-- START: Button -->
                    <div class="button-group">
                        <a href="../pelanggan/add_pelanggan.php" class="button-tambah">
                            <i class="fas fa-plus fa-sm"></i> Tambah Data
                        </a>
                        <span>&nbsp;&nbsp;</span>
                        <a href="../pelanggan/cetakPelanggan.php" target="_blank" class="button-cetak">
                            <i class="fas fa-download fa-sm"></i> Cetak File
                        </a>
                    </div>
                </div>
            </div>
        
            <div class="database">
                <div class="database-data">
                    <div class="center">        
                        <table id="dataTables" class="table table-hover">
                            <thead>
                                <tr style="text-align : center;">
                                    <th>No</th>
                                    <th>ID Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Alamat Pelanggan</th>
                                    <th>No. HP Pelanggan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //proses menampilkan data dari database:
                                //siapkan query SQL
                                $query = "SELECT * FROM pelanggan";
                                //eksekusi query
                                $result = $conn->query($query);
                                $no = 1;
                                while ($data = $result->fetch(PDO::FETCH_ASSOC)) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['id_pelanggan']; ?></td>
                                        <td><?php echo $data['nama_pelanggan']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['password']; ?></td>
                                        <td><?php echo $data['alamat_pelanggan']; ?></td>
                                        <td><?php echo $data['no_hp_pelanggan']; ?></td>
                                        <td id="action">
                                            <a href="updatePelanggan.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>" class="btn btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>   
                                            <form method="POST" action="../pelanggan/hapusPelanggan.php" style="display: inline-block;">
                                                <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>">
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

    <!--<script src="script.js"></script>-->
    <script src="../script.js"></script>
</body>

</html>
