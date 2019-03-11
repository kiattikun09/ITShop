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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE brand SET brand_name=%s WHERE brand_id=%s",
                       GetSQLValueString($_POST['brand_name'], "text"),
                       GetSQLValueString($_POST['brand_id'], "int"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($updateSQL, $Myconnec) or die(mysql_error());

  $updateGoTo = "categories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_brandRecordset1 = "-1";
if (isset($_GET['brand_id'])) {
  $colname_brandRecordset1 = $_GET['brand_id'];
}
mysql_select_db($database_Myconnec, $Myconnec);
$query_brandRecordset1 = sprintf("SELECT * FROM brand WHERE brand_id = %s", GetSQLValueString($colname_brandRecordset1, "int"));
$brandRecordset1 = mysql_query($query_brandRecordset1, $Myconnec) or die(mysql_error());
$row_brandRecordset1 = mysql_fetch_assoc($brandRecordset1);
$totalRows_brandRecordset1 = mysql_num_rows($brandRecordset1);

mysql_select_db($database_Myconnec, $Myconnec);
$query_catRecordset1 = "SELECT * FROM categories";
$catRecordset1 = mysql_query($query_catRecordset1, $Myconnec) or die(mysql_error());
$row_catRecordset1 = mysql_fetch_assoc($catRecordset1);
$totalRows_catRecordset1 = mysql_num_rows($catRecordset1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center"></div>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Brand_id :</td>
      <td><?php echo $row_brandRecordset1['brand_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">cat_id :</td>
      <td><select name="cat_id" id="cat_id">
        <?php
do {  
?>
        <option value="<?php echo $row_catRecordset1['cat_id']?>"<?php if (!(strcmp($row_catRecordset1['cat_id'], $row_brandRecordset1['cat_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_catRecordset1['cat_name']?></option>
        <?php
} while ($row_catRecordset1 = mysql_fetch_assoc($catRecordset1));
  $rows = mysql_num_rows($catRecordset1);
  if($rows > 0) {
      mysql_data_seek($catRecordset1, 0);
	  $row_catRecordset1 = mysql_fetch_assoc($catRecordset1);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Brand_name :</td>
      <td><input type="text" name="brand_name" value="<?php echo htmlentities($row_brandRecordset1['brand_name'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Update record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="brand_id" value="<?php echo $row_brandRecordset1['brand_id']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($brandRecordset1);

mysql_free_result($catRecordset1);
?>
