<?php
include "conexion.php";

$accion=$_GET["accion"];

switch($accion){

    case 'guardarAlumno':

        $nombre=$_GET["nombre"];
        $edad=$_GET["edad"];
        $sexo=$_GET["sexo"];
        $hr=$_GET["hr"];
        $spo=$_GET["spo"];


        $sql="insert into valores values (0,'$nombre', '$edad', '$sexo', '$hr', '$spo')";

        $ejecutarSQL=$conexion->query($sql);

        if($ejecutarSQL){
            echo "1";
        }
        else {
            echo "0";
        }
        break;

//ELIMINAR ID

case 'eliminarAlumno':

    $id=$_GET["id"];

    $sql="delete from valores where id='$id'";

    $ejecutarSQL=$conexion->query($sql);

    if($ejecutarSQL){
        echo "1";
    }
    else {
        echo "0";
    }
    break;


    //Editar alumno
    case 'editarAlumno':

        //Recibir los datos
        $nombre=$_GET["nombre"];
        $edad=$_GET["edad"];
        $sexo=$_GET["sexo"];
        $hr=$_GET["hr"];
        $spo=$_GET["spo"];


        $sql="update valores set nombre='$nombre', edad='$edad', sexo='$sexo', hr='$hr', spo='$spo' where nombre='$nombre'";

        $ejecutarSQL=$conexion->query($sql);

        if($ejecutarSQL){
            echo "1";
        }
        else {
            echo "0";
        }
        break;

        
}
?>