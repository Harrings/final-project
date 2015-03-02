<?php
ob_start(); //from stack overflow
include 'pass.php';
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();
if (!isset($_SESSION["username"]))
{
    header("Location: login.php", true);
}
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "harrings-db", $pass, "harrings-db");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Courses</title>
</head>
<body>
<h2>Add Class</h2>
<form action="addclass.php" method="post">
		<p>Course Name: <input type="text" name="cname" /></p>
		<p>Course Units: <input type="number" name="cname" min="1" max="10" /></p>	
		<p>Grade as number: <input type="number" name="cgrade" min="1" max="10" /></p>	
		<br><br>
		<input type="submit" value="Submit">
</form>
<?php
if (!$stmt = $mysqli->query("SELECT uid, cname, cunits, cgrade, shared FROM CINFO")) {
		echo "Query Failed!: (" . $mysqli->errno . ") ". $mysqli->error;
	}
?>
<table border="1">
<thead> 
<tr>
    <th>Course Name</th> 
    <th>Course Units</th> 
    <th>Course Grade</th> 
    <th>Shared</th> 
    <th>Change Status</th> 
    <th>Delete</th>
</tr> 
</thead>
<tbody>
<?php
$totalunits;
$totalgp;
while($row = mysqli_fetch_array($stmt))	
{
	echo "<tr>" ;
	echo "<td>" . $row['cname'] . "</td>";
	echo "<td>" . $row['cunits'] . "</td>";
	echo "<td>" . $row['cgrade'] . "</td>";
	echo "<td>";
	if (!$row['shared'])
	{
		echo "Not Shared </td>";
		echo "<td><form method=\"POST\" action=\"share.php\">";
		echo "<input type=\"hidden\" name=\"uid\" value=\"".$row['uid']."\">";
		echo "<input type=\"submit\" value=\"checkout\">";
		echo "</form> </td>";
	}
	else
	{
		echo "Shared </td>";
		echo "<td><form method=\"POST\" action=\"unshare.php\">";
		echo "<input type=\"hidden\" name=\"uid\" value=\"".$row['uid']."\">";
		echo "<input type=\"submit\" value=\"returned\">";
		echo "</form> </td>";
	}
	echo "<td><form method=\"POST\" action=\"delete.php\">";
	echo "<input type=\"hidden\" name=\"uid\" value=\"".$row['uid']."\">";
	echo "<input type=\"submit\" value=\"delete\">";
	echo "</form> </td>";
	echo "</tr>";
}
