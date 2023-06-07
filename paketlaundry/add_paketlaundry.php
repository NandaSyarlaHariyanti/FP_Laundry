<?php
include('../conn.php');
include('../function.php');

// ID otomatis
if (isset($_POST["submit"])) {
    if (addpaket($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = '../paketlaundry/list_paketlaundry.php';
            </script> 
        ";
    } else {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = '../paketlaundry/list_paketlaundry.php';
            </script> 
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&family=Open+Sans&family=Raleway:wght@800&display=swap" rel="stylesheet">
    <title>Tambah Pelanggan</title>
    <style>
        body {
            background-image: url();
            background-size: cover;
            background-repeat: no-repeat;
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
        }

        .btn-reset {
            background-color: #c82333;
        }

        .btn-save {
            background-color: #28a745;
        }

        .btn-back {
            background-color: #0056b3;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="form-container">
            <h1>Tambah Data Paket Laundry</h1>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">ID Paket Laundry</label>
                    <input type="text" maxlength="50" class="form-control" name="id_paket" id="id_paket" placeholder="masukkan id paket laundry" required>
                </div>
                <div>
                    <label for="harga_kilo">Nama Paket</label>
                    <input type="text" maxlength="30" class="form-control" name="paket" id="paket" placeholder="masukkan nama paket" required>
                </div>
                <div>
                    <label for="deskripsi">Harga Per Kilo</label>
                    <input type="text" maxlength="100" class="form-control" name="harga_kilo" id="harga_kilo" placeholder="harga per kilo" required>
                </div>
                <div>
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" maxlength="100" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" required>
                </div>
                <div class="center-button">
                    <button type="reset" class="btn btn-reset">Hapus</button>
                    <button type="submit" name="submit" class="btn btn-save">Simpan</button>
                </div>
                <div class="center-button">
                    <a href="../paketlaundry/list_paketlaundry.php" class="btn btn-back">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
