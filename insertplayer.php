<?php

if (isset($_COOKIE["username"])) { 
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$servername = "17carson.cs.uleth.ca";
$dbname = "zhas3660";
$name = $_POST[name];
$id= $_POST[id];
$conn = mysql_connect("17carson.cs.uleth.ca",$username,$password) or 
die(mysql_error());
mysql_select_db($username,$conn) or die(mysql_error());

$sql = "insert into PLAYER(name,id) values ('$name','$id')"; 

if(mysql_query($sql,$conn)) 
{ 
	echo "<h3> Player has been added</h3>";
	echo "<p> Thanks for adding </p>"; 

} else {
   $err = mysql_errno(); 
   if ($err == 1062)
   {
      echo "<p> Player $_POST[name] already in place </p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
   
}

echo "<a href=\"insert_player.php\">Return</a> to Previous Page.";

} else {
   echo "<h3>not logged in</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>
