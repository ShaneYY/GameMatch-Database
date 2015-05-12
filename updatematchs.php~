<?php

if (isset($_COOKIE["username"])) { 
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$servername = "17carson.cs.uleth.ca";
$dbname = "zhas3660";
$point = $_POST[point];
$title= $_POST[title];

$conn = mysql_connect("17carson.cs.uleth.ca",$username,$password) or 
die(mysql_error());
mysql_select_db($username,$conn) or die(mysql_error());

$sql = "UPDATE MATCHS SET title =$title where point =$point"; 

if(mysql_query($sql,$conn)) 
{ 
	echo "<h3> Matchs has updated</h3>";
	echo "<p> Thanks for updating </p>"; 

} else {
   $err = mysql_errno(); 
   echo "<p>MySQL error code $err </p>"; 

}

echo "<a href=\"update_matchs.php\">Return</a> to Previous Page.";

} else {
   echo "<h3>not logged in</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>
