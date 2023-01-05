<!DOCTYPE html>
<html lang="es">
    
    <?php
   include "conexion.php";
    $consultaSQL="Select *from valores";
    $ejecutarConsulta=$conexion->query($consultaSQL);
    $nombres=array();
    $claves=array();
    $clavess=array();
    $i=0;
    
    while ($fila=$ejecutarConsulta->fetch_array()){
        $nombres[$i]=$fila[1];
        $claves[$i]=$fila[4];
        $clavess[$i]=$fila[5];
        
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
        const datos2 = <?php echo json_encode($clavess) ?>;

        const datosGrafica = {
            label: "HR",
            data: <?php echo json_encode($claves) ?>,
            backgroundColor: 'rgba(255,0,108,0.3',
            borderColor: 'rgba (54,162,235,1',
            borderWidth: 2,
        };

        const datosGrafica2 = {
            label: "SPO",
            data: <?php echo json_encode($clavess) ?>,
            backgroundColor: 'rgba(180,200,108,0.3',
            borderColor: 'rgba (54,162,235,1',
            borderWidth: 2,
        };


        new Chart($grafica, {
            type: 'line',
            data: {
                labels: etiquetas,
                datasets: [
                    datosGrafica,
                    datosGrafica2,
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