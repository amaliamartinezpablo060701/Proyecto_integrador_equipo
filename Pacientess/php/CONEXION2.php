<?php
//definir los parametros para la cadena de conexion con la bd
$server="localhost";
$user="root";
$password="12345678";
$bd="logins";

//Creamos la conexion
$conexion=new mysqli($server,$user,$password,$bd) or die ("Error en la conexion".$conexion->error);
$conexion->set_charset("utf8");

?>