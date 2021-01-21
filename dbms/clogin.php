<?php
	include("config.php");
	session_start();
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername = mysqli_real_escape_string($db,$_POST['email_id']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		$sql="SELECT * FROM customer where email_id='$myusername' and password='$mypassword' LIMIT 1";
		$result = mysqli_query($db,$sql);
			if(mysqli_num_rows($result) == 1){ 
			$_SESSION['email_id'] = $_POST['email_id'];
        $row = mysqli_fetch_array($result); 
        session_start(); 
        $_SESSION['email_id'] = $row['email_id']; 
        $_SESSION['logged'] = TRUE;
			echo" <script type=
			'text/javascript'>
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>";
        header("Location: guest.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
       	$message = 'Login Failed';

echo "<SCRIPT>
alert('$message');
window.location='index.html';
</SCRIPT>";    
	
		}
	
	}
?>
		
		