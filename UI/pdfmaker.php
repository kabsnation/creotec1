<?php
require("../fpdf181/fpdf.php");
class pdfMaker{
	public function registrationForm($name,$batchNumber,$strand,$school,$target_file){
		$pdf=new FPDF();
		//var_dump(get_class_methods($pdf));
		$pdf->AddPage();
		//------------------------
		//FIRST COPY
		$pdf->Image("/xampp/htdocs/creotec1/images/registration_form.jpg", 0,0,210); 
		$pdf->Image($target_file, 170.82,25,24); 
		//date line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(180);
		$pdf->Cell(0,23,'12/19/2017', 0,0);

		//FIRST LINE
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,45,'LAG-0000001', 0,0);

		$pdf->SetX(42.5);
		$pdf->Cell(0,45,$name,0,0);

		$pdf->SetX(120);
		$pdf->Cell(0,45,$batchNumber, 0, 0);

		$pdf->SetX(141);
		$pdf->Cell(0,45,$strand,0,0);

		//second line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,72,$school, 0,0);

		$pdf->SetX(137);
		$pdf->Cell(0,72,'OJT',0,0);


		//SECOND COPY

		//date line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(175);
		$pdf->Cell(0,217,'12/19/2017', 0,0);
		$pdf->Image($target_file, 170.82,121.50,24); 
		//FIRST LINE
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,237,'LAG-0000001', 0,0);

		$pdf->SetX(42.5);
		$pdf->Cell(0,237,$name,0,0);

		$pdf->SetX(120);
		$pdf->Cell(0,237,$batchNumber, 0, 0);

		$pdf->SetX(141);
		$pdf->Cell(0,237,$strand,0,0);

		//second line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,264,$school, 0,0);

		$pdf->SetX(137);
		$pdf->Cell(0,264,'OJT',0,0);

		//REMINDERS
		$pdf->SetX(50);
		$pdf->SetY(155);
		$pdf->SetLeftMargin(15);
		$pdf->Write(0, 'insert reminders');

		//third copy
		$pdf->SetX(100);
		$pdf->SetY(196.5);
		$pdf->Cell(177,0, '12/19/2017',0,0, 'R');
		$pdf->Image($target_file, 170.82,199.3,24); 
		$pdf->SetY(200);
		$pdf->Cell(0,0,'',0,0);

		$pdf->SetX(50);
		$pdf->SetY(206.5);
		$pdf->SetLeftMargin(16);
		$pdf->Cell(0,28, $name,0,0);
		$pdf->SetX(138);
		$pdf->Cell(0,28, 'OJT',0,0);

		$pdf->SetX(75);
		$pdf->SetY(206.5);
		$pdf->SetLeftMargin(16);
		$pdf->Cell(0,0, 'LAG-0000001',0,0);
		$pdf->SetX(43);
		$pdf->Cell(0,0, $name,0,0);
		$pdf->SetX(120);
		$pdf->Cell(0,0, $batchNumber,0,0);
		$pdf->SetX(142);
		$pdf->Cell(0,0, $strand,0,0);

		//REMINDERS
		$pdf->SetX(50);
		$pdf->SetY(233);
		$pdf->SetLeftMargin(15);
		$pdf->Write(0, 'insert facilitators');

		$pdf->Output();
	}
}

?>