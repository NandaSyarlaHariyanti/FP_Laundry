<?php
include('../conn.php');

if (isset($_POST['deletes'])) {
    $id_paket = $_POST['id_paket'];

    $query1 = "DELETE FROM paket_cuci WHERE id_paket IN (SELECT id_paket from paket_cuci WHERE id_paket = '$id_paket')";
    $result1 = $conn->query($query1);

    $query2 = "DELETE FROM transaksi WHERE id_paket = '$id_paket'";
    $result2 = $conn->query($query2);


    if ($result1 && $result2) {
        echo "
          <script>
              alert('Data Berhasil Dihapus');
              document.location.href = '../paketlaundry/list_paketlaundry.php';
          </script> 
      ";
    } else {
        echo "
          <script>
              alert('Data Gagal Dihapus');
              document.location.href = '../paketlaundry/list_paketlaundry.php';
          </script> 
      ";
    }
}
