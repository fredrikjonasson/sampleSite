<?php
// Login information to the server.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jokes";

try {
	// Creation of PDO-object and setting of attribute.
	$myPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Preparing and executing a SQL-query to retrieve the number of entries in the database.
	$entries = $myPDO->prepare("SELECT COUNT(*) FROM jokes");
	$entries->execute();
	// Using the entries to sample a row in the database from 1 to number of entries.
	$numEntries = random_int(1, (int) $entries->fetchColumn());

	// Picking the sampled row(ID) from the database and executing query.
	$sql = $myPDO->prepare("SELECT joke FROM jokes WHERE id=$numEntries");
	$sql->execute();

	// Printing the result.
	$result = $sql->fetchColumn();
	echo $result;

	// Closing connections.
	$myPDO = NULL;
	$entries = NULL;
	$sql = NULL;
	
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}
 
