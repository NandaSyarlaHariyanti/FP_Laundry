<?php
include('../conn.php');

if (isset($_POST['deletes'])) {
    $id_karyawan_del = $_POST['id_karyawan'];

    $get_image = "SELECT 'image' FROM karyawan WHERE id_karyawan='$id_karyawan_del'";
    $stmt = $conn->prepare($get_image);
    $stmt->bindParam(':id_karyawan', $id_karyawan_del);
        $stmt->execute();
        $image_lama = $stmt->fetch(PDO::FETCH_ASSOC);

        unlink("image/" . $image_lama['image']);

    $query = "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan_del'"; 
    $result = $conn->query($query);
    if ($result) {
        echo "
          <script>
              alert('Data Berhasil Dihapus');
              document.location.href = '../karyawan/list_karyawan.php';
          </script> 
      ";
    } else {
        echo "
          <script>
              alert('Data Gagal Dihapus');
              document.location.href = '../karyawan/list_karyawan.php';
          </script> 
      ";
    }
}
