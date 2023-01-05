<?php

require "Conexion.php";
require "plantilla.php";

session_start();

$usuario = $_SESSION['username'];

$consultaSQL = "SELECT id,nombre, edad, sexo,hr, spo FROM valores WHERE nombre LIKE '$usuario'";
$resultado = $conexion -> query($consultaSQL);

//ejecutamos la consulta
$ejecutarConsulta=$conexion->query($consultaSQL);


$pdf = new PDF("P", "mm", "letter");

    $pdf->AliasNBPages();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Ln(20);
    $pdf->Cell(190, 5, "DIAGNOSTICO", 0, 1, "C");
    
    $pdf->Ln(10);


        while ($fila = $resultado ->fetch_assoc()) {
     $pdf->Cell(30,5,"ID_Paciente: ",0,1,"C");
        $pdf->Cell(65,-5,$fila['id'],0,1,"C");
    
    $pdf->Ln(10);

    $pdf->Cell(23,5,"Nombre: ",0,1,"C");
        $pdf->Cell(100,-5,$fila['nombre'],0,1,"C");


    $pdf->Ln(8); 

    $pdf->Cell(300,-30,"Sexo: ",0,1,"C");
        $pdf->Cell(337,30,$fila['sexo'],0,1,"C");


    $pdf->Ln(10);    

    $pdf->Cell(300,-30,"Edad: ",0,1,"C");
        $pdf->Cell(320,30,$fila['edad'],0,1,"C");


$pdf->Cell(200,0, "----------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, "C");

$pdf->Ln(10);


    $pdf->Cell(60,10,"Ritmo Cardiaco",1,0,"C");
        $pdf->Cell(30,10,$fila['hr'],1,0,"C");



    $pdf->Ln(10);  

    $pdf->Cell(60,10,"Oxigenacion en la Sangre",1,0,"C");
        $pdf->Cell(30,10,$fila['spo'],1,0,"C");


    }



    $pdf->output();



