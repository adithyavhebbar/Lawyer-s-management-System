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
                    $case_id=$_POST['update'];
	                define('DB_SERVER', 'localhost');
	                define('DB_USERNAME', 'root');
	                define('DB_PASSWORD', '');
                    define('DB_DATABASE', 'dbms');
                    setcookie('case_id',$_POST['update']);
	                $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                    if($db->connect_error) die('Database access failed:' .$db->error);
                    $query="select c.case_title,c.cs_date,c.cc_date,c.judgement,cl.lawyer1,cl.lawyer2,cl.lawyer3,cl.lawyer4,c.court_abv,c.place_id
                             from cases c,clawyer cl
                            where c.case_id='$case_id'
                            and cl.case_id='$case_id'";
	                $result=$db->query($query);
	                if(!$result) die("Database access failed: " .$db->error);
                    $rows=$result->num_rows;
                    echo "
                            <form method='POST' action='upcase1.php'>
                                <div class='form-group'>
                                    <label>Case Title</label>";
                    for ($j = 0;$j < $rows ; ++$j)
	                {
		                $result->data_seek($j);
		                $row=$result->fetch_array(MYSQLI_NUM);
		                for($k = 0 ;$k < 10 ; ++$k)
		                {
                            if($k==0){
                                echo "<input type='text' class='form-control' placeholder='$row[$k]' name='case_title'>
                                     </div>
                                    <div class='form-row'>
                                        <div class='col form-group'>
                                            <label>Case Start Date </label>";
                            }else if($k==1){
                                echo "<input type='date' class='form-control' placeholder='$row[$k]' name='start_date'>
                                      </div> <!-- form-group end.// -->
                                      <div class='col form-group'>
                                         <label>Case End Date</label>";
                            }else if($k==2){
                               echo " <input type='date' class='form-control' placeholder='$row[$k] ' name='end_date'>
                                      </div> <!-- form-group end.// -->
                                      </div> <!-- form-row end.// -->
                                        <div class='form-row'>
                                            <div class='form-group col'>
                                            <label>Judgement</label>";
                            }else if($k==3){
                                  echo "<select name='judgement' class='form-control col-lg-12' >";
                                    if($row[$k]=="PENDING"){
                                      echo "<option value='PENDING' selected>Pending</option>
                                            <option value='GIVEN'>Given</option>";
                                    }
                                    else{
                                        echo "<option value='PENDING' >Pending</option>
                                            <option value='GIVEN' selected>Given</option>";
                                    }
                                  echo "</select>
                                        </div>
                                    </div>
                                    <p class='text-lg-center mt-lg-5 text-primary text-uppercase bold'>Lawyers handling the case</p>
                                    <div class='form-row'>
                                    <div class='form-group col'>
                                    <label>Lawyer 1</label>";
                                }else if($k==4){
                                   echo "<input type='text' class='form-control' placeholder='$row[$k]' name='lawyer1'>
                                         </div>
                                        <div class='form-group col'>
                                            <label>Lawyer 2</label>";
                                }else if($k==5){
                                    echo "<input type='text' class='form-control' placeholder='$row[$k]' name='lawyer2'>
                                            </div>
                                        </div>
                                        <div class='form-row'>
                                        <div class='form-group col'>
                                        <label>Lawyer 3</label>";
                                }else if($k==6){
                                    echo "<input type='text' class='form-control' placeholder='$row[$k]' name='lawyer3'>
                                        </div>
                                        <div class='form-group col'>
                                        <label>Lawyer 4</label>";
                                }else if($k==7){
                                        echo "<input type='text' class='form-control' placeholder='$row[$k]' name='lawyer4'>
                                        </div>
                                        </div>
                                        <p class='text-lg-center mt-lg-5 text-primary text-uppercase bold'>Court Details</p>
                                        <div class='col form-group'>
                                        <label>Court</label>
                                        <div class='drop-down'>";
                                }else if($k==8){
                                        echo "<select name='court_abv' class='form-control col-lg-12'>";
                                        if($row[$k]=='dc'){
                                            echo "<option value='dc' selected>District Court</option>
                                                    <option value='hc'>High Court</option>
                                                    <option value='sc'>Supreme Court</option>";
                                        }else if($row[$k]=='hc'){
                                            echo "<option value='dc' >District Court</option>
                                                    <option value='hc' selected>High Court</option>
                                                    <option value='sc'>Supreme Court</option>";
                                        }else if($row[$k]=='sc'){
                                            echo "<option value='dc' >District Court</option>
                                                    <option value='hc' >High Court</option>
                                                    <option value='sc' selected>Supreme Court</option>";
                                        }
                                        echo "</select>
                                                </div>
                                             </div>
                                            <div class='form-group col'>
                                            <label>Place</label>";
                                    }else if($k==9){
                                        echo "<select name='place_id' class='form-control col-lg-12'>";
                                        if($row[$k]==1){
                                            echo "<option value='1' selected>Bangalore</option>
                                                    <option value='2'>Chennai</option>
                                                    <option value='3'>Delhi</option>
                                                    <option value='4'>Kolkatta</option>";
                                        }else if($row[$k]==2){
                                            echo "<option value='1' >Bangalore</option>
                                                    <option value='2' selected>Chennai</option>
                                                    <option value='3'>Delhi</option>
                                                    <option value='4'>Kolkatta</option>";
                                        }else if($row[$k]==3){
                                            echo "<option value='1' >Bangalore</option>
                                                    <option value='2'>Chennai</option>
                                                    <option value='3' selected>Delhi</option>
                                                    <option value='4'>Kolkatta</option>";
                                        }else if($row[$k]==4){
                                            echo "<option value='1' >Bangalore</option>
                                                    <option value='2'>Chennai</option>
                                                    <option value='3'>Delhi</option>
                                                    <option value='4' selected>Kolkata</option>";
                                        }
                                        echo "</select>";
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