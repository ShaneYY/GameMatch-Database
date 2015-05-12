<html lang="en">
<head>
<meta charset="utf-8">
<title>GameBattle System</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#start" ).datepicker(
{
    onSelect: function()
    { 
        var dateObject = $(this).datepicker("start"); 
    }
});
$( "#end" ).datepicker(
{
    onSelect: function()
    { 
        var dateObject = $(this).datepicker("end"); 
    }
});
});
</script>
</head>
<body>


<h2>Add a new division!</h2>
<form action="insertdivision.php" method=post>

Division Level: <input type=text name="level" size=10 /><br><br>

<lable for="start">Start Date:</label> 
<input type=text id="start" name="start" size=10 /><br><br>

<lable for="start">End Date:</label> 
<input type=text id="end" name="end" size=10 /><br><br>

<input type=submit name="submit" value="Insert">
</form> 

<?php

if (isset($_COOKIE["username"])) { 
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$servername = "17carson.cs.uleth.ca";
$dbname = "zhas3660";
echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>[Name]</th><th>[ID]</th></tr>";

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
     $stmt = $conn->prepare("SELECT level, start, end FROM DIVISION");
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
