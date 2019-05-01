<?php
	$server = "localhost";
	$user = "root";
	$pass = "0898061748";
	$db = "ITShop";
	$conn = mysqli_connect($server,$user,$pass,$db) or die ("Can't connect to Database");
	mysqli_query($conn,"SET NAMES UTF8");
?>