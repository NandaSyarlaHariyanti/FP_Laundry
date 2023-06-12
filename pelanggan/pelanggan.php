<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../binatoo.ico" type="image/x-icon">
  <title>Halaman dengan Dua Box</title>
  <link rel="stylesheet" href="stylepelanggan.css">
  <link href='https://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <style>
        body {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
        }

        .container {
            display: grid;
            grid-template-rows: auto 1fr;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
            padding: 50px;
        }

        .box1 {
          grid-row: 1;
          grid-column: 1 / span 2;
          height: 100px;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .box2 {
          grid-row: 2;
          grid-column: 1;
          height: 100px;
          background-color: #FF6E3C;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 10px;
          text-decoration: none;
          color: inherit;
        }

        .box3 {
          grid-row: 2;
          grid-column: 2;
          height: 100px;
          background-color: #FFD74B;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 10px;
          text-decoration: none;
          color: inherit;
        }

        .box2:hover,
        .box3:hover {
          box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.3);
        }
  </style>
</head>
<body>
  <div class="container hallo">
    <div class="box1">
      <?php
      if (isset($_GET['name'])) {
          $name = $_GET['name'];
          echo "<h1 >Hi, $name!</h1>";
      }
      ?>
    </div>
    <a href="tagihan.php?name=<?= urlencode($name) ?>" class="box2">
        Tagihan
    </a>
    <a href="riwayattransaksi.php?name=<?= urlencode($name) ?>" class="box3">
        Riwayat
    </a>
  </div>
</body>
</html>
