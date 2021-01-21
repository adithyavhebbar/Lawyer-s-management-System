<html>
    <head>
        <title>Lawyers Department</title>
        <link rel="stylesheet" href="Bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css"/>
    </head>
    <body>
        <table class="table">
            <tr><td class="col-lg-3">
            <nav class="nav flex-column bg-light col-lg-12">
            <h5 class="mt-lg-2 ml-lg-3">Lawyer's Association</h5>
            <div class="border mt-lg-3">
            <a class="btn btn-success col-lg-6 mt-lg-3 ml-lg-5" href="#lawyers">Lawyers</a>
            <p class="mt-lg-2 ml-lg-5 font-weight-bold">By Reg </p>
            <form class="form-group row mt-lgn-3" action="l.php" method="POST">
                <input type="text" class="form-control col-lg-6 ml-lg-4" placeholder="regno"/>
                <input type="submit" class="btn btn-primary ml-lg-1" value="go"/>
            </form>
            <p class="mt-lg-2 ml-lg-5 font-weight-bold">By Place </p>
            <form class="form-group row mt-lgn-3" action="p.php" method="POST">
                <select name="" class="form-control col-lg-6 ml-lg-4">
                    <option>Bangalore</option>
                    <option>Chennai</option>
                    <option>Kolkata</option>
                    <option>Delhi</option>
                </select>
                <input type="submit" class="btn btn-primary ml-lg-1" value="go"/>
            </form>
            <p class="mt-lg-2 ml-lg-5 font-weight-bold">By Age Above</p>
            <form class="form-group row mt-lgn-3" action="a.php" method="POST">
                <input type="text" class="form-control col-lg-6 ml-lg-4" placeholder="Age"/>
                <input type="submit" class="btn btn-primary ml-lg-1" value="go"/>
            </form>
            <p class="mt-lg-2 ml-lg-5 font-weight-bold">By Designation</p>
            <form class="form-group row mt-lgn-3" action="d.php" method="POST">
                <select name="" class="form-control col-lg-6 ml-lg-4">
                    <option>Public prosecutor</option>
                    <option>Judge</option>
                    <option>Advocate</option>
                    <option>Legal Advisor</option>
                </select>
                <input type="submit" class="btn btn-primary ml-lg-1" value="go"/>
            </form>
            </div>

            <div class="border mt-lg-3">
                <a class="btn btn-success col-lg-6 mt-lg-3 ml-lg-5" href="#cases">Cases</a>
                <p class="mt-lg-2 ml-lg-3 font-weight-bold">Handled by Lawyer</p>
                <form class="form-group row mt-lgn-3" action="c.php" method="POST">
                    <input type="text" class="form-control col-lg-6 ml-lg-4" placeholder="regno"/>
                    <input type="submit" class="btn btn-primary ml-lg-1" value="go"/>
                </form>
                <p class="mt-lg-2 ml-lg-5 font-weight-bold">By Court</p>
                <form class="form-group row mt-lgn-3" action="court.php" method="POST">
                <select name="court_abv" class="form-control col-lg-6 ml-lg-4">
                    <option value="dc">High Court</option>
                    <option value="hc">Supreme Court</option>
                    <option value="sc">District Court</option>
                </select>
                <select name="placeid" class="form-control col-lg-6 ml-lg-4">
                    <option value="1">Bangalore</option>
                    <option value="2">Chennai</option>
                    <option value="3">Kolkata</option>
                    <option value="4">Delhi</option>
                </select>
                <input type="submit" class="btn btn-primary ml-lg-1" value="go"/>
                </form>
                <p class="mt-lg-2 ml-lg-3 font-weight-bold">By Date</p>
                <form class="form-group row mt-lgn-3" action="date.php" method="POST">
                    <input type="date" class="form-control col-lg-6 ml-lg-4"/>
                    <input type="submit" class="btn btn-primary ml-lg-1" value="go"/>
                </form>
            </div>
            <div class="border mt-lg-3">
                <h5 class="ml-lg-3">Association Details</h5>
                <a class="col-lg-6 mt-lg-3 ml-lg-3" href="ongoing.php">Ongoing Cases</a><br>
                <a class="col-lg-6 mt-lg-3 ml-lg-3" href="nol.php">Lawyers Enrolled</a><br>
                <a class="col-lg-6 mt-lg-3 ml-lg-3" href="noc.php">Number of cases</a><br>
                <a class="col-lg-6 mt-lg-3 ml-lg-3" href="nog.php">Number of guests</a><br>
            </div>
            <div class="mb-lg-3">
            </div>
        </nav>
        </td>
        <td class="table-active">
        <div class="h3">
           <p> Lawyer's Association</p>
            <br>
        </div>
        <p class="h4" id='lawyers'>Lawyers</p>
        <hr>

         <!-- This is where the content of the body goes -->
        <?php
            include('config.php');

            	
	        $query="select l.regno,l.name,l.gender,l.dob,l.city,l.contact_no,l.email_id,l.pcttype,d.designation,c.court_name,p.place_name,d.since,r.rating
			from lawyers l,court c,place p,qualification q,experience e,designation d,final_rating r
			where d.court_abv=c.court_abv
			and r.regno=l.regno
			and q.regno=l.regno
			and e.regno=l.regno
			and l.regno=d.regno
			and p.place_id=d.place_id";
			$result=$db->query($query);
	        if(!$result) die("Database access failed: " .$db->error);
            $rows=$result->num_rows;
            
            echo "<table class='table table-bordered table-responsive col-lg-9'>";
            echo"<thead class='thead-dark'><tr><th>Reg no</th><th> Name</th><th>gender</th><th>dob</th><th>city</th><th>contact no</th><th>email_id</th><th>Preferred case type</th><th>designation</th><th>court name</th><th>place</th><th>since</th><th>rating</th><th>view</th><th>rate</th></tr></thead>";
            for ($j = 0 ;$j < $rows ; ++$j)
	        {
		        $result->data_seek($j);
		        $row=$result->fetch_array(MYSQLI_NUM);
		        echo "<tbody class='table-info'><tr>";
		        for ($k = 0; $k < 13; ++$k)
		        {	
			        if($k == 0)
			        {
				        $regno=$row[$k];
			        }
			    echo "<td nowrap>$row[$k]</td>";
                }
                echo "<form method='POST' action='view1.php'>";
		        echo " <td nowrap style='color:black;'>	<select name='view'>
					<option value='$regno'>View</option>
				</select> &emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
		        echo "</form>";
		
		        echo "<form method='POST' action='rate.php'>";
		        echo " <td nowrap style='color:black;'>	<select name='rate'>
					<option value='$regno'>Rate </option>
				</select>
				&emsp; <input  style='color:black;' type='submit' name='submit' value='Go'></td>";
		        echo "</form>";
		
		        echo "</tr></tbody></table>";
            }



            // Second case table starts here
                // echo '<div calss="mb-lg-5">';
                // echo '</div>';
                echo '</div>';
                echo '<p style="visibility: hidden;">dhkDLd</p>';
                echo '<p class="h4" id="cases">Cases</p>';
                echo '</div>';
                echo '<hr>';



                $query = "select c.case_id,c.case_title,c.cs_date,c.cc_date,c.c_type,c.judgement,co.court_name,p.place_name
				from cases c,place p,court co,judgement j,clawyer cl
				where c.place_id=p.place_id
				and j.case_id=c.case_id
				and cl.case_id=c.case_id
				and co.court_abv=c.court_abv";
	            $result = $db->query($query);
	            if(!$result) die("database access failed" .$db->error);
	            $rows=$result->num_rows;
                echo"<table class='table table-bordered col-lg-9'><thead class='thead-dark'><tr><th>Case_id</th><th>Case Title</th><th>case start date</th><th>case close date</th><th>case type</th><th>judgement</th><th>court</th><th>place</th></tr></thead>";
	for ($j = 0 ;$j < $rows ; ++$j)
	{
		$result->data_seek($j);
		$row=$result->fetch_array(MYSQLI_NUM);
		echo "<tbody class='table-info'><tr>";
		for ($k = 0; $k < 8; ++$k)
		{	
			if($k == 0)
			{
				$case_id=$row[$k];
			}
			echo "<td>$row[$k]</td>";
		}
		
	
		
		echo "</tr>";
	}
	echo "</tbody></table>";

        ?>
        

        </td>
    </tr>
    </table>
    </body>
</html>