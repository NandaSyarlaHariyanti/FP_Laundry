<?php
session_start();
require_once('../conn.php');

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {

        $query = "SELECT * FROM pelanggan WHERE username = :username AND password = :password";
        $statement = $conn->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();

        if ($statement->rowCount() > 0) {

            $_SESSION['username'] = $username;


            header("Location: dashboardpelanggan.php");
            exit;
        } else {
            // Login gagal
            $errorMessage = 'Username atau password salah!';
        }
    } catch (PDOException $e) {
        // Tangani kesalahan koneksi database
        $errorMessage = 'Kesalahan: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>Form Login Pelanggan</title>
    <link rel="stylesheet" href="../admin/login.css">
</head>

<body>
    <?php if ($errorMessage !== '') : ?>
        <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="POST" action="loginpelanggan.php">
        <h2>Login</h2>
        <input type="text" id="username" name="username" placeholder="Username" required><br><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" name="submit" value="Login">
        <a href="../index2.php" class="btn-back">Kembali</a>
    </form>
</body>

</html>
