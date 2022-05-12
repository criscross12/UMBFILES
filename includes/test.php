<?php
include "conexion.php";
require('../fpdf/fpdf.php');

class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',16);
        $this->Cell(60);
        $this->Cell(70,10,'Reporte de álumnos',0,0,'C');
        $this->Ln(20);
        $this->Cell(80,10,'Nombre',1,0,'C',0);
        $this->Cell(50,10,'Nombre',1,0,'C',0);
        $this->Cell(50,10,'Nombre',1,1,'C',0);
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
$sql = mysqli_query($conexion, 'SELECT * FROM `Materias`');

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
while ($row=$sql->fetch_assoc()) {
    $pdf->Cell(80,10,$row['Nombre'],1,0,'C',0);
    $pdf->Cell(50,10,$row['Nombre'],1,0,'C',0);
    $pdf->Cell(50,10,$row['Nombre'],1,1,'C',0);
}
    $pdf->Output();
?>