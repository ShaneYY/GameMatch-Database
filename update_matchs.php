<html>
<head><title>GameBattle System </title></head>
<body>
<h2>Update Matchs</h2>
<form action="updateplayer.php" method=post>
Matchs: <input type=text name="matchs" size=10><br><br>
point: <input type=text name="point" size=10><br><br>
<input type=submit name="submit" value="Update"></form> 

<?php

if(isset($_COOKIE["username"])){
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$servername = "17carson.cs.uleth.ca";
$dbname = "zhas3660";

echo "<form action=\"matchstatus.php\" method=post>";

	$conn = mysql_connect("17carson.cs.uleth.ca",$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 
	$sql = "select * from MATCHS";
	$result = mysql_query($sql,$conn);
        if(mysql_num_rows($result) != 0)
	{
	   echo "MATCH TITLE: <select name=\"title\">";
	      
	        while($val = mysql_fetch_row($result))
		{
			echo "<option value=$val[1]>$val[1]</option>"; 

		}
		echo "</select>"; 
	
		echo "<input type=submit name=\"submit\" value=\"Check\">"; 
	}
	else
	{
		echo "<p> No matchs Currently in database to show</p>"; 
		$today = date("F j, Y, g:i a");

	}
	echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}


if (isset($_COOKIE["username"])) { 

echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>[Point]</th><th>[Title]</th></tr>";

class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
         parent::__construct($it, self::LEAVES_ONLY);
     }

     function current() {
         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
     }

     function beginChildren() {
         echo "<tr>";
     }

     function endChildren() {
         echo "</tr>" . "\n";
     }
}

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT point,title  FROM MATCHS");
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
         echo $v;
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();

}
$conn = null;
echo "</table>";


echo "<a href=\"main.php\">Return</a> to Home Page.";

} else {
   echo "<h3>not logged in</h3><p> <a href=\"index.php\">Login First</a></p>"; 
}
?>
 
</body>
</html>
