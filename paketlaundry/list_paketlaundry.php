<?php
include('../conn.php');
include('../function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="stylepaketlaundry.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                    <a href=" # ">
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
                    <a href=" # ">
                        <i class='bx bxs-t-shirt'></i>
                        <span class="link_name">Paket Laundry</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Paket Laundry</a></li>
                    <li><a href="<?php echo "../paketlaundry/list_paketlaundry.php"; ?>">List Paket Laundry</a></li>
                    <li><a href="<?php echo "../paketlaundry/add_paketlaundry.php"; ?>">Tambah Paket Laundry</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href=" # ">
                        <i class='bx bxs-user-voice'></i>
                        <span class="link_name">Karyawan</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="<?php echo "../karyawan/karyawan.php"; ?>">List Karyawan</a></li>
                    <li><a href="<?php echo "../karyawan/add_karyawan.php"; ?>">Tambah Karyawan</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href=" # ">
                        <i class='bx bx-transfer'></i>
                        <span class="link_name">Transaksi</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="<?php echo "../transaksi/transaksi.php"; ?>">List Transaksi</a></li>
                    <li><a href="<?php echo "../transaksi/add_transaksi.php"; ?>">Tambah Transaksi</a></li>
                </ul>
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
                    <span class="text">List Paket Laundry</span>
                </div>
            </div>
            <div class="card-body">
                <!-- START: Button -->
                <div class="d-flex justify-content-start mb-4">
                    <a href="../paketlaundry/add_paketlaundry.php" type="button" class="btn btn-sm btn-primary mr-3">
                        <i class="fas fa-plus fa-sm text-white">
                        </i> Tambah Data
                    </a>
                    &nbsp;&nbsp;
                    <a href="../paket/cetakpaket.php" target="_blank" type="button" class="btn btn-sm btn-info mr-3">
                        <i class="fas fa-download fa-sm text-white">
                        </i> Cetak File</a>
                </div>
                <!-- END: Button -->
                <table id="dataTables" class="table table-hover">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>ID Paket</th>
                            <th>Nama Paket</th>
                            <th>Harga Per Kilo</th>
                            <th>Deskripsi Paket</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        //proses menampilkan data dari database:
                        //siapkan query SQL
                        $query = "SELECT * FROM paket_cuci";
                        //eksekusi query
                        $result = $conn->query($query);
                        $no = 1; ?>

                        <?php while ($data = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['id_paket']; ?></td>
                                <td><?= $data['paket']; ?></td>
                                <td><?= $data['harga_kilo']; ?></td>
                                <td><?= $data['deskripsi']; ?></td>
                                <td>
                                    <a href="<?php echo "updatepaket.php?id_paket=" . $data['id_paket']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                                    &nbsp;&nbsp;
                                    <form method="POST" action="../paketlaundry/hapuspaket.php">
                                        <input class="bx bxs-delete" type="hidden" name="id_paket" value="<?php echo $data['id_paket']; ?>">
                                        <button class="btn btn-outline-danger btn-sm" type="submit" name="deletes">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <script src="script.js"></script>
    <script>
        const body = document.querySelector("body"),
            modeToggle = body.querySelector(".mode-toggle");
        sidebar = body.querySelector(".sidebar");
        sidebarToggle = body.querySelector(".sidebar-toggle");

        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }

        let getStatus = localStorage.getItem("status");
        if (getStatus && getStatus === "close") {
            sidebar.classList.toggle("close");
        }

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if (sidebar.classList.contains("close")) {
                localStorage.setItem("status", "close");
            } else {
                localStorage.setItem("status", "open");
            }
        })


        sidebarToggle.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarToggle.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarToggle.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
</body>

</html>
