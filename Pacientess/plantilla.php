<?php

require './fpdf/fpdf.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image("images/TecNM.png",10,10,50);
        $this->Image("images/TESSFP.png",150,15,45);
        // Arial bold 15
        $this->SetFont("Arial", "B", 12);
        // Título
        $this->Cell(25);
        $this->Cell(140, 50, utf8_decode("Reporte del Paciente"), 0, 0, "C");
        //Fecha
        $this->SetFont("Arial", "", 10);
        $this->Cell(25, 5, "Fecha: ". date("d/m/Y"), 0, 1, "C");
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
