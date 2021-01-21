<?php
require_once('../FPDF/fpdf.php');
require_once('config.php');

class mypdf extends FPDF{
	function header(){
		$this->Image('img/e3.jpg',10,6);
        $this->SetFont('Arial','B',14);
        $this->SetTextColor(88,144,173);
		$this->Cell(190,5,'LAWYER\'S ASSOCIATION',0,0,'C');
		$this->Ln();
        $this->SetFont('Times','B',12);
        $this->SetTextColor(84,69,81);
		$this->Cell(190,10,'Lawyers Details',0,0,'C');
		$this->Ln(20);

	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
    function tableheader(){
        // $this->Cell(0,25);
        $this->SetFont('Times','B',12);
        $this->Cell(15,10,'RegNo',1,0,'C');
        $this->Cell(30,10,'Name',1,0,'C');
        $this->Cell(18,10,'Gender',1,0,'C');
        $this->Cell(20,10,'DOB',1,0,'C');
        $this->Cell(30,10,'Contact No',1,0,'C');
        $this->Cell(30,10,'emial-id',1,0,'C');
        $this->Cell(20,10,'case type',1,0,'C');
        $this->Cell(30,10,'Place of work',1,1,'C');
    }
    function tableContents(){
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $query = "select l.regno,l.name,l.gender,l.dob,l.city,l.contact_no,l.email_id,l.pctype,p.place_name
				from lawyers l,place p,designation d
				where d.place_id=p.place_id
                and d.regno=l.regno";
        $result=$db->query($query);
        if(!$result) die("database access failed" .$db->error);
        $rows=$result->num_rows;


        for ($j = 0 ;$j < $rows ; ++$j)
	    {
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		// echo "<tr align='right'>";
		for ($k = 0; $k < 9; ++$k)
		{
            $this->SetFont('Times','',12);
            if($k==0)
                $this->Cell(15,10,$row[$k],1,0,'C');
            else if($k==1)
                $this->Cell(30,10,$row[$k],1,0,'C');
            else if($k==2)
                $this->Cell(18,10,$row[$k],1,0,'C');
            else if($k==3)
                $this->Cell(20,10,$row[$k],1,0,'C');
            else if($k==5)
                $this->Cell(30,10,$row[$k],1,0,'C');
            else if($k==6)
                $this->Cell(30,10,$row[$k],1,0,'C');
            else if($k==7)
                $this->Cell(20,10,$row[$k],1,0,'C');
            else if($k==8)
                $this->Cell(30,10,$row[$k],1,1,'C');     
        }
        }
    }
}
$pdf = new mypdf();
$pdf->AddPage();
$pdf->tableheader();
$pdf->tableContents();
// $pdf->Image('img/back.png', 15, 100.3, "", "lawyer.php");
$pdf->Output("details.pdf","D");
?>
