<?php
if(!empty($_POST["logout"])) {
	$_SESSION["email_id"] = "";
	session_destroy();
}

// Jump to login page
header('Location: index.html');

?>