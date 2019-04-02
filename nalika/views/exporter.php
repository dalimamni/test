<?php
include "../Core/photoCore.php";
require('pdf.php');

//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";

$number_of_products=0;
$Produitc2 = new ProduitC();
$tab2 = $Produitc2->afficher();

foreach($tab2 as $row2)
{
	$code = $row2["id_produit"];
    $name = $row2["prix"];
    $real_price = $row2["note"];

    $column_code = $column_code.$code."\n";
    $column_name = $column_name.$name."\n";
    $column_price = $column_price.$real_price."\n";
	$number_of_products++;
}

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage('L','A4',0);

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(20,6,'CODE',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'NAME',1,0,'L',1);
$pdf->SetX(135);
$pdf->Cell(30,6,'PRICE',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$column_price,1,'R');
$pdf->SetX(135);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(45);
    $pdf->MultiCell(120,6,'',1);
    $i = $i +1;
}

$pdf->Output();
			
		

?>
