<?php
require 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $contol=isset($_POST['control']) ? $_POST['control'] : '';
    $username=isset($_POST['username']) ? $_POST['username'] : '';
    $pass=isset($_POST['pass']) ? $_POST['pass'] : '';

    $config=new usuario();
    $config->registrar($conn,$username,$pass,$contol);
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
        numero de control: <input type="num" name="control" required maxlength="14" placeholder="numero" ><br>
        Nombre de usuario: <input type="text" name="username" required placeholder="username"><br>
        Contraseña:<input type="password" name="pass" required><br>
        <input type="submit" value="Registar" > <button><a href="login.php">log in</a></button>

    </form>
    
</body>
</html>