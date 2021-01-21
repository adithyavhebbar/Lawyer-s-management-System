<?php
	include("config.php");
	session_start();
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername = mysqli_real_escape_string($db,$_POST['regno']);
		$mypassword = mysqli_real_escape_string($db,$_POST['psw']);
		$sql="SELECT * FROM login where regno='$myusername' and psw='$mypassword' LIMIT 1";
		$result = mysqli_query($db,$sql);
			if(mysqli_num_rows($result) == 1){ 
			$_SESSION['regno'] = $_POST['regno'];
        $row = mysqli_fetch_array($result); 
        session_start(); 
        $_SESSION['regno'] = $row['regno']; 
        $_SESSION['logged'] = TRUE;
			echo" <script type=
			'text/javascript'>
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>";
        header("Location: lawyerwelcome.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
       	$message = 'This is a message.';

echo "<SCRIPT>
alert('$message');
window.location='index.html';
</SCRIPT>";    
	
		}
	
	}
?>
		
		