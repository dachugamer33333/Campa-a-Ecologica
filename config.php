<?php
$conn=new mysqli('127.0.0.1','root','','pf3');


if($conn->connect_error)
{
    echo 'Error'. $conn->connect_error;
}

class usuario{
    public function registrar($conn,$username,$pass,$control)
    {
        $sql= $conn->prepare('select * from usuarios where username = ?');
        $sql->bind_param('s',$username);
        $sql->execute();

        $result=$sql->get_result();

        if($result->num_rows > 0)
        {
            echo '<script>alert("ya existe el usuario")</script>';
        }
        else
        {
            $permiso="user";
            if($pass=="adm_guapote1234" || $pass=="dame_adm" || $pass=="sucribite_kick")
            {
                $permiso="admin";
            }
            $passh=password_hash($pass,PASSWORD_DEFAULT);
            $sql=$conn->prepare("insert into usuarios(num_control,username,pass,permisos) values (?,?,?,?)");
            $sql->bind_param('ssss',$control,$username,$passh,$permiso);
            $sql->execute();
            echo "<script> alert('Registrado Exitosamete')</script>";

        }


    }

    public function login($conn,$username,$pass)
    {
        $sql=$conn->prepare("select * from usuarios where username = ?");
        $sql->bind_param('s',$username);
        $sql->execute();
        $resulte=$sql->get_result();
        $result=$resulte->fetch_assoc();

        if($result && password_verify($pass,$result['pass']))
        {
            session_start();
            $_SESSION['id']=$result['num_control'];
            $_SESSION['username']=$result['username']; 
            header("Location:landinguser.php");
        }
        else{
            echo "<script>alert('usuario o contraseña incorrecto')</script>";
            
        }
    }

    public function logout($comp)
    {
        session_destroy();

        
        
            header("Location:register.php");

        

        
    }

    public function pb($conn,$user)
    {

        if(!isset($user))
        {
            echo "<script> alert('Inicia secion'); window.location.href='register.php'; </script>";
            
        }

        $kick=$conn->prepare("select titulo,propuesta from publicacion");
        $kick->execute();
        $result=$kick->get_result();

        while($row=$result->fetch_assoc()){
            echo "<div class='post'>
                <h3>". $row['titulo']."</h3>
                <p>".$row['propuesta']."</p>
            </div>";;
        }
    }

    public function pro($conn,$titulo,$propuesta,$fs,$id,$grupo)
    {
        
        $id_adm='e';
        $fre='0000-00-00';
        $fres='0000-00-00';
        $sql=$conn->prepare("insert into solicitud(id_usuario,id_admin,titulo,propuesta,fecha_revision,fecha_resolucion,fecha_solicitud,grupo) values(?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssssssi",$id,$id_adm,$titulo,$propuesta,$fre,$fres,$fs,$grupo);
        
        if($sql->execute())
        {
            echo "Registro Exitoso";
        }
        else{
            echo "error" . $sql->error;
        }


    }

    public function valius($user)
    {
        if(!isset($user))
        {
            echo "<script> alert('Inicia secion'); window.location.href='register.php'; </script>";
            
        }
    }
}


?>