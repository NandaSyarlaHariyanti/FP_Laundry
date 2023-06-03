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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>

    <title>Update Pelanggan</title>
</head>

<body>
    <div class="container">
        <div class="card mt-6 mb-6">
            <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
                <a>Edit Paket</a>
                <a href="?page=Paket" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-chevron-left fa-sm fa-fw"></i>
                </a>
            </h5>

            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group row">
                        <label for="id_paket" class="col-sm-2 col-form-label">Id Paket</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_paket" name="id_paket" value="<?= $data['id_paket'] ?? ''; ?>" required readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="paket" class="col-sm-2 col-form-label">Nama Paket</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="paket" name="paket" value="<?= $data['paket']; ?>" maxlength="50" placeholder="Masukkan Nama Paket" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_kilo" class="col-sm-2 col-form-label">Harga Per Kilo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga_kilo" name="harga_kilo" min="1000" value="<?= $data['harga_kilo']; ?>" placeholder="Masukkan Harga Per Kilo" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Paket</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" maxlength="255" placeholder="Masukkan Deskripsi Paket" required><?= $data['deskripsi']; ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
                        <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Change</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
