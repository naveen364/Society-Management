<?php
require'fpdf17/fpdf.php';

require'connect.php';

//get invoices data
$query = mysqli_query($con,"select * from society
	inner join wing using(society_id)
	join flat using(wing_id)
	join account using(flat_id)
	join bill using(flat_id)
	where
	bill_num = '$_REQUEST[id]'");

$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'SOCIETY MANAGEMENT',0,0);
$pdf->Cell(59	,5,'BILL',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'A-block',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Rudrapur, india, 263153',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$invoice['bill_date'],0,1);//end of line

$pdf->Cell(130	,5,'9555095524',0,0);
$pdf->Cell(25	,5,'BILL ID:',0,0);
$pdf->Cell(34	,5,$invoice['bill_num'],0,1);//end of line

$pdf->Cell(130	,5,'Fax: +12345678',0,0);
$pdf->Cell(25	,5,'FLAT ID:',0,0);
$pdf->Cell(34	,5,$invoice['flat_id'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill To',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['username'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['wing_name'].", Room Number-".$invoice['flat_num'].",",0,1);
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['society_name'].",".$invoice['city'],0,1);
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$invoice['state'].",".$invoice['mobile_no'],0,1);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,' Quantity',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items

	$pdf->Cell(155	,5,'WATER CHARGES',1,0);
	
	$pdf->Cell(34	,5,$invoice['water_charges'],1,1,'R');
	$pdf->Cell(155	,5,'PARKING CHARGES',1,0);
	
	$pdf->Cell(34	,5,$invoice['parking_charges'],1,1,'R');

	$pdf->Cell(155	,5,'ELECTRIC CHARGES',1,0);
	$pdf->Cell(34	,5,$invoice['total_electric'],1,1,'R');
	$pdf->Cell(130	,5,'unit',1,0);
	$pdf->Cell(25	,5,$invoice['unit'],1,0);
	$pdf->Cell(34	,5,'',1,1,'R');
	$pdf->Cell(130	,5,'rate',1,0);
	$pdf->Cell(25	,5,$invoice['rate'],1,0);
	$pdf->Cell(34	,5,'',1,1,'R');
	


	//add thousand separator using number_format function
	


//summary
	$amount=$invoice['water_charges']+$invoice['parking_charges']+$invoice['total_electric'];
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($amount),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Taxable',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($amount*$invoice['tax']/100),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($invoice['tax']),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Grand Total',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($invoice['grand_total']),1,1,'R');//end of line





















$pdf->Output();
?>