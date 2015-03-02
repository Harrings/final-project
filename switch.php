<?php
ob_start(); //from stack overflow
include 'pass.php';
error_reporting(E_ALL);
ini_set('display_errors','On');
if (!isset($_SESSION["username"]))
{
    header("Location: login.php", true);
}
$name=$_SESSION["username"];
if (!$stmt = $mysqli->query("SELECT teacher FROM USERDB WHERE username='$name'")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
while($row = mysqli_fetch_array($stmt))	
	{
		if(row["teacher"]==1)
		{
			header("Location: teacher.php", true);
		}
		else
		{
			header("Location: student.php", true);
		}
	}
?>