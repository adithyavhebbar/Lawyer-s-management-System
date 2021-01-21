<!DOCTYPE html>
<html>
<title>Lawyers association</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" >
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
table, th, td {
    border: 1px solid white;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
	}
	.tablehor{
	overflow-x: auto;
}
</style>

<body class="w3-black">
<?php
include('config.php');
session_start();
$regno=$_POST['rate'];
$_SESSION['regno']=$regno;

?>
<div class="w3-content w3-justify w3-text-grey w3-padding-64">
<h1 class="w3-text-light-grey" align="center" style="font-size:50px">Rating for Lawyer reg no : <?php echo $regno;?></h1>
				<form method="POST" action="rating.php">
				<div class='rating'>
				<p align='center'><input type='radio' name='star' id='star1' value='5'><label for='star1'></label>
				<input type='radio' name='star' id='star2' value='4'><label for='star2'></label>
				<input type='radio' name='star' id='star3' value='3'><label for='star3'></label>
				<input type='radio' name='star' id='star4' value='2'><label for='star4'></label>
				<input type='radio' name='star' id='star5' value='1'><label for='star5'></label></p>
				</div>
				<p align='center' ><input style="color:black;" type="submit" name="submit"></p>
				</form>
</body>
</html>