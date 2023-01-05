<?php
    include ("pdf/FPDF.php");
    include ("conexion.php");
    
    class PDF extends FPDF
    {
        function Header()
        {
            $this->SetFont('Arial', 'B', 20);
            $this->Line(10,35.5,206,35.5);
            $this->Line(15,36.5,200,36.5);
            $this->Cell(160,15,'REPORTE PACIENTES',0,0,'C');
            $this->Ln(30);
        }
        function ImprimirTexto($file)
        {
            $txt = file_get_contents($file);
            $this->SetFont('Arial','',12);
            $this->MultiCell(0,5,$txt);
        }

        Function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    $pdf=new PDF('P', 'mm', 'Letter');
    $pdf->SetMargins(25, 15);
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetTextColor(0x00, 0x00, 0x00);
    $pdf->SetFont("Arial", "b", 10);

    $query = 'SELECT *FROM valores order by id';
    $result = mysqli_query($conexion,$query);
    if (!$result)
    {
        die.(mysqli_error($conexion));
    }
    $pdf->SetTextColor(0,0,250);
    $pdf->Cell(15,10,'Id' ,1,0);
    $pdf->Cell(35,10,'Nombre' ,1,0);
    $pdf->Cell(25,10,'Edad' ,1,0);
    $pdf->Cell(35,10,'Sexo' ,1,0);
    $pdf->Cell(25,10,'HR' ,1,0);
    $pdf->Cell(25,10,'SPO' ,1,0);
    $pdf->Ln();
    while($row = mysqli_fetch_array($result))
    {
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(15,10,$row[0],1,0);
        $pdf->Cell(35,10,$row[1],1,0);
        $pdf->Cell(25,10,$row[2],1,0);
        $pdf->Cell(35,10,$row[3],1,0);
        $pdf->Cell(25,10,$row[4],1,0);
        $pdf->Cell(25,10,$row[5],1,0);
        $pdf->Ln();
        
    }
    $pdf->Ln();
    $pdf->Output();
?>












GRAFICA

<!DOCTYPE <!DOCTYPE html>
<html lang="en">
<?php
include "conexion.php";
$consultaSQL="Select *from alumno";
$ejecutarConsulta=$conexion->query($consultaSQL);
$nombres=array();
$claves=array();
$i=0;
while ($fila=$ejecutarConsulta->fetch_array()){
    $nombres[$i]=$fila[2];
    $claves[$i]=$fila[1];
    $i++;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grafica</title>
             
</head>
<body>
    <canvas id="grafica"></canvas>
    <script type="text/javascript">
    const $grafica = document.querySelector("#grafica");
    const etiquetas = <?php echo json_encode($nombres) ?>;
    const datos = <?php echo json_encode($claves) ?>;
    const datosGrafica = {
        label: "Clave",
        data: <?php echo json_encode($claves)?>,
        backgroundColor: 'rgba(255,0 , 108, 0.3)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 2,
    };
    new Chart($grafica, {
        type: 'line',
        data: {
            labels: etiquetas,
            datasets:[
                datosGrafica,
                ]
        },
        opcion: {
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
