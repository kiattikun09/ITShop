<?php
session_start();
mysql_connect("localhost","root","0898061748");
mysql_select_db("ITShop");
$strSQL = "SELECT * FROM customers WHERE user = '".mysql_real_escape_string($_POST['username'])."'
and password = '".mysql_real_escape_string($_POST['password'])."'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
//header("location:index.php");	
}
else

{
$_SESSION["firstname"] = $objResult["firstname"];
$_SESSION["cust_id"] = $objResult["cust_id"];
$_SESSION["lastname"] = $objResult["lastname"];
$_SESSION["status"] = $objResult["status"];
session_write_close();
if($objResult["status"] == "ADMIN")
{
header("location:../ItshopData/products.php");
}
else
{

header("location:index.php");

}

}

mysql_close();

?>