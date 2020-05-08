<!doctype html>
<html lang="esp">
<head>
    <head>
        <title>Encuentro de Ingeniería Industrial</title>
        <link rel="stylesheet" href="../css/registro.css">
        <link href="../css/menu.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" type="image/x-icon" href="img/engranegris.png"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link href="https://file.myfontastic.com/FYSMYTuP6BGaR3cfCd6rrX/icons.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Slabo+27px" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"/>
    </head>
</head>
<body>
    <?php
    //Si ya ha iniciado sesion entonces va ha mostrar 
            @session_start();
            @$usuario=$_SESSION["usuario"];
            if (@$_SESSION["login"]==1 && !isset($usuario)) {
                @session_destroy();
             }
            /*include("../html/menu.php");
            if(isset($usuario))
                menucl("../actividades.php","#!","#!","../comite.php","../profile.php","cierre.php",$usuario);
            else
                menu("../actividades.php","#!","#!","../comite.php","../login.php","../sing_in.php");
            */
    ?>
    <section>
        <?php
    
        function ingresa_datos($nombre,$usuario,$correo,$contra)
        {
           // $passcrypt = crypt($pass,'$5$rounds=5000$usesomesillystringforsalt$');
          //$rev = strrev($pass);
            $conexion = new PDO('mysql: host=localhost; dbname=proyectoweb; charset=utf8','root','');   
            $ID=2375;  //falta el auto-incrementable
            $peticion = "INSERT INTO usuarios(Usuario,Correo,Contrase,Nombre,Verificar,ID) VALUES ('$usuario','$correo','$contra','$nombre',0,$ID)";
                
                $resultados= $conexion->query($peticion);
                
                echo "<br><center><h3>REGISTRO EXITOSO!!!</h3></center>";
                echo "<center><h4>Casi termina tu proceso de registro</h4></center>";
                echo "<br><center><h5>En breve enviaremos correo para que confirmes tu cuenta</h5></center>";
               // unlink($patch_destiny);
            $coment = "
                      <center><img src='http://encuentroii.com/registro/logo.png' width='350' height='150'></center>
                      <br><center>BIENVENIDO AL ENCUENTRO DE INGERIERIA INDUSTRIAL</center>
                      <br><center>gracias por registrarte</center>
                      <br><br>Para terminar tu registro por favor sigue el siguiente link:
                      <br><a href='http://encuentroii.com/verificacion.php'>http://encuentroii.com/registro/verificacion</a>
                      <br>El link estará disponible desde las 22:00 hrs del dia 20-03-2017
                      <br>Por tu atencion muchas gracias
                      <br>Att.Basilio Torres Carlos Alberto
                      <br>Coordinacion de Informatica y Sistemas
      
            ";

                    $headers = "MIME-VERSION: 1.0 \r\n";
                    $headers.= "Content-type: text/html; charset= iso-8859-1;\r\n";
                    $headers.= "From: Encuentro de ingenieria <no-responder@encuentroii.com>\r\n";

                    $exito = mail($correo,"Verificacion de Cuenta",$coment,$headers);
        }

        function verificaCorreo($correo)
        {
            $conexion = new PDO("mysql: host=ftp.encuentroii.com; dbname=encuent3_encuentro; charset=utf8","encuent3_carlos","cabt51145539");
            $conexion -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuarios WHERE CORREO=:correo";
            try{
                $resultado= $conexion ->prepare($sql);
                $resultado ->bindValue(":correo",$correo);
                $resultado ->execute();
                $fila = $resultado->fetch(PDO::FETCH_ASSOC);
                if($fila){
                    return false;
                }
                else{
                    return true;
                }
            }catch(Exception $e){
                echo $e ->getMessage();
            }
        }

        function verificaApellidos($apellidos)
        {
            $conexion = new PDO("mysql: host=ftp.encuentroii.com; dbname=encuent3_encuentro; charset=utf8","encuent3_carlos","cabt51145539");
            $conexion -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuarios WHERE APELLIDOS=:apellidos";
            try{
                $resultado= $conexion ->prepare($sql);
                $resultado ->bindValue(":apellidos",$apellidos);
                $resultado ->execute();
                $fila = $resultado->fetch(PDO::FETCH_ASSOC);
                if($fila){
                    return false;
                }
                else{
                    return true;
                }
            }catch(Exception $e){
                echo $e ->getMessage();
            }
        }

   
     echo "<section id='logo'>
                    <img src='../img/logo.png' id='logo'>\";
          </section>";
        if (ingresa_datos($_POST["Nombre"],$_POST["Usuario"],$_POST["Correo"],$_POST["Contra"])){
            echo "<center><h4>Se ha registrado exitosamente</h4></center>";
        }else {
            echo "<center><h3>ERROR!!!</h3></center>";
            echo "<center><h4>Ya existe un usuario con el mismo nombre o correo electronico</h4></center>";
            echo "<br><center><h5>Presiona atras y soluciona el problema</h5></center>";
        }
        echo "<br><center><a href='http://encuentroii.com' class='btn'>Inicio</a></center>";
        ?>
    </section>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <script>
        $(document).ready(
            function(){
                $('.button-collapse').sideNav({
                        menuWidth: 150, // Default is 300
                        edge: 'right', // Choose the horizontal origin
                        closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                        draggable: true, // Choose whether you can drag to open on touch screens,
                        onOpen: function(el) { /* Do Stuff* */ }, // A function to be called when sideNav is opened
                        onClose: function(el) { /* Do Stuff* */ }, // A function to be called when sideNav is closed
                    }
                );

                $(".dropdown-button").dropdown();
                $('.scrollspy').scrollSpy();
                $('.tooltipped').tooltip({delay: 50});
            }
        );
</body>
</html>

