<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Admin</title>
    <link rel="stylesheet" href="stylelogin.css">
    
</head>
<body>
    <form method="post"  action="dashboard.php" >
        <h2>Login</h2>

        <input type="text" id="username" name="username" placeholder="username" required><br> <br>
        
        <input type="text" id="password" name="password" placeholder="password" required><br> <br>

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
