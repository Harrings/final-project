<?php
ob_start(); //from stack overflow
include 'pass.php';
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();
if (!isset($_SESSION["username"]))
{
    header("Location: index.php", true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
</head>
<body>
<h2>Edit number of units needed</h2>
<form action="editunits.php" method="post">
		<p>Total units needeed to graduate: <input type="number" name="units" value="<?php $_SESSION['units']?>" min="1" max="120" /></p>
	<input type="submit" value="Submit">
</form>	
<br>
<br>
<h2>Delete Account</h2>
<form action="deleteaccount.php" method="post">
	<input type="submit" value="Submit">	