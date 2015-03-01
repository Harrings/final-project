<!DOCTYPE html>
<html lang="en">
<head>
  <title>Final Project LOGIN</title>
</head>
<body>
<?php
session_start();
ob_start(); //from stack overflow
error_reporting(E_ALL);
ini_set('display_errors','On');
if (isset($_SESSION["username"]))
{
	echo "You are already logged in as $_SESSION[username] <br>";
	echo "if you would like to view your reports click <a href=\"switch.php\">here</a>";
	echo "<br> Click <a href=\"logout.php\">here</a> to logout";
}
else
{
?>
<p>AJAX LOGIN</p>

	<h2>Create Student Account</h2>
	<form action="create.php" method="post">
		<p>User Name: <input type="text" name="username" /></p>
		<p>Password: <input type="password" name="password" /></p>
		<p>Total units needeed to graduate: <input type="number" name="units" value="120" min="1" max="120" /></p>	
		<p>Secret Number: <input type="number" name="secretnumber" min="1" max="1000" /></p>	
		<input type="hidden" name="teacher" value="0"/>
		<br><br>
		<input type="submit" value="Submit">
</form>
<br>
<br>
	<h2>Create Teacher Account</h2>
	<form action="create.php" method="post">
		<p>User Name: <input type="text" name="username" /></p>
		<p>Password: <input type="password" name="password" /></p>	
		<p>Secret Number: <input type="number" name="secretnumber" min="1" max="1000" /></p>	
		<input type="hidden" name="teacher" value="1"/>
		<input type="hidden" name="units" value="120"/>
		<br><br>
		<input type="submit" value="Submit">
</form>

	
<?php
}
	

?>	
</body>
</html>
