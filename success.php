<?php 
	session_start();
	require_once("connection.php"); 
	if (!empty($_SESSION['message'])) {
		$_SESSION['message'] = ""; 
	}
?>
<!DOCTYPE html>	
<html>
	<head>
		<title>List</title>
		<link rel="stylesheet" type="text/css" href="email.css">
	</head>
	<body>
		<h4 class="message">
<?php 		
		if (isset($_SESSION['email'])) {
			echo $_SESSION['success'];
		}		 
?>		
		</h4>

		<div>
			<h4 class="title">Email Entered</h4>
		
<?php 
			$query =  "SELECT * FROM email_validation ";
	    	$result = mysqli_query($connection, $query);

	    	if (mysqli_num_rows($result) > 0) {
	    	// output data of each row
	    		while($row = mysqli_fetch_assoc($result)) {
	        		echo "<form action='delete.php' method='post' class='delete'>
	        		<span class='inline-b'>" . $row["email"] . 
	        		"</span><span class='inline-b'>" . $row["created_at"] . 
	        		"</span><span class='inline-b'> 
		        		<input type='hidden' name= 'id' value='".$row["id"]."'>
		        		<input type='submit' value='Delete' class='delete'></span>
	        		</form>";
	       		}
	    } 
?>

		</div>
		<div>
			<a href="index.php">BACK</a>
		</div>
		
	</body>
</html>