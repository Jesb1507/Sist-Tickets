<?php
require('./fpdf/fpdf.php');
require('./database.php');


class PDF extends FPDF
{
    function Header(){
        $time = date("d/m/yy");
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(60);
        
        $this->Cell(70,10, 'La Camionta Express',0,0,'C');
        $this->Ln(15);
        $this->Cell(70,10, 'Reporte de Tickets Vendidos',0,0,'C');
        $this->Cell(195,10, $time,0,0,'C');
        $this->Ln(10);
        $this->Cell(30,10, 'Id Factura', 1, 0, 'C', 0);
        $this->Cell(30,10, 'Id Ruta', 1, 0, 'C', 0);
        $this->Cell(30,10, 'Id Usuario', 1, 0, 'C', 0);
        $this->Cell(60,10, 'Fecha', 1, 0, 'C', 0);
        $this->Cell(30,10, 'Precio', 1, 1, 'C', 0);
    
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    
    
    }
    
}


$time = date("yy/m/d 00:00:00");
$sql="SELECT * FROM tickets WHERE fecha >= '$time'";
$resultado= $mysqli->query($sql);

$pdf= new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(30,10, $row['idfactura'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['idruta'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['iduser'], 1, 0, 'C', 0);
    $pdf->Cell(60,10, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['precio'], 1, 1, 'C', 0);

}


$pdf->Output();
?>
