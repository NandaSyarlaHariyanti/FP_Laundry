<!DOCTYPE html>
<html>
<head>
    <title>Halaman Awal</title>
    <style>
        body {
            text-align: center;
            padding-top: 200px;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 32px;
        }
        
        .my-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }
        
        .blue-button {
            background-color: #3498db;
        }
        .green-button {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <h1>WELCOME TO BINATO</h1>
    
    <div class="btn-container">
        <a href="admin/loginadmin.php" class="my-button blue-button">Login as Admin</a>
        <a href="pelanggan/loginpelanggan.php" class="my-button green-button">Login as Pelanggan</a>
    </div>
</body>
</html>
