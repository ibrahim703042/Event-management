
<?php

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "event";


try{

	$dbconnection = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$dbconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){

	echo $e->getMessage();
}

$conn = mysqli_connect($DB_host,$DB_user,$DB_pass,$DB_name);

include_once 'controller/controllerData.php';

include_once 'class/car.php';
include_once 'class/driver.php';
include_once 'class/user.php';

$car= new car($dbconnection);
$driver= new driver($dbconnection);
$utilisateur= new user($dbconnection);

?>
