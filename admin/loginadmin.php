<?php
require_once('../conn.php');

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === '12345') {
        // Set cookie dengan nama "login" dan nilai "true" dengan masa berlaku 1 jam (3600 detik)
        setcookie("login", "true", time() + 3600, '/');
        // Redirect ke halaman selamat datang atau halaman berikutnya
        echo "
            <script>
                alert('Login Berhasil');
                document.location.href = '../admin/dashboard.php';
            </script> 
        ";
        exit;
    } else {
        // Login gagal
        echo "
            <script>
                alert('Username atau password salah!');
                document.location.href = '../admin/loginadmin.php';
            </script> 
        ";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/login.css">
    <link rel="icon" href="../binatoo.ico" type="image/x-icon">
    <title>Form Login Admin</title>
    <style>
    </style>
</head>

<body>
    <?php if ($errorMessage !== '') : ?>
        <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="POST" action="loginadmin.php">
        <h2>Login</h2>
        <input type="text" id="username" name="username" placeholder="Username" required><br><br>
        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" name="submit" value="Login">
        <a href="../index2.php" class="btn-back">Kembali</a>
    </form>
</body>

</html>
