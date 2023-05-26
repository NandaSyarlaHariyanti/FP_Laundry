<!DOCTYPE html>
<html>
<head>
    <title>Form Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
        }

        form {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"]{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-sizing: border-box;
        }


        input[type="submit"] {
            display: block;
            margin: 0 auto;
            width: 40%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" >
        <h2>Login</h2>

        <input type="text" id="username" name="username" placeholder="username" required><br> <br>
        
        <input type="text" id="password" name="password" placeholder="password" required><br> <br>

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
