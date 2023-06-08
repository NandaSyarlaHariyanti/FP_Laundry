<?php
require_once('../conn.php');

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Query ke database untuk memeriksa data login
        $query = "SELECT * FROM pelanggan WHERE username = :username AND password = :password";
        $statement = $conn->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            // Set cookie dengan nama "login" dan nilai "true" dengan masa berlaku 1 jam (3600 detik)
            setcookie("login", "true", time() + 3600, '/');
            // Redirect ke halaman selamat datang atau halaman berikutnya
            echo "
                <script>
                    alert('Login Berhasil');
                    document.location.href = '../pelanggan/home.php';
                </script> 
            ";
            exit;
        } else {
            // Login gagal
            echo "
                <script>
                    alert('Username atau password salah!');
                    document.location.href = '../pelanggan/loginpelanggan.php';
                </script> 
            ";
            exit;
        }
    } catch (PDOException $e) {
        // Tangani kesalahan koneksi database
        echo "Kesalahan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Pelanggan</title>
    <link rel="stylesheet" href="../admin/login.css">
    <style>
    </style>

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
