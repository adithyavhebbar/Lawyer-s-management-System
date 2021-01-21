<?php
require_once('../FPDF/fpdf.php');
session_start();
$regno=$_SESSION['regno'];
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'dbms');

// $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// if($db->connect_error) die("Database access failed:" .$db->error);
// $result=$db->query($query);
// if(!$result) die("Database access failed: " .$db->error);
// $rows=$result->num_rows;
// print_r($rows);
// $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// if($db->connect_error) die("Database access failed:" .$db->error);
$regno=$_SESSION['regno'];



// Pdf starts here

class mypdf extends FPDF{
	function header(){
		$this->Image('img/e3.jpg',1,1);
		$this->SetFont('Arial','B',14);
		$this->SetTextColor(88,144,173);
		$this->Cell(190,5,'LAWYER\'S ASSOCIATION',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','B',12);
		$this->SetTextColor(84,69,81);
		$this->Cell(190,10,'Lawyer Details',0,0,'C');
		$this->Ln(20);

	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}


	function viewTable(){
		// $pdf=new fpdf();
		// $this->AddPage();
		$regno=$_SESSION['regno'];
		$query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pctype,q.llb,q.llm,q.mphil,q.phd,d.designation,c.court_name,p.place_name
			from lawyers l,court c,place p,qualification q,designation d
			where l.regno='$regno'
			and q.regno='$regno'
			and d.regno='$regno'
			and d.court_abv=c.court_abv
            and d.place_id=p.place_id";
		$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$result=$db->query($query);
		$rows=$result->num_rows;
		for ($j = 0;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		// print_r($result);
        $row=$result->fetch_array(MYSQLI_NUM);
        // print_r($row);
		for($k = 0 ;$k < 27 ; ++$k)
		{
			if($k == 0)
			{
					$this->Cell(45,25);
					$this->SetFont('Times','',12);
					$this->Cell(50,7,'Register No',1,0,'C');
					$this->Cell(50,7,$row[$k],1,1,'C');
			}
			else if($k == 1)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Name',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			else if($k == 2)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Gender',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			else if($k == 3)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Date of Birth',1,0,'C');
				$this->Cell(50,7,($row[$k]),1,1,'C');
				
			}
			// else if($k == 4)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 5)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 6)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			else if($k == 7)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'City',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');	
			}
			else if($k == 8)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'State',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			else if($k == 9)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Pincode',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			else if($k == 10)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Contact Number',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			else if($k == 11)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'e-mail',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			else if($k == 12)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Preferred case type',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			// else if($k == 13)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 14)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 15)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 16)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 17)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 18)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 19)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 20)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 21)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			// else if($k == 22)
			// {
			// 	$this->Cell(45,25);
			// 	$this->SetFont('Times','',12);
			// 	$this->Cell(50,7,'Name',1,0,'C');
			// 	$this->Cell(50,7,$row[$k],1,1,'C');
			// }
			else if($k == 17)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Designation',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
				else if($k == 18)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Working in',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
				else if($k == 19)
			{
				$this->Cell(45,25);
				$this->SetFont('Times','',12);
				$this->Cell(50,7,'Place of work',1,0,'C');
				$this->Cell(50,7,$row[$k],1,1,'C');
			}
			
		}
    }	
	}
// Pdf table ends here 
}
$pdf = new mypdf();
$pdf->AddPage();
$pdf->viewTable();
$pdf->Output("individual.pdf","D");
?>