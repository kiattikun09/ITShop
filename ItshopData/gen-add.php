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
  $insertSQL = sprintf("INSERT INTO gen (ge_name, cat_id, brand_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['gen'], "text"),
                       GetSQLValueString($_POST['cat'], "int"),
                       GetSQLValueString($_POST['barnd'], "int"));

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

mysql_select_db($database_Myconnec, $Myconnec);
$query_brandset1 = "SELECT brand_id, brand_name FROM brand";
$brandset1 = mysql_query($query_brandset1, $Myconnec) or die(mysql_error());
$row_brandset1 = mysql_fetch_assoc($brandset1);
$totalRows_brandset1 = mysql_num_rows($brandset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <div align="center">ประเภท : 
    <select name="cat" id="cat">
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
แบรนด์
     :
<select name="barnd" id="barnd">
  <?php
do {  
?>
  <option value="<?php echo $row_brandset1['brand_id']?>"><?php echo $row_brandset1['brand_name']?></option>
  <?php
} while ($row_brandset1 = mysql_fetch_assoc($brandset1));
  $rows = mysql_num_rows($brandset1);
  if($rows > 0) {
      mysql_data_seek($brandset1, 0);
	  $row_brandset1 = mysql_fetch_assoc($brandset1);
  }
?>
</select>
  รุ่น : 
  <input type="text" name="gen" id="gen" />
  <input type="submit" name="btnsevse" id="btnsevse" value="ตกลง" />
  </div>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($catset1);

mysql_free_result($brandset1);
?>
