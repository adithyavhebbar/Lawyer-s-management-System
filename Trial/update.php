<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <link rel='stylesheet' href='bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css' />
    <script src='bootstrap/bootstrap-4.3.1-dist/js/bootstrap.js'></script>
    <link rel='stylesheet' href='css/upcase.css'/>
    <link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link href='font.css' rel='stylesheet' type='text/css'>
    <link href='font1.css' rel='stylesheet' type='text/css'>
  
    <!-- Theme CSS -->
    <link href='css/freelancer.min.css' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
   
    <!-- Material Design Bootstrap -->
    <link href='css/mdb.min.css' rel='stylesheet'>
    <!-- Your custom styles (optional) -->
    <link href='css/style.min.css' rel='stylesheet'>
</head>
<body>
    <nav class='navbar navbar-expand-lg text-uppercase fixed-top' id='mainNav' style='background-color: black;height:85px;'>
        <div class='container' style='background-color: black;'>
          <a class='navbar-brand js-scroll-trigger' href='#page-top'>Ministry Of Law and Justice(India)<image src='img/e4.jpg' class='w3-image' width='50' height='75'></image></a>
          <button class='navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
            Menu
            <i class='fas fa-bars'></i>
          </button>
          <div class='collapse navbar-collapse' id='navbarResponsive'>
            <ul class='navbar-nav ml-auto'>
              
              <li class='nav-item mx-0 mx-lg-1'>
                <a class='nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger' href='logout.php'  onmouseover='{this.style.backgroundColor='#343a40';this.style.color='white'}' onmouseout='this.style.backgroundColor='#000000'' onmouseout='this.style.backgroundColor='#fff''>LogOut</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class='row justify-content-center' style='margin: 5%;'>
        <div class='col-md-6'>
            <div class='card'>
                <header class='card-header'>
                    <!-- <a href='' class='float-right btn btn-outline-primary mt-1'>Log in</a> -->
                    <h4 class='card-title mt-2'>Updation</h4>
                </header>
                <article class='card-body'>
                <?php
                    if(isset($_COOKIE['regno']))
                    $regno=$_COOKIE['regno'];
	                define('DB_SERVER', 'localhost');
	                define('DB_USERNAME', 'root');
	                define('DB_PASSWORD', '');
                    define('DB_DATABASE', 'dbms');
	                $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                    if($db->connect_error) die('Database access failed:' .$db->error);
                    $query="select l.regno,l.name,l.gender,l.dob,l.doorno,l.street,l.locality,l.city,l.state,l.pincode,l.contact_no,l.email_id,l.pctype,q.llb,q.llm,q.mphil,q.phd,d.designation,c.court_name,p.place_name
                    from lawyers l,court c,place p,qualification q,designation d
                    where l.regno='$regno'
                    and q.regno='$regno'
                    and d.regno='$regno'
                    and d.court_abv=c.court_abv
                    and d.place_id=p.place_id";
            $result=$db->query($query);
            if(!$result) die("Database access failed: " .$db->error);
            $rows=$result->num_rows;
                    echo "
                            <form method='POST' action='update1.php'>
                                <div class='form-group'>
                                <div class='form-row'>
                                <div class='form-group col'>
                                    <label>Door No</label>";
                    for ($j = 0;$j < $rows ; ++$j)
	                {
		                $result->data_seek($j);
		                $row=$result->fetch_array(MYSQLI_NUM);
		                for($k = 0 ;$k < 20 ; ++$k)
		                {
                            if($k==4){
                                   echo "<input type='text' class='form-control' placeholder='$row[$k]' name='doorno'>
                                         </div>
                                        <div class='form-group col'>
                                            <label>Street</label>";
                                }else if($k==5){
                                    echo "<input type='text' class='form-control' placeholder='$row[$k]' name='street'>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                        <div class='form-group col'>
                                        <label>Locality</label>";
                                }else if($k==6){
                                    echo "<input type='text' class='form-control' placeholder='$row[$k]' name='locality'>
                                        </div>
                                        <div class='form-group col'>
                                        <label>City</label>";
                                }else if($k==7){
                                    echo "<input type='text' class='form-control' placeholder='$row[$k]' name='city'>
                                        </div>
                                        </div>
                                        <div class='form-row'>
                                        <div class='form-group col'>
                                        <label>State</label>";
                                }else if($k==8){
                                    echo "<input type='text' class='form-control' placeholder='$row[$k]' name='state'>
                                        </div>
                                        <div class='form-group col'>
                                        <label>Pin Code</label>";
                                }else if($k==9){
                                        echo "<input type='text' class='form-control' placeholder='$row[$k]' name='pincode'>
                                            </div>
                                            </div>
                                            <p class='text-lg-center mt-lg-5 text-primary text-uppercase bold'>Contact Details</p>
                                            <div class='form-row'>
                                            <div class='form-group col'>
                                            <label>Contact No</label>";
                                }else if($k==10){
                                            echo "<input type='text' class='form-control' placeholder='$row[$k]' name='contact_no'>
                                                </div>
                                                
                                                <div class='form-group col'>
                                                <label>Email Id</label>";
                                }else if($k==11){
                                    echo "<input type='text' class='form-control' placeholder='$row[$k]' name='email_id'>
                                    </div>
                                    </div>
                                    <div class='col form-group'>
                                    <label>Preferred Case Type</label>
                                    <div class='drop-down'>";
                                }else if($k==12){
                                        echo "<select name='pctype' class='form-control col-lg-12'>";
                                        if($row[$k]=='criminal')
                                        {
                                            echo "<option value='criminal' selected>Criminal</option>";
                                            echo "<option value='legal'>Legal</option>";
                                        }
                                        else
                                        {
                                                echo "<option value='criminal'>Criminal</option>";
                                                echo "<option value='legal' selected>Legal</option>";
                                        }
                                        echo "</select>
                                                </div>
                                             </div>
                                             <p class='text-lg-center mt-lg-5 text-primary text-uppercase bold'>Qualification</p>
                                             <div class='form-row'>
                                             <div class='form-group col'>
                                            <label>LLB </label><br>";
                                }else if($k==13){
                                    if($row[$k]=='yes'){
                                        echo "<input type='radio' name='llb' value='yes' style='color:black' checked/>yes &nbsp; &nbsp;<input type='radio' name='llb' value='no' style='color:black' />no</th><br>";
                                    }else
                                    {
                                        echo "<input type='radio' name='llb' value='yes' style='color:black' />yes &nbsp; &nbsp;<input type='radio' name='llb' value='no' style='color:black' checked/>no</th><br>";
                                    }
                                    echo "</div>";
                                    echo "<div class='form-group col'>
                                            <br><label>LLM </label><br>";
                                }else if($k==14){
                                    if($row[$k]=='yes'){
                                        echo "<input type='radio' name='llm' value='yes' style='color:black' checked/>yes &nbsp; &nbsp;<input type='radio' name='llm' value='no' style='color:black' />no</th><br>";
                                    }else
                                    {
                                        echo "<input type='radio' name='llm' value='yes' style='color:black' />yes &nbsp; &nbsp;<input type='radio' name='llm' value='no' style='color:black' checked/>no</th><br>";
                                    }
                                    echo "</div></div>";
                                    echo "<div class='form-row'>
                                             <div class='form-group col'>
                                            <br><label>M Phil </label><br>";
                                }else if($k==15){
                                    if($row[$k]=='yes'){
                                        echo "<input type='radio' name='mphil' value='yes' style='color:black' checked/>yes &nbsp; &nbsp;<input type='radio' name='mphil' value='no' style='color:black' />no</th><br>";
                                    }else
                                    {
                                        echo "<input type='radio' name='mphil' value='yes' style='color:black' />yes &nbsp; &nbsp;<input type='radio' name='mphil' value='no' style='color:black' checked/>no</th><br>";
                                    }
                                    echo "</div>
                                             <div class='form-group col'>
                                            <br><label> PhD</label><br>";
                                }else if($k==16){
                                    if($row[$k]=='yes'){
                                        echo "<input type='radio' name='phd' value='yes' style='color:black' checked/>yes &nbsp; &nbsp;<input type='radio' name='phd' value='no' style='color:black' />no</th><br>";
                                    }else
                                    {
                                        echo "<input type='radio' name='phd' value='yes' style='color:black' />yes &nbsp; &nbsp;<input type='radio' name='phd' value='no' style='color:black' checked/>no</th><br>";
                                    }
                                    echo "</div></div><p class='text-lg-center mt-lg-5 text-primary text-uppercase bold'>Current Info</p>";
                                    echo "<div class='form-row'>
                                             <div class='form-group col'>
                                            <label>Designation</label><br>";
                                }else if($k==17){
                                    echo "<select name='designation' class='form-control col-lg-12'>";
                                    if($row[$k]=='advocate')
                                    {
                                        echo "<option value='advocate' selected>Advocate</option>";
                                        echo "<option value='judge'>Judge</option>";
                                        echo "<option value='publicProsecutor'>Public Prosecutor</option>";
                                        echo "<option value='legalAdvisor'>Legal Advisor</option>";
                                    }
                                    else if($row[$k]=='judge')
                                    {
                                        echo "<option value='advocate'>Advocate</option>";
                                        echo "<option value='judge' selected>Judge</option>";
                                        echo "<option value='publicProsecutor'>Public Prosecutor</option>";
                                        echo "<option value='legalAdvisor'>Legal Advisor</option>";
                                    }
                                    else  if($row[$k]=='legalAdvisor')
                                    {
                                        echo "<option value='advocate'>Advocate</option>";
                                        echo "<option value='judge'>Judge</option>";
                                        echo "<option value='publicProsecutor'>Public Prosecutor</option>";
                                        echo "<option value='legalAdvisor' selected>Legal Advisor</option>";
                                    }
                                    else  if($row[$k]=='publicProsecutor')
                                    {
                                        echo "<option value='advocate'>Advocate</option>";
                                        echo "<option value='judge'>Judge</option>";
                                        echo "<option value='publicProsecutor' selected>Public Prosecutor</option>";
                                        echo "<option value='legalAdvisor'>Legal Advisor</option>";
                                    }
                                    echo "</select>
                                            </div>
                                         </div>
                                         <div class='form-row'>
                                        <div class='col form-group'>
                                        <label>Court</label>
                                        <div class='drop-down'>";
                                    }else if($k==18){
                                        echo "<select name='court_abv' class='form-control col-lg-12'>";
                                        if($row[$k]=='District Court'){
                                            echo "<option value='dc' selected>District Court</option>
                                                    <option value='hc'>High Court</option>
                                                    <option value='sc'>Supreme Court</option>";
                                        }else if($row[$k]=='High Court'){
                                            echo "<option value='dc' >District Court</option>
                                                    <option value='hc' selected>High Court</option>
                                                    <option value='sc'>Supreme Court</option>";
                                        }else if($row[$k]=='Supreme Court'){
                                            echo "<option value='dc' >District Court</option>
                                                    <option value='hc' >High Court</option>
                                                    <option value='sc' selected>Supreme Court</option>";
                                        }
                                        echo "</select>
                                                </div>
                                                </div>
                    
                                            <div class='form-group col'>
                                            <label>Place</label>;
                                            <div class='drop-down'>";
                                    }else if($k==19){
                                        echo "<select name='place_id' class='form-control col-lg-12'>";
                                        if($row[$k]=='Bangalore'){
                                            echo "<option value='1' selected>Bangalore</option>
                                                    <option value='4'>Kolkata</option>
                                                    <option value='3'>Delhi</option>
                                                    <option value='2'>Chennai</option>";
                                        }else if($row[$k]=='chennai'){
                                            echo "<option value='1' >Bangalore</option>
                                                    <option value='4' selected>Kolkata</option>
                                                    <option value='3'>Delhi</option>
                                                    <option value='2'>Chennai</option>";
                                        }else if($row[$k]=='Delhi'){
                                            echo "<option value='1' >Bangalore</option>
                                                    <option value='4'>Kolkata</option>
                                                    <option value='3' selected>Delhi</option>
                                                    <option value='2'>Chennai</option>";
                                        }else if($row[$k]==4){
                                            echo "<option value='1' >Bangalore</option>
                                                    <option value='4'>Kolkata</option>
                                                    <option value='3'>Delhi</option>
                                                    <option value='2' selected>Chennai</option>";
                                        }
                                        echo "</select></div></div>";
                                    }
                                }
                            }
                            echo " </div>
                                <center><input type='submit' value='submit'/>
                             </form>";
                    ?>

                </article>
            </div>
        </div>
</body>
</html>