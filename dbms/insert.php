<?php
  session_start();
$con=mysqli_connect("localhost","root","","dbms");
if(mysqli_connect_errno())
{
	echo "error is occured:" . mysqli_connect_error();
}
$sql="INSERT INTO lawyers (regno,name,gender,dob,doorno,street,locality,city,state,pincode,contact_no,email_id,pcttype)
VALUES
(NULL,'$_POST[name]','$_POST[gender]','$_POST[dob]','$_POST[doorno]','$_POST[street]','$_POST[locality]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[contact_no]','$_POST[email_id]','$_POST[pctype]')";
$result1 = $con->query($sql);
if($con->error) exit($con->error);

if (!$result1)
   return false; 
  
  $insertid = $con->insert_id;
  $_SESSION['insertid']=$insertid;

  
 
  
  $sql="insert into qualification (regno,llb,llm,mphil,phd) values ('$insertid','$_POST[llb]','$_POST[llm]','$_POST[mphil]','$_POST[phd]')";
  $result2 = $con->query($sql);
if($con->error) exit($con->error);

if (!$result2)
   return false;
  
  $sql="insert into experience (regno,ayearsdc,ayearshc,ayearssc,jyearsdc,jyearshc,jyearssc) values ('$insertid','$_POST[adc]','$_POST[ahc]','$_POST[asc]','$_POST[jdc]','$_POST[jhc]','$_POST[jsc]')";
  $result3 = $con->query($sql);
if($con->error) exit($con->error);

if (!$result3)
   return false;
$sql="insert into designation (regno,designation,court_abv,place_id,since) values ('$insertid','$_POST[designation]','$_POST[court_abv]','$_POST[placeid]','$_POST[since]')";
 
$result = $con->query($sql);
if($con->error) exit($con->error);

if (!$result)
   return false;
  
  
 header('location: createpassword.php');





mysqli_close($con);

?>
