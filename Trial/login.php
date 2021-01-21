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
		setcookie('username',$_POST['username']);
			echo" <script type=
			'text/javascript'>
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>";
        header("Location: dashboard.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
       	$message = 'wrong username or password';

echo "<SCRIPT>
alert('$message');
window.location='index.html';
</SCRIPT>";    
	
		}
	
	}
?>
		
		