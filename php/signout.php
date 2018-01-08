<?php
	//signout.php
	//delete the session created during logged in_array
	session_start();
	if(isset($_SESSION['buyername'])){
		session_destroy();
		//unset($_session['busername']);//delete all session variable
		header("location:index.php");
	}else  if(isset($_SESSION['vusername'])){
		session_destroy();
		//unset($_session['vusername']);//delete all session variable
		header("location:index.php");
	}
?>