<?php
include "conexion.php";

$accion=$_GET["accion"];

switch($accion){

    case 'guardarAlumno':

        $usuario=$_GET["usuario"];
        $contraseña=$_GET["contraseña"];

        $sql="insert into pacientes values (0,'$usuario', '$contraseña')";

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

    $sql="delete from pacientes where id='$id'";

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
        $usuario=$_GET["usuario"];
        $contraseña=$_GET["contraseña"];


        $sql="update pacientes set usuario='$usuario', contraseña='$contraseña' where usuario='$usuario'";

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