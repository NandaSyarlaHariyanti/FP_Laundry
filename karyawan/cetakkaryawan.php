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

    <link rel="stylesheet" href="stylekaryawan.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>BINATO (FP)</title>
</head>

<body onload="window.print()">
    <div class="card-body">
        <table id="dataTables" class="table table-hover">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>ID Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Catatan</th>
                    <th>Foto</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM karyawan";
                $result = $conn->query($query);
                $no = 1;
                while ($data = $result->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['id_karyawan']; ?></td>
                        <td><?= $data['nama_karyawan']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td><?= $data['no_hp']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['catatan']; ?></td>
                        <td>
                            <?php if ($data['image'] != '') : ?>
                                <img src="image/<?php echo $data['image']; ?>" style= "max-height: 160px; max-width: 160px; object-fit: contain";>
                            <?php else : ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td><?= $data['role']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
