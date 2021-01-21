<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="font.css" rel="stylesheet" type="text/css">
  <link href="font1.css" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>
    .map-container {
      overflow: hidden;
      padding-bottom: 56.25%;
      position: relative;
      height: 0;
    }

    .map-container iframe {
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      position: absolute;
    }
  </style>
</head>

<body style="background-color:grey">

  <!--Main Navigation-->
  <header>

    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: black;height:85px;">
      <div class="container" style="background-color: black;">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Ministry Of Law and Justice(India)<image src="img/e4.jpg" class="w3-image" width="50" height="75"></image></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php" onmouseover="{this.style.backgroundColor='#343a40';this.style.color='white'}" onmouseout="this.style.backgroundColor='#000000'" onmouseout="this.style.backgroundColor='#fff'">LogOut</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="waves-effect">
        <img src="img/logo.png" height="125px" width="225px" style="margin-top:10px;">
      </a>
      <br><br><br>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item waves-effect" style="color: black;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
          <i class="fa fa-bars"></i>&nbsp; &nbsp; <b>Dashboard</b></a>
        <a href="#lawyers" class="list-group-item list-group-item-action waves-effect" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
          <i class="fas fa-user mr-3"></i><b>Lawyers</b></a>
        <a href="#cases" class="list-group-item list-group-item-action waves-effect" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
          <i class="fas fa-table mr-3"></i><b>Cases</b></a>
        <a href="mailto:developer@gmail.com" class="list-group-item list-group-item-action waves-effect" onmouseover="this.style.color='blue'" onmouseout="this.style.color='black'">
          <i class="fas fa-money-bill-alt mr-3"></i><b>Contact Developers</b></a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn brown lighten-4">
        <?php
        include("config.php");
        if (isset($_COOKIE['username']))
          echo "<p style='font-size:30px;font-family:Georgia;'><b> &nbsp; &nbsp;Welcome " . $_COOKIE['username'] . " ....!</b></p>";
        $username = $_COOKIE['username'];
        ?>
      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header text-center ">
              <p style='font-size:20px;font-family:Georgia'><b>Admin Details</b></p>
            </div>

            <!--Card content-->
            <div class="card-body green lighten-4">

              <?php
              echo "<p style='font-size:30px;font-family:Georgia'><b>Your Details are :</b></p>";
              $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
              if ($db->connect_error) die("Database access failed:" . $db->error);
              $query = "select username, password from admin where username='$username'";
              $result = $db->query($query);
              if (!$result) die("Database access failed: " . $db->error);
              $rows = $result->num_rows;
              for ($j = 0; $j < $rows; ++$j) {
                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_NUM);
                echo "<center>";
                echo "<table style='margin-top:5%; font-size:30px; font-family:Georgia'>";
                for ($k = 0; $k < 2; ++$k) {
                  if ($k == 0) {
                    echo "<tr>";
                    echo "<th style='font-size:30px;' ><b>Username  </b></th>";
                    echo "<th style='font-size:30px;'>:<b>  &nbsp; $row[$k]</b></th>";
                    echo "</tr>";
                  } else if ($k == 1) {
                    echo "<tr>";
                    echo "<th style='font-size:30px;' ><b>Password  </b></th>";
                    echo "<th style='font-size:30px;'>:<b>  &nbsp; $row[$k]</b></th>";
                    echo "</tr>";
                  }
                }
                echo "</table>";
                echo "</center>";
              }

              ?>

            </div>

          </div>
          <!--/.Card-->


        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header text-center">
              <p style='font-size:20px;font-family:Georgia'><b>Notifications</b></p>
            </div>

            <!--Card content-->
            <div class="card-body yellow lighten-4">
              <?php
              $q = "select * from review";
              $result = $db->query($q);
              $c = mysqli_num_rows($result);
              if ($c == 0) {
                echo "<p style='font-size:20px;font-family:Georgia'>No Updation Requests</p>";
              } else {
                echo "<p style='font-size:20px;font-family:Georgia;color:blue;'><ul style='list-style-img:url('img/star.png')'><li><marquee style='color:blue'>Lawyers Updation Requests pending to be processed</li><ul></marquee></p>";
              }
              echo "<p style='color:white'>..</p>";
              echo "<p style='color:white'>..</p>";
              echo "<p style='color:white'>..</p>";
              ?>


            </div>

          </div>
          <!--/.Card-->



        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
      <div id="lawyers">
        <div class="card mb-4 wow fadeIn text-center brown lighten-4">
          <p style='font-size:25px;font-family:Georgia;margin:2%;'><b>Lawyers Info</b></p>
        </div>
        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <div id="lawyers">
              <!--Card-->
              <div class="card">
                <div class="card-header text-center">
                  <p style='font-size:20px;font-family:Georgia'><b>Enrolled Candidates</b></p>
                </div>

                <!--Card content-->
                <div class="card-body">

                  <!-- Table  -->
                  <table class="table table-hover red lighten-4" style="align-content:center">
                    <tr>
                      <th>1</th>
                      <th>Total Number of Lawyers in the Association</th>
                      <th>
                        <?php
                        $q = "select * from lawyers";
                        $result = $db->query($q);
                        echo mysqli_num_rows($result);
                        $q = "select * from designation
                            where designation='advocate'";
                        $result = $db->query($q);
                        $advocate = mysqli_num_rows($result);

                        ?>
                      </th>
                      </thead>
                    </tr>
                    <tbody>
                      <tr>
                        <th scope="row">2</th>
                        <th>Number of Criminal lawyers in the Association</th>
                        <th>
                          <?php
                          $q = "select * from lawyers
                            where pctype='criminal'";
                          $result = $db->query($q);
                          echo mysqli_num_rows($result);
                          ?>
                        </th>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <th>Number of Civil lawyers in the Association</th>
                        <th>
                          <?php
                          $q = "select * from lawyers
                            where pctype='civil'";
                          $result = $db->query($q);
                          echo mysqli_num_rows($result);
                          ?>
                        </th>
                      </tr>
                    </tbody>

                  </table>
                  <!-- Table  -->

                </div>
                <!--/.Card-->
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card">
              <div class="card-header text-center">
                <p style='font-size:20px;font-family:Georgia'><b>Count based on Designations</b></p>
              </div>

              <!--Card content-->
              <div class="card-body">

                <!-- Table  -->
                <table class="table table-hover blue lighten-4">
                  <!-- Table head -->
                  <tr>
                    <th>1</th>
                    <th>Number of Legal Advisors</th>
                    <th>
                      <?php
                      $q = "select * from designation
                            where designation='legalAdvisor'";
                      $result = $db->query($q);
                      $legalAdvisor = mysqli_num_rows($result);
                      echo mysqli_num_rows($result);
                      ?>
                    </th>
                  </tr>
                  <!-- Table head -->

                  <!-- Table body -->
                  <tbody>
                    <tr>
                      <th scope="row">2</th>
                      <th>Number of Judges</th>
                      <th>
                        <?php
                        $q = "select * from designation
                            where designation='judge'";
                        $result = $db->query($q);
                        $judge = mysqli_num_rows($result);
                        echo mysqli_num_rows($result);
                        ?>
                      </th>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <th>Number of Public Prosecutors</th>
                      <th><?php
                          $q = "select * from designation
                            where designation='publicProsecutor'";
                          $result = $db->query($q);
                          $publicProsecutor = mysqli_num_rows($result);
                          echo mysqli_num_rows($result);
                          ?></th>
                    </tr>

                  </tbody>
                  <!-- Table body -->
                </table>
                <!-- Table  -->

              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-lg-6 col-md-6 mb-4">

            <!--Card-->
            <div class="card">

              <!-- Card header -->
              <div class="card-header text-center">
                <p style='font-size:20px;font-family:Georgia'><b>Judges based on Court</b></p>
              </div>

              <!--Card content-->
              <div class="card-body">
                <table class="table table-hover green lighten-4">
                  <!-- Table head -->
                  <tr>
                    <th>1</th>
                    <th>Number of Judges of District Court</th>
                    <th>
                      <?php
                      $q = "select * from designation
                            where designation='judge'
                            and court_abv='dc'";
                      $result = $db->query($q);
                      echo mysqli_num_rows($result);
                      ?>
                    </th>
                  </tr>
                  <!-- Table head -->

                  <!-- Table body -->
                  <tbody>
                    <tr>
                      <th>2</th>
                      <th>Number of Judges of High Court</th>
                      <th>
                        <?php
                        $q = "select * from designation
                            where designation='judge'
                            and court_abv='hc'";
                        $result = $db->query($q);
                        echo mysqli_num_rows($result);
                        ?>
                      </th>
                    </tr>
                    <tr>
                      <th>3</th>
                      <th>Number of Judges of Supreme Court</th>
                      <th>
                        <?php
                        $q = "select * from designation
                            where designation='judge'
                            and court_abv='sc'";
                        $result = $db->query($q);
                        echo mysqli_num_rows($result);
                        ?>
                      </th>
                    </tr>

                  </tbody>
                  <!-- Table body -->
                </table>
                <!-- Table  -->


              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-6 col-md-6 mb-4">



            <!--Card-->
            <div class="card mb-4">

              <!-- Card header -->
              <div class="card-header text-center">
                <p style='font-size:20px;font-family:Georgia'><b>Actions</b></p>
              </div>

              <!--Card content-->
              <div class="card-body">

                <p class="yellow lighten-4"><button type="submit" class="btn btn-xl rounded" id="sendMessageButton" style="background-color: black;color: white;" onclick="location.href='register.html'">Create</button> &nbsp; &nbsp; &nbsp; &nbsp; Create Account for a new lawyer<br>
                  <button type="submit" class="btn btn-xl rounded" id="sendMessageButton" style="background-color: black;color: white;" onclick="location.href='areview.php'">Update</button> &nbsp; &nbsp; &nbsp; &nbsp; Review Updation Requests<br>
                  <button type="submit" class="btn btn-xl rounded" id="sendMessageButton" style="background-color: black;color: white;" onclick="location.href='lawyer.php'">Review</button> &nbsp; &nbsp; &nbsp; &nbsp; View Info of all lawyers</p>

              </div>


            </div>
            <!--/.Card-->

          </div>
        </div>
      </div>
      <!--CASES-->

      <!--Grid row-->
      <div id="cases">
        <div class="card mb-4 wow fadeIn text-center brown lighten-4">
          <p style='font-size:25px;font-family:Georgia;margin:2%;'><b>Cases Info</b></p>
        </div>
        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <div id="lawyers">
              <!--Card-->
              <div class="card">
                <div class="card-header text-center">
                  <p style='font-size:20px;font-family:Georgia'><b>Enrolled Cases</b></p>
                </div>

                <!--Card content-->
                <div class="card-body">

                  <!-- Table  -->
                  <table class="table table-hover red lighten-4" style="align-content:center">
                    <tr>
                      <th>1</th>
                      <th>Total Number of Cases in the Association</th>
                      <th>
                        <?php
                        $q = "select * from cases";
                        $result = $db->query($q);
                        echo mysqli_num_rows($result);
                        ?>
                      </th>
                      </thead>
                    </tr>
                    <tbody>
                      <tr>
                        <th scope="row">2</th>
                        <th>Number of cases which are in pending state:</th>
                        <th>
                          <?php
                          $q = "select * from cases
                            where judgement='PENDING'";
                          $result = $db->query($q);
                          echo mysqli_num_rows($result);
                          ?>
                        </th>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <th>Number of cases whose judgement is given</th>
                        <th>
                          <?php
                          $q = "select * from cases
                            where judgement='given'";
                          $result = $db->query($q);
                          echo mysqli_num_rows($result);
                          ?>
                        </th>
                      </tr>
                    </tbody>

                  </table>
                  <!-- Table  -->

                </div>
                <!--/.Card-->
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card">
              <!-- Card header -->
              <div class="card-header text-center">
                <p style='font-size:20px;font-family:Georgia'><b>Actions</b></p>
              </div>

              <!--Card content-->
              <div class="card-body">

                <p class="blue lighten-4"><button type="submit" class="btn btn-xl rounded" id="sendMessageButton" style="background-color: black;color: white;" onclick="location.href='registercase.html'">Create</button> &nbsp; &nbsp; &nbsp; &nbsp; Register a case<br>
                  <button type="submit" class="btn btn-xl rounded" id="sendMessageButton" style="background-color: black;color: white;" onclick="location.href='case.php'">Review</button> &nbsp; &nbsp; &nbsp; &nbsp; View and update Info of all Cases</p>

              </div>
            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
      </div>



  </main>
  <!--Main layout-->



  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

  <!-- Charts -->

  <!--Google Maps-->
  <script src="https://maps.google.com/maps/api/js"></script>
  <script>
    // Regular map
    function regular_map() {
      var var_location = new google.maps.LatLng(40.725118, -73.997699);

      var var_mapoptions = {
        center: var_location,
        zoom: 14
      };

      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "New York"
      });
    }
  </script>
</body>

</html>