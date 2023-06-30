<?php

require('code128.php');

$bar = new PDF_Code128();
$bar->AddPage();
$bar->SetFont('Arial','',10);

$codigo = $_POST['codigo'];

$bar->Code128(50,70,$codigo,70,20);
$bar->SetXY(50,95);
$bar->Write(5,$codigo);

$bar->Output();
?>