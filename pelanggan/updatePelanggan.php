<?php
include('../conn.php');
include('function.php');


$id_pelanggan = $_GET["id_pelanggan"];
$status = $conn->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
$status->bindParam(':id_pelanggan', $id_pelanggan);
$status->execute();
$data = $status->fetch();

if (isset($_POST["submit"])) {
    if (updatePelanggan($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = '../pelanggan/list_pelanggan.php';
            </script> 
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = '../pelanggan/list_pelanggan.php';
            </script> 
        ";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .btn-save {
            background-color: #28a745;
        }

        .btn-back {
            background-color: #0056b3;
        }
    </style>
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>Update Pelanggan</title>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Update Data Pelanggan</h1>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label for="id_pelanggan">ID Pelanggan</label>
                    <input type="text" maxlength="50" class="form-control" name="id_pelanggan" id="id_pelanggan" style="background-color: #ccc" value="<?= $data['id_pelanggan'] ?? ''; ?>" required readonly>
                </div>
                <div>
                    <label for="nama_pelanggan">Nama Pelangan</label>
                    <input type="text" maxlength="30" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="<?= $data['nama_pelanggan']; ?>" required>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" maxlength="30" class="form-control" name="username" id="username" value="<?= $data['username']; ?>" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="text" maxlength="30" class="form-control" name="password" id="password" value="<?= $data['password']; ?>" required>
                </div>
                <div>
                    <label for="alamat_pelanggan">Alamat Pelanggan</label>
                    <input type="text" maxlength="30" class="form-control" name="alamat_pelanggan" id="alamat_pelanggan" value="<?= $data['alamat_pelanggan']; ?>" required>
                </div>
                <div>
                    <label for="no_hp_pelanggan">No. HP Pelanggan</label>
                    <input type="number" maxlength="30" class="form-control" name="no_hp_pelanggan" id="no_hp_pelanggan" value="<?= $data['no_hp_pelanggan']; ?>" required>
                </div>
                <div class="center-button">
                    <button type="submit" name="submit" class="btn btn-save">Simpan Perubahan</button>
                </div>
                <div class="center-button">
                    <a href="../pelanggan/list_pelanggan.php" class="btn btn-back">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
