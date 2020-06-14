<?php
session_start();


$_SESSION['usuario'] = 'Administrador';
header("Location:index.html");

?>