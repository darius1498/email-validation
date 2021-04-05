<?php 

session_start();
require_once("connection.php"); 

$_SESSION['email'] = $_POST['email'];


	if (empty($_SESSION['email'])) 
	{
		$_SESSION['message'] =  "Please put your email!";
		header("location: index.php");
	}
	else if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) 
	{
		$_SESSION['message'] = 'Please use a proper email!';
		header("location: index.php");
	}
	else
	{	
		$email = $_POST['email'];
		$date = date('Y-m-d g:i A');

		$insert = "INSERT INTO email_validation (email, created_at) 
				VALUES ('$email', '$date')";

		if(mysqli_query($connection, $insert))
		{
			unset($_SESSION['message']);
			$_SESSION['success'] =  "The email address you entered " . $_POST['email'] . " is a VALID email address! Thank you!";
			
		   	header("location: success.php");
		} 
	}

?>