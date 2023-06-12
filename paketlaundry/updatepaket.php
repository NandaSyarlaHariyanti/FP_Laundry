<?php
include('../conn.php');
include('../function.php');


$id_paket = $_GET["id_paket"];
$status = $conn->prepare("SELECT * FROM paket_cuci WHERE id_paket = :id_paket");
$status->bindParam(':id_paket', $id_paket);
$status->execute();
$data = $status->fetch();

if (isset($_POST["submit"])) {
    if (updatepaket($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = '../paketlaundry/list_paketlaundry.php';
            </script> 
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = '../paketlaundry/list_paketlaundry.php';
            </script> 
        ";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <style>
        body {
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 20px;
        }

        .form-container {
            width: 500px;
            padding: 20px;
            padding-left: 30px;
            background-color: #f8f9fa;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 10px 30px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-control {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .center-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .center-button button {
            margin-right: 10px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-save {
            background-color: #28a745;
        }

        .btn-back {
            background-color: #0056b3;
        }
    </style>

    <title>Update Pelanggan</title>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Update Data Paket Laundry</h1>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">ID Paket Laundry</label>
                    <input type="text" maxlength="50" class="form-control" name="id_paket" id="id_paket" style="background-color: #ccc" value="<?= $data['id_paket'] ?? ''; ?>" required readonly>
                </div>
                <div>
                    <label for="harga_kilo">Nama Paket</label>
                    <input type="text" maxlength="30" class="form-control" name="paket" id="paket" value="<?= $data['paket']; ?>" required>
                </div>
                <div>
                    <label for="deskripsi">Harga Per Kilo</label>
                    <input type="text" maxlength="100" class="form-control" name="harga_kilo" id="harga_kilo" value="<?= $data['harga_kilo']; ?>" required>
                </div>
                <div>
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" maxlength="100" class="form-control" name="deskripsi" id="deskripsi" value="<?= $data['deskripsi']; ?>" required>
                </div>
                <div class="center-button">
                    <button type="submit" name="submit" class="btn btn-save">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
                <div class="center-button">
                    <a href="../paketlaundry/list_paketlaundry.php" class="btn btn-back">
                        <i class="fas fa-home"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
