<html>
<head><title>Game Battle System</title></head>
<body>
<h2>Match Status</h2>

<?php

if (isset($_COOKIE["username"])) { 
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
$servername = "17carson.cs.uleth.ca";
$dbname = "zhas3660";
$point = $_POST[point];
$title= $_POST[title];

echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>[point]</th><th>[title]</th></tr>";


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
     $stmt = $conn->prepare("SELECT point, title FROM MATCHS where title='$title'");
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

echo "<a href=\"update_matchs.php\">Return</a> to Previous Page."; 
   } else {
      
   echo "<h3>You are not logged in!</h3><p> <a href=\"index.php\">Login First</a></p>"; 
      }
?>
</body>
</html>
