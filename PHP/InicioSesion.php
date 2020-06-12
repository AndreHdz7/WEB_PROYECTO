<?php
if(!isset($_POST["usuario"]))
{
    header("location:../login.html");
}
try {

    //Conexion a nuestro servidor local
    $conexion = new PDO('mysql: host=localhost; dbname=web_dba; charset=utf8','root','');
    $conexion -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $peticion = "SELECT * FROM usuarios WHERE Correo= :nom";
    $resultado = $conexion->prepare($peticion);
    
    //Utilizamos post para recibir los datos que enviamos atravez de HTML en este caso desde nuestro textfield
    $login = htmlentities(addslashes($_POST["usuario"]));
    $pass  = htmlentities(addslashes($_POST["contrase"]));

    $resultado -> bindValue(":nom",$login);
    $resultado -> execute();
    //fila es un array con indices iguales a las tablas de nuestra base de datos
    $fila= $resultado -> fetch(PDO::FETCH_ASSOC);
  
    if($fila)
    {
        if($fila["Verificar"]==0)
        {
            echo "<center><img src='../img/logoError.png' id='logoError'>
                  <br><h3>No encontramos informacion con los datos proporcionados</h3>
                  <br><a href='../login.php' class='btn center'>Regresar a login</a></center>";
                  
        }else {
 
            //(hash_equals($fila["Contrase"], crypt($pass, '$5$rounds=5000$usesomesillystringforsalt$'))) encripta la informacion

            if ($fila["Contrase"]==$pass) {
                session_start();
                $_SESSION["usuario"] = $fila["usuario"];
                $_SESSION["id"] = $fila["ID"];
                header("location:../Menu");
                echo $fila["Usuario"];

            } else {
                session_start();
                $_SESSION["login"] = 1;
                header("location:../login.php");
            }
        }
    }else{
        echo "<center><img src='../img/logo.png' id='logo'>
                  <br><h3>No encontramos informacion con los datos proporcionados</h3>
                  <br><a href='../login.php' class='btn center'>Regresar a login</a></center>";
    }

} catch (Exception $e) {
    echo "Error: " , $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/login.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="img/engranegris.png"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="https://file.myfontastic.com/FYSMYTuP6BGaR3cfCd6rrX/icons.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"/>
	<title>Error</title>
</head>
<body>

</body>
</html>