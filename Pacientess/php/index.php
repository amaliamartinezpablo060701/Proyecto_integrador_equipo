<?php

require "conexion.php";

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
    <title>Reporte</title>
</head>

<body>

    <h2>INFORMACIÓN</h2>

    <form action="./TraerDatos.php" method="post" autocomplete="off">

        <select id="Nombre" name="Nombre">
            <option value="">Selecciona una opcion</option>
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $fila['Nombre']; ?>"><?php echo $fila['Nombre']; ?></option>
            <?php } ?>
        </select>

        <br />

        <button type="submit" class='btn btn-info'>Consultar Información</button>
    </form>
 <br />

  <?php

    require "conexion.php";

$sql = "SELECT Nombre FROM datos";
$resultado = $mysqli->query($sql);

?>

    <form action="reporte.php" method="post" autocomplete="off">

        Selecciona el Nombre del Paciente
      
        
        <select id="Nombre" name="Nombre">
            <option value="">Selecciona una opcion</option>
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $fila['Nombre']; ?>"><?php echo $fila['Nombre']; ?></option>
            <?php } ?>
        </select>

        <br />
          <div class="col-6">
        <button type="submit"  class='btn btn-info'>
          <i class = 'fas fa-file-pdf'></i>
           Generar Reporte PDF</button>
        </div>
    </form>



</body>

</html>