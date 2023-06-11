<?php 
    include('../conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>Cetak Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        table {
            margin: 20px auto;
            background-color: #fff;
            border-collapse: collapse;
            max-width: 1000px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            font-size: 12px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .lunas {
            background-color: green;
            color: white;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .belum-lunas {
            background-color: red;
            color: white;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Data Transaksi Binato</h2>
    <table>
        <thead>
            <tr>
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
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT transaksi.id_transaksi, transaksi.tanggal, pelanggan.nama_pelanggan, paket_cuci.paket, transaksi.qty, transaksi.biaya, transaksi.bayar, transaksi.kembalian 
                    FROM transaksi 
                    INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan
                    INNER JOIN paket_cuci ON transaksi.id_paket = paket_cuci.id_paket 
                    ORDER BY transaksi.id_transaksi ASC";

            $result = $conn->query($query);
            $no = 1;
            $totalBiaya = 0; // Tambahkan variabel totalBiaya dan inisialisasi dengan 0
            
            while ($data = $result->fetch(PDO::FETCH_ASSOC)) :
                $keterangan = $data['kembalian'] < 0 ? 'Belum Lunas' : 'Lunas';
                $keteranganClass = $data['kembalian'] < 0 ? 'belum-lunas' : 'lunas';

                // Tambahkan nilai biaya setiap transaksi ke totalBiaya
                $totalBiaya += $data['biaya'];
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['id_transaksi']; ?></td>
                    <td><?= $data['tanggal']; ?></td>
                    <td><?= $data['nama_pelanggan']; ?></td>
                    <td><?= $data['paket']; ?></td>
                    <td><?= $data['qty']; ?></td>
                    <td>Rp <?= number_format($data['biaya'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($data['bayar'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($data['kembalian'], 0, ',', '.'); ?></td>
                    <td>
                        <span class="<?= $keteranganClass; ?>">
                            <?= $keterangan; ?>
                        </span>
                    </td>
                </tr>
            <?php endwhile; ?>

            <!-- Tambahkan baris untuk menampilkan total biaya -->
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Biaya</td>
                <td>Rp <?= number_format($totalBiaya, 0, ',', '.'); ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <script>
        window.print();

        window.onafterprint = function() {
            alert('Data Berhasil Dicetak');
            window.location.href = '../transaksi/transaksi.php';
        };
    </script>

</body>
</html>


