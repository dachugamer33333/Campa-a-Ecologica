<?php
require "config.php";
    session_start();
    $config= new usuario;
    $fs=date('Y-m-d');
    $id=$_SESSION['id'];
    $user=$_SESSION['username'];
    $config->valius($user);
    

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $titulo=isset($_POST['titulo']) ? $_POST['titulo'] : '';
        $propuestas=isset($_POST['propuesta']) ? $_POST['propuesta'] : '';
        $grupo=isset($_POST['grupo']) ? $_POST['grupo'] : '';

        $config->pro($conn,$titulo,$propuestas,$fs,$id,$grupo);
       
    }
    

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Propuesta</title>
    <style>
        
    </style>
</head>
<body>

<div class="form-container">
    <h2>Enviar Propuesta</h2>
    <form method="POST">
        <!-- Título de la Propuesta -->
        <div class="form-group">
            <label for="titulo">Título de la Propuesta</label>
            <input type="text" id="titulo" name="titulo" maxlength="100" required>
        </div>

        <!-- Propuesta -->
        <div class="form-group">
            <label for="propuesta">Propuesta</label>
            <textarea id="propuesta" name="propuesta" maxlength="400" required></textarea>
        </div>

        <!-- Grupo -->
        <div class="form-group">
            <label for="grupo">Grupo</label>
            <input type="text" id="grupo" name="grupo" maxlength="3" required>
        </div>

        <!-- Botón de Envío -->
        <button type="submit" class="submit-btn">Enviar Propuesta</button>
    </form>
</div>

</body>
</html>
