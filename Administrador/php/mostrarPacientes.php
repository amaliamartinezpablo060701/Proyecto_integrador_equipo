<?php
//mostrar los datos almacenados en la tabla 
header("Content-Type: text/html;charset=utf-8");
	include "conexion.php";
	$consultaSQL="Select *from valores";
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
	echo "<table id='tabla'><thead><th>Nombre</th><th>EDAD</th><th>SEXO</th><th>HR</th><th>SPO</th><th>ELIMINAR</th><th>EDITAR</th></thead>";
	while ($fila=$ejecutarConsulta->fetch_array()) {
        //mostrar cada fila del array
		echo "<tr>";
		echo "<td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td>
		<td>
		<p class='btn btn-warning' onclick='eliminar(".$fila[0].")'>
        <i class='fas fa-trash-alt'></i> Eliminar</p></td><td>
		<p class='btn btn-primary' onclick=editar(".$fila[0].",'".$fila[1]."','".$fila[2]."','"
		.$fila[3]."','".$fila[4]."','".$fila[5]."','".$fila[6]."','".$fila[7]."')><i class='far fa-edit'></i> Editar</p></td>";
		echo "</tr>";
	}
	echo "</table>";
	?>


	<div action="reporte.php" class='col-12' style = 'text-align: center; '>
		<button type='button' class='btn btn-info' id = 'btnImprimir'>
			<i class = 'fas fa-file-pdf'></i> Imprimir reporte
		</button>
</div>


<script type="text/javascript">
	$("#btnImprimir").click(function(event){
		window.open("php/imprime_pacientes.php","","fullscreen");
		
	});

</script>




