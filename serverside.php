<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jokes";
if (isset($_GET['sample'])) {
	sampleJoke();
} else {
	echo "Fail Fajl";
}
function sampleJoke()
{
	echo "Hello i skogen";
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
$sql = $myPDO->prepare("SELECT id, joke FROM jokes");
$sql->execute();


//Vilken är vettig att ha till höger om ->
$result = $sql->fetchAll(PDO::FETCH_COLUMN, 1);

print_r($result);


// Utnyttja svaret


//echo "Table MyGuests created successfully";
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();		
}

?>	