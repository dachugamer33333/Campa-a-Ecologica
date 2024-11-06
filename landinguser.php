<?php
    require "config.php";
    session_start();
    $config = new usuario();
    $user=$_SESSION['username'];
    $id=$_SESSION['id'];

    if(isset($_POST['miBoton']))
    {
        $config->logout($_SESSION['username']);

    }

    $fecha=date('d-m-Y');

    echo $fecha;



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esquema de Interfaz</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #f4f4f9;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            gap: 20px;
        }

        /* Área de Publicaciones */
        .publicaciones {
            flex: 2;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .publicaciones h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .post {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .post h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #555;
        }

        .post p {
            font-size: 1em;
            color: #666;
        }

        /* Área de Perfil */
        .perfil {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .perfil h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .perfil .user-info {
            margin-bottom: 20px;
        }

        .perfil .user-info h3 {
            font-size: 1.2em;
            color: #555;
        }

        .perfil .user-info p {
            font-size: 1em;
            color: #666;
        }

        /* Botón Enviar Propuesta */
        .btn-enviar-propuesta {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 20px;
        }

        .btn-enviar-propuesta:hover {
            background-color: #218838;
        }

        .btn-cerrar{
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 20px;
        }
        .btn-cerrar:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <h1>Esquema de Interfaz de Usuario</h1>

    <div class="container">
        
        <div class="publicaciones">
            <h2>Publicaciones</h2>
            <?php

            $config->pb($conn,$user,$id);

            ?>
            
            <!-- Agrega más publicaciones si es necesario -->
        </div>

        <!-- Área de Perfil -->
        <div class="perfil">
            <h2>Perfil del Usuario</h2>
            <div class="user-info">
                <h3><?php echo $_SESSION['username'];  ?></h3>
                <p>Información adicional sobre el usuario, como correo electrónico, descripción breve, etc.</p>
            </div>
            <a href="propuesta.php" class="btn-enviar-propuesta">Enviar Propuesta</a>
            <form method="post">
                <button class="btn-cerrar" type="submit" name="miBoton">Cerrar sesion</button>
            </form>
        </div>
    </div>
</body>
</html>
