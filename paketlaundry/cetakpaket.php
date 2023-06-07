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

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Paket</th>
                <th>Nama Paket</th>
                <th>Harga Per Kilo</th>
                <th>Deskripsi Paket</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //proses menampilkan data dari database:
            //siapkan query SQL
            $query = "SELECT * FROM paket_cuci";
            //eksekusi query
            $result = $conn->query($query);
            $no = 1;
            while ($data = $result->fetch(PDO::FETCH_ASSOC)) :
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['id_paket']; ?></td>
                    <td><?php echo $data['paket']; ?></td>
                    <td><?php echo $data['harga_kilo']; ?></td>
                    <td class="description"><?php echo $data['deskripsi']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    </section>

    <script>
        window.print();
    </script>
</body>

</html>