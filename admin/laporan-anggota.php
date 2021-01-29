<?php
include "../conn.php";
require('../fpdf17/fpdf.php');

$result=mysql_query("SELECT * FROM data_anggota ORDER BY id_anggota ASC") or die(mysql_error());

$column_nama = "";
$column_jk = "";
$column_ttl = "";
$column_alamat = "";

while($row = mysql_fetch_array($result))
{
    $nama = $row["nama"];
    $jk = $row["jk"];
	$ttl = $row["ttl"];
    $alamat = $row["alamat"];
 
    $column_nama = $column_nama.$nama."\n";
    $column_jk = $column_jk.$jk."\n";
    $column_ttl = $column_ttl.$ttl."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    
$pdf = new FPDF('P','mm',array(220,297));
$pdf->AddPage();

$pdf->Image('../img/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA ANGGOTA',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,' Perpustakaan BKKBN Yogyakarta ',0,0,'C');
$pdf->Ln();
}
$Y_Fields_Name_position = 30;

$pdf->SetFillColor(110,180,230);

$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(30);
$pdf->Cell(55,8,'Nama',1,0,'C',1);
$pdf->SetX(80);
$pdf->Cell(15,8,'JenKel',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(50,8,'Tempat Tanggal Lahir',1,0,'C',1);
$pdf->SetX(145);
$pdf->Cell(55,8,'Alamat',1,0,'C',1);
$pdf->Ln();

$Y_Table_Position = 38;

$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX($Y_Fields_Name_position);
$pdf->MultiCell(50,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(15,6,$column_jk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(50,6,$column_ttl,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(55,6,$column_alamat,1,'C');

$pdf->Output();
?>