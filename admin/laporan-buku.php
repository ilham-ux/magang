<?php
include "../conn.php";
require('../fpdf17/fpdf.php');

$result=mysql_query("SELECT * FROM data_buku ORDER BY id_buku ASC") or die(mysql_error());

$column_judul = "";
$column_pengarang = "";
$column_th_terbit = "";
$column_penerbit = "";
$column_asal ="";

while($row = mysql_fetch_array($result))
{
	$judul = $row["judul"];
    $pengarang = $row["pengarang"];
    $th_terbit = $row["th_terbit"];
    $penerbit = $row["penerbit"];
    $asal = $row["asal"];
 
	$column_judul = $column_judul.$judul."\n";
    $column_pengarang = $column_pengarang.$pengarang."\n";
    $column_th_terbit = $column_th_terbit.$th_terbit."\n";
    $column_penerbit = $column_penerbit.$penerbit."\n";
    $column_asal = $column_asal.$asal."\n";
    

$pdf = new FPDF('L','mm',array(297,210)); 
$pdf->AddPage();

$pdf->Image('../img/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(125);
$pdf->Cell(30,10,'DATA BUKU',0,0,'C');
$pdf->Ln();
$pdf->Cell(125);
$pdf->Cell(30,10,'Perpustakaan BKKBN Yogyakarta',0,0,'C');
$pdf->Ln();

}
$Y_Fields_Name_position = 30;

$pdf->SetFillColor(110,180,230);

$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(90,8,'Judul',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(50,8,'Pengarang',1,0,'C',1);
$pdf->SetX(145);
$pdf->Cell(20,8,'Tahun ',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(50,8,'Penerbit',1,0,'C',1);
$pdf->SetX(215);
$pdf->Cell(32,8,'Asal',1,0,'C',1);
$pdf->Ln();


$Y_Table_Position = 38;

$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(90,6,$column_judul,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(50,6,$column_pengarang,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(20,6,$column_th_terbit,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(50,6,$column_penerbit,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(215);
$pdf->MultiCell(32,6,$column_asal,1,'C');

$pdf->Output();
?>
