<?php
include('../conn.php');
if (isset($_POST['submit'])) {
    $id                   = addslashes($_POST['id_karyawan']);
    $nama               = addslashes($_POST['nama_karyawan']);
    $email               = stripslashes($_POST['email']);
    $nohp               = stripslashes($_POST['no_hp']);
    $alamat               = addslashes($_POST['alamat']);
    $catatan               = addslashes($_POST['catatan']);
    $image_name            = $_FILES['image']['name'];
    $image_size            = $_FILES['image']['size'];
    $role = "Karyawan";

    $checkQuery = "SELECT * FROM karyawan WHERE id_karyawan = '$id'";
    $checkResult = $conn->query($checkQuery);

    if ($image_size > 2097152) {
        header("location:add_karyawan.php?pesan=size");
      }else{
        if ($image_name != "") {
          $ekstensi_izin = array('png','jpg','jpeg');
          $pisahkan_ekstensi = explode('.', $image_name); 
          $ekstensi = strtolower(end($pisahkan_ekstensi));
          $file_tmp = $_FILES['image']['tmp_name'];  
          $tanggal = md5(date('Y-m-d h:i:s'));
          $image_nama_new = $tanggal.'-'.$image_name; 
          if(in_array($ekstensi, $ekstensi_izin) === true)  {
                  move_uploaded_file($file_tmp, 'image/'.$image_nama_new);

        $query = "INSERT INTO karyawan VALUES ( '$id', '$nama', '$email', '$nohp', '$alamat', '$catatan', '$image_nama_new', '$role')";
        $result = $conn->query($query);
        
        if ($result > 0) {
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
          }}}

}
?>

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

    <title>Tambah Karyawan</title>
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
            <h2>Tambah Data Karyawan</h2>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama" >Nama Karyawan</label>
                    <input type="text" maxlength="50" class="form-control" name="nama_karyawan" placeholder="Masukkan Nama Karyawan" required autofocus>
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div>
                    <label for="id">ID Karyawan</label>
                    <input type="text" maxlength="30" class="form-control" name="id_karyawan" placeholder="id karyawan" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" maxlength="200" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="no_hp">No Handphone</label>
                    <input type="text" min="0" maxlength="20" class="form-control" name="no_hp" placeholder="No Handphone" required>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" maxlength="100" class="form-control" name="alamat" placeholder="Alamat" required>
                </div>
                <div>
                    <label for="Catatan">Catatan</label>
                    <textarea type="text" maxlength="255" class="form-control" name="catatan" placeholder="Catatan" required></textarea>
                </div>
                <div class="center-button">
                    <button type="reset" class="btn btn-reset">Hapus</button>
                    <button type="submit" name="submit" class="btn btn-save">Simpan</button>
                </div>

                <div class="center-button"> 
                    <a class="btn btn-back" href="list_karyawan.php"> Kembali </a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>
