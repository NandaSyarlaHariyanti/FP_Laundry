<?php
    include('../conn.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tanggal = $_POST['tanggal'];
        $qty = $_POST['qty'];
        $biaya = $_POST['biaya'];
        $bayar = $_POST['bayar'];
        $kembalian = $_POST['kembalian'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $id_paket = $_POST['id_paket'];

         // Mendapatkan ID terakhir
        $lastIdQuery = "SELECT MAX(SUBSTRING(id_transaksi, 4)) AS max_id FROM transaksi";
        $stmt = $conn->prepare($lastIdQuery);
        $stmt->execute();
        $lastIdRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastId = $lastIdRow['max_id'];
        $newIdNumber = ($lastId !== null) ? intval($lastId) + 1 : 1;

        // Menghasilkan ID baru dengan kombinasi karakter dan angka
        $newId = 'TRS' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);

        // Menyiapkan pernyataan (prepared statement) untuk kueri INSERT
        $query = $conn->prepare("INSERT INTO transaksi (id_transaksi, id_pelanggan, id_paket, tanggal, qty, biaya, bayar, kembalian) 
                                VALUES (:id_transaksi, :id_pelanggan, :id_paket, :tanggal, :qty, :biaya, :bayar, :kembalian)");

     // Mengikat nilai-nilai parameter ke pernyataan
        $query->bindParam(':id_transaksi', $newId);
        $query->bindParam(':id_pelanggan', $id_pelanggan);
        $query->bindParam(':id_paket', $id_paket);
        $query->bindParam(':tanggal', $tanggal);
        $query->bindParam(':qty', $qty);
        $query->bindParam(':biaya', $biaya);
        $query->bindParam(':bayar', $bayar);
        $query->bindParam(':kembalian', $kembalian);

            // Mengubah auto increment pada kolom id_pelanggan
        $alterQuery = "ALTER TABLE pelanggan AUTO_INCREMENT = " . ($newIdNumber + 1);
        $conn->query($alterQuery);
        // Mengeksekusi pernyataan (prepared statement)
        if ($query->execute()) {
            echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location.href = '../transaksi/transaksi.php';
                </script>";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                    window.location.href = '../transaksi/transaksi.php';
                </script>";
        }        
    }

    $stmt = $conn->prepare("SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
    $stmt->execute();
    $pelanggan = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt_2 = $conn->prepare("SELECT id_paket, paket FROM paket_cuci");
    $stmt_2->execute();
    $paket_cuci = $stmt_2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-a1H+hRVW/n4h4/d73yQyRRgkFgn3jBku3a2lRlZImFHAj6rM2RUv8D6vymMBLtXPHfXE02hOlhRq/hE49lMDwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="formtransaksi.css">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>Tambah Transaksi</title>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Tambah Data Transaksi</h2>
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- Form fields go here -->
                <div class="form-group">
                    <label for="id_pelanggan">Nama Pelanggan</label>
                    <select name="id_pelanggan" placeholder="Pilih Nama Pelanggan" required autofocus>
                        <?php foreach ($pelanggan as $pelanggan_) { ?>
                            <option value="<?php echo $pelanggan_['id_pelanggan']; ?>">
                                <?php echo $pelanggan_['nama_pelanggan']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_paket">Jenis Paket</label>
                    <select name="id_paket" placeholder="Pilih Jenis Paket" required autofocus>
                        <?php foreach ($paket_cuci as $paket_cuci_) { ?>
                            <option value="<?php echo $paket_cuci_['id_paket']; ?>">
                                <?php echo $paket_cuci_['paket']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" maxlength="30" name="tanggal" id="tanggal" placeholder="Masukkan tanggal transaksi" required>
                </div>
                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="text" maxlength="100" name="qty" id="qty" placeholder="Masukkan jumlah quantity (kg)" required>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="text" maxlength="100" name="biaya" id="biaya" placeholder="Masukkan total harga" required>
                </div>
                <div class="form-group">
                    <label for="bayar">Bayar</label>
                    <input type="text" maxlength="100" name="bayar" id="bayar" placeholder="Masukkan total biaya yang dibayarkan" required>
                </div>
                <div class="form-group">
                    <label for="kembalian">Kembalian</label>
                    <input type="text" maxlength="100" name="kembalian" id="kembalian" placeholder="Tulis kembalian" required>
                </div>
                <div class="center-button">
                    <button type="reset" class="reset"><i class="fas fa-undo"></i> Reset</button>
                    <button type="submit" name="submit" class="save"><i class="fas fa-save"></i> Save</button>
                    
                </div>
                <div class="center-button">
                    <button class="back"><i class="fas fa-home"></i><a href="../transaksi/transaksi.php"> Kembali</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

