<html>
<head>
	<link rel="stylesheet" href="../bootstrap/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.css"/>
</head>
<body>
<?php
include('config.php');
	echo "<P align='right'><a href='adminwelcome.html'><button type='button' style='color:black;'>Back</button></a></p>";
$query = "select * from review";
$result=$db->query($query);
if(!$result) die("database access failed" .$db->error);
$rows=$result->num_rows;
// echo '<nav class="navbar navbar-inverse bg-dark">';
// echo '<div class="container-fluid">';
// echo'<div class="navbar-header">';
// echo '<span class="text-primary nav-header" style="font-weight: bold;">Lawyer\'s Association</span>';
// echo "</div>";
// echo '<ul class="nav navbar-nav navbar-right">';
// echo '<li><input type="button" class="btn btn-secondary" value="Logout" /></li>';
// echo '<li><a href="adminwelcome.html" class="btn btn-secondary" role="button">back</li>';
// echo '</ul>';
// echo '</div>';
// echo '</nav>';
echo '<br>';
if($rows == 0)
	{
        echo '<div class="jumbotron bg-info col-lg-8 ml-lg-5 text-danger col-sm-4">';
        echo "<p class='pl-lg-5'>No Updations</p>";
        echo '</div>';
    }

else{
    echo '<div class="container border bg-light">';
    echo '<p class="text-uppercase mt-lg-3 font-weight-bold">Updates submitted</p></div><br>';
for ($j = 0 ;$j < $rows ; ++$j)
	{
        echo"<div class='table-responsive'><table class='table table-bordered'><thead class='thead-dark'><tr class='thed-dark'><th>Reg no</th><th> Name</th><th>gender</th><th>dob</th><th>doorno</th><th>street</th><th>locality</th><th>city</th><th>state</th><th>pincode</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>llb</th><th>llm</th><th>mphil</th><th>phd</th><th>ayearsdc</th><th>ayearshc</th><th>ayearssc</th><th>jyearsdc</th><th>jyearshc</th><th>jyearssc</th><th>designation</th><th>court_abv</th><th>place_id</th><th>since</th></tr><thead>";
        $result->data_seek($j);
        $row=$result->fetch_array(MYSQLI_NUM);
        echo "<tbody class='table-info'><tr>";

		for ($k = 0; $k < 27; ++$k)
		{	
			if($k == 0)
			{
				$regno=$row[$k];
			}
			echo "<td>$row[$k]</td>";
        }
        echo '</tr></tbody></table></div><br>';
    }
    $query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pcttype,q.llb,q.llm,q.mphil,q.phd,e.ayearsdc,e.ayearshc,e.ayearssc,e.jyearsdc,e.jyearshc,e.jyearssc,d.designation,d.court_abv,d.place_id,d.since
			from lawyers l,qualification q,experience e,designation d
			where l.regno='$regno'
			and q.regno='$regno'
			and e.regno='$regno'
            and d.regno='$regno'";
            
    $res=$db->query($query);
	if(!$result) die("Database access failed: " .$db->error);
    $rows=$res->num_rows;
    echo '<div class="container border bg-light">';
    echo '<p class="text-uppercase mt-lg-3 ml-auto font-weight-bold">Current Data</p></div>';

    echo '<div class="table-responsive"><table class="table table-bordered">';
for ($j = 0 ;$j < $rows ; ++$j)
	{
        echo"<table class='table table-bordered'><thead class='thead-dark'><tr class='thed-dark'><th>Reg no</th><th> Name</th><th>gender</th><th>dob</th><th>doorno</th><th>street</th><th>locality</th><th>city</th><th>state</th><th>pincode</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>llb</th><th>llm</th><th>mphil</th><th>phd</th><th>ayearsdc</th><th>ayearshc</th><th>ayearssc</th><th>jyearsdc</th><th>jyearshc</th><th>jyearssc</th><th>designation</th><th>court_abv</th><th>place_id</th><th>since</th></tr><thead>";
        echo "<tr>";
        for ($i = 0 ;$i < 1 ; ++$i)
		{
			$res->data_seek($j);
			$row=$res->fetch_array(MYSQLI_NUM);
			echo "<tr align='right'><tbody class='table-info'>";
			for ($k = 0; $k < 27; ++$k)
			{	
				
				echo "<td>$row[$k]</td>";
            }
            echo '</tr><tbody></table></div>';
        }
    }
    echo "<br>";
    echo '<div class="container-fluid ml-auto row">';
    echo "<form method='POST' action='accept.php' class='form-group row'>";
			echo "<select name='accept' class='form-control col-lg-10'>
					<option value='$regno'>Accept Changes</option>
						</select> &emsp; <input type='submit' class='btn btn-primary mt-lg-1' name='submit' value='Go'></td>";
            echo "</form> &emsp; &emsp; &emsp; &emsp;";
            echo "<form method='POST' action='decline.php' class='form-group row'>";
			echo "<select name='decline' class='form-control col-lg-10'>
						<option value='$regno'>Decline Changes</option>
					</select> &emsp; <input type='submit' class='btn btn-primary mt-lg-1' name='submit' value='Go'></td>";
            echo "</form>";
}
        ?>
    </body>
</html>  