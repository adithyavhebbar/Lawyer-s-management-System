<?php
$con=mysqli_connect("localhost","root","","dbms");
if(mysqli_connect_errno())
{
	echo "error is occured:" . mysqli_connect_error();
}
$sql="INSERT INTO cases (case_id,case_title,cs_date,cc_date,c_type,judgement,court_abv,place_id) 
VALUES
(NULL,'$_POST[case_title]','$_POST[cs_date]','$_POST[cc_date]','$_POST[c_type]','$_POST[judgement]','$_POST[court_abv]','$_POST[place_id]')";

$result=mysqli_query($con,$sql);

$insertid = $con->insert_id;
$sql="INSERT INTO clawyer (case_id,lawyer1,lawyer2,lawyer3,lawyer4) 
VALUES
('$insertid','$_POST[lawyer1]','$_POST[lawyer2]','$_POST[lawyer3]','$_POST[lawyer4]')";
  $result=mysqli_query($con,$sql);
  
  $sql="INSERT INTO judgement (case_id,jto1,jto2,jto3,jto4) 
VALUES
('$insertid','$_POST[jto1]','$_POST[jto2]','$_POST[jto3]','$_POST[jto4]')";
  $result=mysqli_query($con,$sql);
  if($con->error) exit($con->error);
  
  echo "<SCRIPT>
window.location='adminwelcome.html';
</SCRIPT>"; 
//echo "1 record added";
mysqli_close($con);

?>
