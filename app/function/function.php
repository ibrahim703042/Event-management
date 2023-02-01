<?php

function redirect($url, $message){
    $_SESSION['message']=$message;
    echo "<script>window.location.href='$url'</script>";
    exit(0);

}

function error($url, $message){
    $_SESSION['error']=$message;
    echo "<script>window.location.href='$url'</script>";
    exit(0);

}

function getByID($table, $id){
    $query = "SELECT * FROM  $table ID= '$id' ";

}

function check_login()
{
	if(isset($_SESSION['auth']))
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";		
		$_SESSION["id"]="";
		header("Location: http://$host$uri/$extra");
	}
}



?>