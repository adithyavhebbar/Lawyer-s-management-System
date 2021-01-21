<?php
if(!empty($_POST["logout"])) {
	$_SESSION["regno"] = "";
	session_destroy();
}

// Jump to login page
header('Location: index.html');

?>