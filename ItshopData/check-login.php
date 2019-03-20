<?
session_start();
mysql_connect("localhost","root","0898061748");
mysql_select_db("itShop");
$strSQL = "SELECT * FROM customers WHERE user = '".mysql_real_escape_string($_POST['username'])."'
and password = '".mysql_real_escape_string($_POST['password'])."'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
}
else
{

$_SESSION["cust_id"] = $objResult["cust_id"];

$_SESSION["status"] = $objResult["status"];
session_write_close();
if($objResult["status"] == "ADMIN,ADMINTWO")
{
header("location:../ItshopData/products.php");
}
else
{

header("location:../ItShopOn/index.php");

}

}

mysql_close();

?>