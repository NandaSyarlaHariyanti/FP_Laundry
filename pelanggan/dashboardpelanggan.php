<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .buttons-container {
            display: flex;
        }

        .tagihan-button {
            padding: 10px 20px;
            height: 100px;
            width: 300px;
            font-size: 40px;
            border-radius: 5px;
            background-color: #FF6E3C;
            color: white;
            border: none;
            cursor: pointer;
            margin: 10px;
        }

        .riwayat-button {
            padding: 10px 20px;
            height: 100px;
            width: 300px;
            font-size: 40px;
            border-radius: 5px;
            background-color: #FFD74B;
            color: white;
            border: none;
            cursor: pointer;
            margin: 10px;
        }

        .tagihan-button:hover {
            background-color: #AC4C2B;
        }

        .riwayat-button:hover {
            background-color: #C7A531;
        }

        .tagihan-button:focus,
        .riwayat-button:focus {
            outline: none;
        }

        .tagihan-button:active {
            background-color: #AC4C2B;
        }

        .riwayat-button:active {
            background-color: #C7A531;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
        session_start(); 

        $username = ""; 
        $name = ""; 

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }

        if (!empty($username)) {
            echo "<h2>Hello, $name</h2>";
        }
    ?>

    <div class="buttons-container">
        <form method="get" action="transaksi.php">
            <button class="tagihan-button" type="submit">Tagihan</button>
        </form>

        <form method="get" action="riwayattransaksi.php">
            <button class="riwayat-button" type="submit">Riwayat</button>
        </form>
    </div>
</div>

</body>
</html>
