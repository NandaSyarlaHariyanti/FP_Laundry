<?php
include('../conn.php');

$id_karyawan = $_GET["id_karyawan"];
$status = $conn->prepare("SELECT * FROM karyawan WHERE id_karyawan = :id_karyawan");
$status->bindParam(':id_karyawan', $id_karyawan);
$status->execute();
$data = $status->fetch();

if (isset($_POST["submit"])) {
    $id_karyawan = $data["id_karyawan"];
    $nama = addslashes($_POST['nama_karyawan']);
    $email = stripslashes($_POST['email']);
    $no_hp = stripslashes($_POST['no_hp']);
    $alamat = addslashes($_POST['alamat']);
    $catatan = addslashes($_POST['catatan']);
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $role = "Karyawan";

    if ($image_size > 2097152) {
        header("location:update_karyawan.php?pesan=size");
        exit;
    }

    $query = "UPDATE karyawan SET 
        nama_karyawan = :nama_karyawan,
        email = :email,
        no_hp = :no_hp,
        alamat = :alamat,
        catatan = :catatan";

    // Check if a new image is uploaded
    if (!empty($image_name)) {
        $ekstensi_izin = array('png', 'jpg', 'jpeg');
        $pisahkan_ekstensi = explode('.', $image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $image_nama_new = $tanggal . '-' . $image_name;

        if (in_array($ekstensi, $ekstensi_izin)) {
            $get_image = $conn->prepare("SELECT `image` FROM karyawan WHERE id_karyawan = :id_karyawan");
            $get_image->bindParam(':id_karyawan', $id_karyawan);
            $get_image->execute();
            $data_image = $get_image->fetch();

            unlink("image/" . $data_image['image']);
            move_uploaded_file($file_tmp, 'image/' . $image_nama_new);

            $query .= ", image = :image";
        } else {
            header("location:update_karyawan.php?pesan=invalid");
            exit;
        }
    }

    $query .= " WHERE id_karyawan = :id_karyawan";

    $statement = $conn->prepare($query);
    $statement->bindParam(':id_karyawan', $id_karyawan);
    $statement->bindParam(':image', $image_nama_new);
    $statement->bindParam(':nama_karyawan', $nama);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':no_hp', $no_hp);
    $statement->bindParam(':alamat', $alamat);
    $statement->bindParam(':catatan', $catatan);

    $result = $statement->execute();
    if ($result) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = '../karyawan/list_karyawan.php';
            </script> 
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = '../karyawan/list_karyawan.php';
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
                <form method="post" action="" enctype="multipart/form-data">
                    <div>
                        <label for="id_karyawan">Id Karyawan</label>
                        <input type="text" maxlength="50" class="form-control" name="id_karyawan" value="<?= $data['id_karyawan'] ?? ''; ?>" required readonly>
                    </div>

                    <div>
                        <label for="image">Image</label> <br>
                        <input type="file" class="form-control" name="image" required autofocus>
                    </div>


                    <div>
                         <label for="nama_karyawan">Nama Karyawan</label>
                         <input type="text" maxlength="50" class="form-control" name="nama_karyawan" value="<?= $data['nama_karyawan'];?>" required autofocus>
                    </div>

                    <div>
                         <label for="email">Email</label>
                         <input type="text" maxlength="50" class="form-control" name="email" value="<?= $data['email'];?>" required autofocus>
                    </div>

                    <div>
                         <label for="no_hp">No Handphone</label>
                         <div>
                            <input type="text" maxlength="50" class="form-control" name="no_hp" value="<?= $data['no_hp'];?>" required autofocus>
                         </div>
                    </div>

                    <div>
                         <label for="alamat">Alamat</label>
                         <div>
                            <input type="text" maxlength="50" class="form-control" name="alamat" value="<?= $data['alamat'];?>" required autofocus>
                         </div>
                    </div>

                    <div>
                         <label for="catatan">Catatan</label>
                         <div>
                            <input type="text" maxlength="50" class="form-control" name="catatan" value="<?= $data['catatan'];?>" required autofocus>
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