<?php 
	session_start();
	require_once("connection.php"); 		
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Email validation</title>
		<link rel="stylesheet" type="text/css" href="email.css">
	</head>
	<body>
		<form action="process.php" method="post" class="index">
<?php 		
			if (isset($_SESSION['message'])) {
				echo  "<span class='block'><h3>". $_SESSION['message'] . "</h3></span>";
			}		 
?>			
			<input type="text" name="email" placeholder="Submit your email here!" class="text">
			<input type="submit" class="submit">
		</form>
	</body>
</html>