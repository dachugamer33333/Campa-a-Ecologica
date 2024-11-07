<?php
$conn= new mysqli("127.0.0.1","root","","pf3");
if($conn->connect_error)
{
    echo "Error en conexicion" . $conn->connect_error;
}



?>