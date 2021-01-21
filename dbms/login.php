<?php
	include("config.php");
	session_start();
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		$sql="SELECT * FROM admin where username='$myusername' and password='$mypassword' LIMIT 1";
		$result = mysqli_query($db,$sql);
			if(mysqli_num_rows($result) == 1){ 
			$_SESSION['username'] = $_POST['username'];
        $row = mysqli_fetch_array($result); 
        session_start(); 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['logged'] = TRUE;
			echo" <script type=
			'text/javascript'>
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>";
        header("Location: adminwelcome.html"); // Modify to go to the page you would like 
        exit; 
    }else{ 
       	$message = 'Username or Password is Wrong';

echo "<SCRIPT>
alert('$message');
window.location='index.html';
</SCRIPT>";    
	
		}
	
	}
?>
		
		