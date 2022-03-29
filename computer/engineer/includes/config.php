<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$db="computer";
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);
?>

<?php

function open_conn()
{
	
 $servername = "localhost";
$username = "root";
$password = "";  
$dbname = "computer";

$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error($conn));
}
	mysqli_autocommit($conn,FALSE);
	return($conn);
}
function close_conn($conn)
{
	
mysqli_commit($conn);
mysqli_close($conn);
}
