<html>
<head><title>GameBattle System </title></head>
<body>
<h2>Update Player</h2>
<form action="updateplayer.php" method=post>
Player ID: <input type=text name="id" size=10><br><br>
Player Score: <input type=text name="score" size=10><br><br>
Player Level: <input type=text name="level" size=10> 
<input type=submit name="submit" value="Update"></form> 

<?php

if(isset($_COOKIE["username"])){
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$servername = "17carson.cs.uleth.ca";
$dbname = "zhas3660";

echo "<form action=\"divisionstatus.php\" method=post>";

	$conn = mysql_connect("17carson.cs.uleth.ca",$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 
	$sql = "select * from DIVISION";
	$result = mysql_query($sql,$conn);
        if(mysql_num_rows($result) != 0)
	{
	   echo "Division Level: <select name=\"level\">";
	      
	        while($val = mysql_fetch_row($result))
		{
			echo "<option value=$val[0]>$val[0]</option>"; 

		}
		echo "</select>"; 
	
		echo "<input type=submit name=\"submit\" value=\"Check\">"; 
	}
	else
	{
		echo "<p> No divisions Currently in database to show</p>"; 
		$today = date("F j, Y, g:i a");

	}
	echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 

}


if (isset($_COOKIE["username"])) { 

echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>[Name]</th><th>[ID]</th><th>[Score]</th><th>[Level]</th></tr>";

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
     $stmt = $conn->prepare("SELECT name,id,score,level FROM PLAYER");
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
