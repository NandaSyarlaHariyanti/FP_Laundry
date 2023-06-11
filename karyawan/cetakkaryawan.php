<?php
include('../conn.php');
include('../function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>BINATO (FP)</title>
    <style>
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

        td.description {
            max-width: 250px;
            word-wrap: break-word;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body onload="window.print()">
    <div>
        <table id="dataTables">
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
