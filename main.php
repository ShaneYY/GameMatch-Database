
<!DOCTYPE html>
<html>
<div id="content" align="center">
    <body>
    <h1>Game Battle System</h1>
    </div>    
    <?php
    function gamebattle(){


 }

if (isset($_COOKIE["username"])) { 
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];

$conn = mysql_connect("17carson.cs.uleth.ca",$username,$password) or 
die(mysql_error());
mysql_select_db($username,$conn) or die(mysql_error());




echo "Date:" . date ("Y/m/d") . "<br>";


echo "<font color=#ff0000> click this link to</font> ";
echo "<a href=\"insert_player.php\">insert a player</a></p>";

echo " <font color=##00FFFF> click this link to ";
echo " <a href =\"select_player.php\"> select a player</a></p>";

echo " <font color=##00FFFF> click this link to ";
echo " <a href =\"update_player.php\"> update a player</a></p>";

echo "<font color=#ff0000> click this link to</font> ";
echo " <a href =\"delete_player.php\"> delete a player</a></p>";

//<input type="button" onClick="parent.location='select_player.php'" VALUE="what">

   }
?>

</form>
</div>
</html>
