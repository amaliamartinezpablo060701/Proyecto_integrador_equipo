 <h1 class="animate__animated animate__backInLeft">INFORMACION GENERAL</h1>
<?php
//mostrar los datos almacenados en la tabla
header("Contetnt-Type: text/html;charset=utf-8");
include "CONEXION2.php";
session_start();

$usuario = $_SESSION['username'];

$consultaSQL = "SELECT id,nombre, edad, sexo,hr, spo FROM valores WHERE nombre LIKE '$usuario'";
$resultado = $conexion -> query($sql);

//ejecutamos la consulta
$ejecutarConsulta=$conexion->query($consultaSQL);
//recorre los elementos de la consulta dentro de un
//array y almacenarlos en una variable cada fila
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tabla").DataTable();
    });    
</script>
<?php
echo "<table id='tabla'><thead><th>Clave</th><th>Nombre</th><th>Edad</th><th>Sexo</th><th>HR</th><th>SPO2</th><th>Eliminar</th><th>Editar</th></thead>";
while ($fila=$ejecutarConsulta->fetch_array()){
    //mostrar cada fila del array
    echo "<tr>";
    echo "<td>".$fila[0]."</td><td>".$fila[1]."</td>
    <td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>
    <p class='btn btn-warning' onclick='eliminar(".$fila[0].")'>
    <i class='fas fa-trash-alt'></i>Eliminar</p></td><td>
    <p class='btn btn-primary' onclick=editar(".$fila[0].", '".$fila[1]."','".$fila[2]."','".$fila[3]."','".$fila[4]."','".$fila[5]."','".$fila[6]."','".$fila[7]."')>
<i class='far fa-edit'></i> Editar</p></td>";
    echo "</tr>";
}
echo "</table>";
?>

    <form action="reporte.php" method="post" autocomplete="off">
          <div class="col-6">
        <button type="submit" class="btn btn-primary"> Generar Reporte PDF</button>
        </div>
    </form>
