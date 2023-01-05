<!DOCTYPE html>
<html lang="es">
    
    <?php
   include "conexion.php";
    $consultaSQL="Select *from pacientes";
    $ejecutarConsulta=$conexion->query($consultaSQL);
    $nombres=array();
    $claves=array();
    $i=0;
    
    while ($fila=$ejecutarConsulta->fetch_array()){
        $claves[$i]=$fila[2];
        $nombres[$i]=$fila[1];
        $i++;

    }
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <canvas id="grafica"> </canvas>
    <script type="text/javascript">
        const $grafica = document.querySelector("#grafica");
        const etiquetas = <?php echo json_encode($nombres) ?>;
        const datos = <?php echo json_encode($claves) ?>;
        const datosGrafica = {
            label: "Clave",
            data: <?php echo json_encode($claves) ?>,
            backgroundColor: 'rgba(255,0,108,0.3',
            borderColor: 'rgba (54,162,235,1',
            borderWidth: 2,
        };

        new Chart($grafica, {
            type: 'line',
            data: {
                labels: etiquetas,
                datasets: [
                    datosGrafica,
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }

            
        });
    </script>
    
</body>
</html>