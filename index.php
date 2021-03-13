<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="proses-loginPerpus.php" method="post">
            <label for="username">Username</label><br>
            <div class="input-container">
                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                <input type="text" name="username" id="username" required autocomplete="off" placeholder="Masukkan username"><br>
            </div>
            
            <label for="password">Password</label><br>
            <div class="input-container">
                <i class="fas fa-lock fa-lg fa-fw" ></i>
                <input type="password" name="password" id="password" required placeholder="Masukkan password"><br>
            </div>
            
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>