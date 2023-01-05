<?php
//mostrar los datos almacenados en la tabla
header("Contetnt-Type: text/html;charset=utf-8");
include "conexion.php";
$consultaSQL="Select *from datos";
//ejecutamos la consulta
$ejecutarConsulta=$mysqli->query($consultaSQL);
//recorre los elementos de la consulta dentro de un
//array y almacenarlos en una variable cada fila
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tabla").DataTable();
    });    
</script>
<?php
echo "<table id='tabla'><thead><th>Clave</th><th>Nombre</th><th>Sexo</th><th>Edad</th><th>HR</th><th>SPO2</th><th>Eliminar</th><th>Editar</th></thead>";
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