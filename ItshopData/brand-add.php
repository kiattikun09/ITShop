<?php require_once('../Connections/Myconnec.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO brand (brand_name, cat_id) VALUES (%s, %s)",
                       GetSQLValueString($_POST['brand-add'], "text"),
                       GetSQLValueString($_POST['categories'], "int"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($insertSQL, $Myconnec) or die(mysql_error());

  $insertGoTo = "categories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Myconnec, $Myconnec);
$query_catset1 = "SELECT * FROM categories";
$catset1 = mysql_query($query_catset1, $Myconnec) or die(mysql_error());
$row_catset1 = mysql_fetch_assoc($catset1);
$totalRows_catset1 = mysql_num_rows($catset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    <p>
      <label for="brand-add"></label>
    ประเภท : 
    <select name="categories" id="categories">
      <?php
do {  
?>
      <option value="<?php echo $row_catset1['cat_id']?>"><?php echo $row_catset1['cat_name']?></option>
      <?php
} while ($row_catset1 = mysql_fetch_assoc($catset1));
  $rows = mysql_num_rows($catset1);
  if($rows > 0) {
      mysql_data_seek($catset1, 0);
	  $row_catset1 = mysql_fetch_assoc($catset1);
  }
?>
    </select>
    brand :
    <input type="text" name="brand-add" id="brand-add" />
    <input type="submit" name="btnbrand" id="btnbrand" value="ตกลง" />
    <input type="hidden" name="MM_insert" value="form1" />
  </p>
  </form>
</div>
</body>
</html>
<?php
mysql_free_result($catset1);
?>
