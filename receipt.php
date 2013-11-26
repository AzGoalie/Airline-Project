<?php 
require('fpdf.php');

session_start();

$name=$_SESSION['myusername'];
$from=$_POST['from']; 
$to=$_POST['to']; 
$price=$_POST['price']; 
$time=$_POST['time']; 
$seat=$_POST['seating'];
$num=$_POST['numberOfPassengers']; 

$pdf = new FPDF( );
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,"Flight Receipt for $name");

$pdf->SetY(15);
$pdf->SetFont('Arial','',14);

$pdf->SetY(20);
$pdf->Cell(0,10,"From: $from");

$pdf->SetY(25);
$pdf->Cell(0,10,"To: $to");

$pdf->SetY(30);
$pdf->Cell(0,10,"Departure Time: $time");

$pdf->SetY(35);
$pdf->Cell(0,10,"Seating: $seat");

$pdf->SetY(40);
$pdf->Cell(0,10,"Number of Passangers: $num");

$pdf->SetY(45);
$pdf->Cell(0,10,"Price per Ticket: $$price");

$pdf->SetY(50);
$total = ($num * $price);
$pdf->Cell(0,10,"Total: $$total");


$pdf->Output();

?>
