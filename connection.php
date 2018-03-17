<?php

	$host = "localhost";
	$user = 'root';
	$pass = '';
	$db = 'store';
	$con = mysqli_connect($host, $user, $pass,$db);
	if(!$con)
{
	die('not connected');
}
    error_reporting(E_ALL & ~E_NOTICE);

	

?>


