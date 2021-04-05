<?php 

session_start();
require_once("connection.php"); 


$id = $_POST['id'];

$delete =  "DELETE FROM email_validation WHERE id = '$id'";
$result = mysqli_query($connection, $delete);

$_SESSION['success'] = "Successfully deleted.";

header("location: success.php");

?>