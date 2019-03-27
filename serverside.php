<?php
//echo phpinfo();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jokes";
// if (isset($_GET['sample'])) {
// 	sampleJoke();
// } else {
// 	echo "Fail Fajl";
// }
// function sampleJoke()
// {
// 	echo "Hello i skogen";
// }
echo "<table style='border: solid 1px black;'>";
//echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
// PHP JOT
try {
	$myPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$sql = "CREATE DATABASE fiskmacka";
	//$myPDO->exec($sql);
	//echo "Det funkar hurra";

	// sql to create table
	//	$sql = "CREATE TABLE MyGuests (
	//	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	//	firstname VARCHAR(30) NOT NULL,
	//	lastname VARCHAR(30) NOT NULL,
	//	email VARCHAR(50),
	//	reg_date TIMESTAMP
	//)";


	// use exec() because no results are returned
	//$myPDO->exec($sql);

	// Get the number of database entries.
	$entries = $myPDO->prepare("SELECT COUNT(*) FROM jokes");
	$entries->execute();
	// Sample one of these numbers.
	$numEntries = random_int(1, (int) $entries->fetchColumn());

	// Sample a joke from the database.
	$sql = $myPDO->prepare("SELECT id, joke FROM jokes WHERE id=$numEntries");
	$sql->execute();

	// Skriv ut skämtet
	$result = $sql->setFetchMode(PDO::FETCH_ASSOC);
	foreach (new TableRows(new RecursiveArrayIterator($sql->fetchAll())) as $k => $v) {
		echo $v;
	}

	print_r($result);


	// Utnyttja svaret
	$myPDO = NULL;
	$entries = NULL;
	$sql = NULL;
	
	//echo "Table MyGuests created successfully";
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}
 