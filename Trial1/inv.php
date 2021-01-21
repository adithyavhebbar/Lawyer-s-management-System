<?php
$con=mysqli_connect("localhost","root","","dbms");
if(mysqli_connect_errno())
{
	echo "error is occured:" . mysqli_connect_error();
}
$sql="INSERT INTO cases (case_id,case_title,cs_date,cc_date,c_type,judgement,court_abv,place_id) 
VALUES
(NULL,'$_POST[case_title]','$_POST[start_date]','$_POST[end_date]','$_POST[c_type]','$_POST[judgement]','$_POST[court_abv]','$_POST[place_id]')";

$result=mysqli_query($con,$sql);

$insertid = $con->insert_id;
$sql="INSERT INTO clawyer (case_id,lawyer1,lawyer2,lawyer3,lawyer4) 
VALUES
('$insertid','$_POST[lawyer1]','$_POST[lawyer2]','$_POST[lawyer3]','$_POST[lawyer4]')";
  $result=mysqli_query($con,$sql);
  
  
  
  echo "<SCRIPT>
window.location='dashboard.php';
</SCRIPT>"; 
//echo "1 record added";
mysqli_close($con);

?>
