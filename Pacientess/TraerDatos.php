
<?php

require "Conexion.php";

$sql = "SELECT Nombre FROM datos";
$resultado = $mysqli->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <title>Reporte</title>
</head>

<body background="img/fondo.jpg" bgcolor="FFCECB">

<div class="div-1" class="col-11">
    <?php
        require "Conexion.php";

        $Nombre = $_POST['Nombre'];

        $sql = "SELECT ID_Paciente, Nombre, Sexo, Edad, HR, SPO2 FROM datos WHERE Nombre LIKE '$Nombre'";
        $resultado = $mysqli -> query($sql);


while ($fila = $resultado ->fetch_assoc())
        {
            echo'<tr>
               <label>ID_Paciente: </label>
               <label id="Paciente">'.$fila['ID_Paciente'].'</label>

                <br>
                <label name="Nombre"> Nombre: </label>
                <label>'.$fila['Nombre'].'</label>
                <br>
                <label>Sexo: </label>
                <td>'.$fila['Sexo'].'</td>
                <br>
                <label>Edad: </label>
                <td>'.$fila['Edad'].'</td>
                <br>
                <label>Ritmo Cardiaco: </label>
                <td>'.$fila['HR'].'</td>
                <br>
                <label>Oxigenacion: </label>
                <td>'.$fila['SPO2'].'</td>
            
            </tr>';
        }

?>
 <br />
  <br />
   <br />
</div>

<div  id="formulario2" class="btn btn-danger">



</div>
<br />
<br />
<br />
     
<br />
<br />
<br />
<br />
    </div class="div-1" >
            <img src="img/ritmo.gif" width="1400px" height="250px" align="center">
        </div>


</body>

</html>