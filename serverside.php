<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
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
	$sql = "CREATE DATABASE fiskmacka";
	$myPDO->exec($sql);
	echo "Det funkar hurra";

} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();		
}

?>	