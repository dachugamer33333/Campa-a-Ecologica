<?php
 require "../Controller/config.php";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $pass=isset($_POST['pass']) ? $_POST['pass'] : '';
        $username=isset($_POST['username']) ? $_POST['username'] : '';
        $config=new usuario();

        $config->login($conn,$username,$pass);
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Nombre: <input type="text" require name="username"><br>
        Contraseña: <input type="password" name="pass" required><br>
        <input type="submit" value="iniciar"> <button><a href="register.php">Registar</a></button>
    </form>
</body>
</html>