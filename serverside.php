<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jokes";

try {
	$myPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$entries = $myPDO->prepare("SELECT COUNT(*) FROM jokes");
	$entries->execute();
	// Sample one of these numbers.
	$numEntries = random_int(1, (int) $entries->fetchColumn());

	// Sample a joke from the database.
	$sql = $myPDO->prepare("SELECT joke FROM jokes WHERE id=$numEntries");
	$sql->execute();

	// Skriv ut skämtet
	$result = $sql->fetchColumn();
	echo $result;

	// Close connections
	$myPDO = NULL;
	$entries = NULL;
	$sql = NULL;
	
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}
 
