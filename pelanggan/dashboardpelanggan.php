<<<<<<< HEAD

<?php

session_start();

=======
<?php
        session_start();
>>>>>>> ea3ad8559182a398e7e2c5fbbafcbdb0c23d2e11
?>
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
            height: 150px;
            width: 300px;
            font-size: 30px;
            font-weight: bold;
            border-radius: 20px;
            background-color: #FF6E3C;
            color: black;
            border: none;
            cursor: pointer;
            margin: 10px 30px;
        }

        .riwayat-button {
            padding: 10px 20px;
            height: 150px;
            width: 300px;
            font-size: 30px;
            font-weight: bold;
            border-radius: 20px;
            background-color: #FFD74B;
            color: black;
            border: none;
            cursor: pointer;
            margin: 10px 30px;
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
            margin-bottom: 35px;
            font-size: 35px;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        require_once('../conn.php');

        $username = "";
        $name = "";

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            try {
                // Query ke database untuk mendapatkan nama pelanggan berdasarkan username
                $query = "SELECT nama_pelanggan FROM pelanggan WHERE username = :username";
                $statement = $conn->prepare($query);
                $statement->bindParam(':username', $username);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $name = $result['nama_pelanggan'];
            } catch (PDOException $e) {
                // Tangani kesalahan koneksi database
                echo "Kesalahan: " . $e->getMessage();
            }
        }

        if (!empty($username)) {
            echo "<h2>Hello, $name !</h2>";
        }
        ?>

        <div class="buttons-container">
            <form method="get" action="tagihan.php">
                <button class="tagihan-button" type="submit">Tagihan</button>
            </form>

            <form method="get" action="riwayattransaksi.php">
                <button class="riwayat-button" type="submit">Riwayat</button>
            </form>
        </div>

</body>

</html>
