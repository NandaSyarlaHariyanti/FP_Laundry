<?php
    include("../conn.php");

    // Ambil ID transaksi dari URL
    $id_transaksi = isset($_GET['id_transaksi']) ? $_GET['id_transaksi'] : '';

    // Query untuk mengambil data transaksi berdasarkan id_transaksi
    $query = "SELECT * FROM transaksi WHERE id_transaksi = :id_transaksi";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_transaksi', $id_transaksi);
    $stmt->execute();
    $data_transaksi = $stmt->fetch(PDO::FETCH_ASSOC);

    // Periksa apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
        $id_pelanggan = isset($_POST['id_pelanggan']) ? $_POST['id_pelanggan'] : '';
        $id_paket = isset($_POST['id_paket']) ? $_POST['id_paket'] : '';
        $qty = isset($_POST['qty']) ? $_POST['qty'] : '';
        $biaya = isset($_POST['biaya']) ? $_POST['biaya'] : '';
        $bayar = isset($_POST['bayar']) ? $_POST['bayar'] : '';
        $kembalian = isset($_POST['kembalian']) ? $_POST['kembalian'] : '';

        // Lakukan proses update data transaksi ke dalam database
        $query_update = "UPDATE transaksi SET tanggal = :tanggal, id_pelanggan = :id_pelanggan, id_paket = :id_paket, qty = :qty, biaya = :biaya, bayar = :bayar, kembalian = :kembalian WHERE id_transaksi = :id_transaksi";
        $stmt_update = $conn->prepare($query_update);
        $stmt_update->bindParam(':tanggal', $tanggal);
        $stmt_update->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt_update->bindParam(':id_paket', $id_paket);
        $stmt_update->bindParam(':qty', $qty);
        $stmt_update->bindParam(':biaya', $biaya);
        $stmt_update->bindParam(':bayar', $bayar);
        $stmt_update->bindParam(':kembalian', $kembalian);
        $stmt_update->bindParam(':id_transaksi', $id_transaksi);
        $stmt_update->execute();

        // Redirect ke halaman yang diinginkan setelah proses update selesai
        header("Location: transaksi.php");
        exit();
}

$stmt_1 = $conn->prepare("SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
$stmt_1->execute();
$pelanggan = $stmt_1->fetchAll(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="formupdate.css">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>Update Transaksi</title>
</head>

<body>
    <div class="container">
    <div class="form-container">
        <h2 class="form-title">Update Data Transaksi</h2>
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id_transaksi=' . $id_transaksi; ?>">
            <!-- Form fields go here -->
            <div>
                <input type="hidden" name="id_transaksi" value="<?php echo $data_transaksi['id_transaksi']; ?>">
            </div>
            <div>
                <label for="id_pelanggan">Nama Pelanggan</label>
                <select name="id_pelanggan" required autofocus>
                    <?php foreach ($pelanggan as $pelanggan_) { ?>
                        <option value="<?php echo $pelanggan_['id_pelanggan']; ?>" <?php if ($data_transaksi['id_pelanggan'] == $pelanggan_['id_pelanggan']) echo 'selected'; ?>>
                            <?php echo $pelanggan_['nama_pelanggan']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="id_paket">Jenis Paket</label>
                <select name="id_paket" required autofocus>
                    <?php foreach ($paket_cuci as $paket_cuci_) { ?>
                        <option value="<?php echo $paket_cuci_['id_paket']; ?>" <?php if ($data_transaksi['id_paket'] == $paket_cuci_['id_paket']) echo 'selected'; ?>>
                            <?php echo $paket_cuci_['paket']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="<?php echo $data_transaksi['tanggal']; ?>" required>
            </div>
            <div>
                <label for="qty">Quantity</label>
                <input type="text" name="qty" id="qty" value="<?php echo $data_transaksi['qty']; ?>" required>
            </div>
            <div>
                <label for="biaya">Biaya</label>
                <input type="text" name="biaya" id="biaya" value="<?php echo $data_transaksi['biaya']; ?>" required>
            </div>
            <div>
                <label for="bayar">Bayar</label>
                <input type="text" name="bayar" id="bayar" value="<?php echo $data_transaksi['bayar']; ?>" required>
            </div>
            <div>
                <label for="kembalian">Kembalian</label>
                <input type="text" name="kembalian" id="kembalian" value="<?php echo $data_transaksi['kembalian']; ?>" required>
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


