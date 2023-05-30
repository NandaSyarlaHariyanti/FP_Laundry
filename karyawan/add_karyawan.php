<?php
if (isset($_POST['submit'])) {
    $id                   = addslashes($_POST['id_karyawan']);
    $nama               = addslashes($_POST['nama_karyawan']);
    $email               = stripslashes($_POST['email']);
    $nohp               = stripslashes($_POST['no_hp']);
    $alamat               = addslashes($_POST['alamat']);
    $catatan               = addslashes($_POST['catatan']);
    $image = uploadImage('upload/karyawan');
    if (!$image) {
        return false;
    }
    $role                            = "Karyawan";


    $query = "INSERT INTO karyawan VALUES ( '$id', '$nama', '$email', '$nohp', '$alamat', '$catatan', '$image', '$role')";
    if (queryData($query) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = '?page=Karyawan';
            </script>";
    } else {
        echo "
                <script>
                    alert('Data gagal ditambahkan');
                    document.location.href = '?page=Karyawan';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Karyawan</title>
    <style>
        body {
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form-container {
            width: 600px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .center-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .center-button button {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Tambah Data Karyawan</h2>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama Karyawan</label>
                    <input type="text" maxlength="50" class="form-control" name="nama_karyawan" placeholder="Masukkan Nama Karyawan" required autofocus>
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div>
                    <label for="id">ID Karayawan</label>
                    <input type="text" maxlength="30" class="form-control" name="id_karyawan" placeholder="id karyawan" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" maxlength="200" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="no_hp">No Handphone</label>
                    <input type="number" min="0" maxlength="20" class="form-control" name="no_hp" placeholder="No Handphone" required>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" maxlength="100" class="form-control" name="alamat" placeholder="Alamat" required>
                </div>
                <div>
                    <label for="Catatan">Catatan</label>
                    <textarea type="text" maxlength="255" class="form-control" name="catatan" placeholder="Catatan" required></textarea>
                </div>
                <div>
                    <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
