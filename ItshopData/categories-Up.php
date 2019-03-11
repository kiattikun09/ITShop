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
  $updateSQL = sprintf("UPDATE categories SET cat_name=%s WHERE cat_id=%s",
                       GetSQLValueString($_POST['cat_name'], "text"),
                       GetSQLValueString($_POST['cat_id'], "int"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($updateSQL, $Myconnec) or die(mysql_error());

  $updateGoTo = "categories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_UpRecordset1 = "-1";
if (isset($_GET['cat_id'])) {
  $colname_UpRecordset1 = $_GET['cat_id'];
}
mysql_select_db($database_Myconnec, $Myconnec);
$query_UpRecordset1 = sprintf("SELECT * FROM categories WHERE cat_id = %s", GetSQLValueString($colname_UpRecordset1, "int"));
$UpRecordset1 = mysql_query($query_UpRecordset1, $Myconnec) or die(mysql_error());
$row_UpRecordset1 = mysql_fetch_assoc($UpRecordset1);
$totalRows_UpRecordset1 = mysql_num_rows($UpRecordset1);
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
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h3>&nbsp;</h3>
    </div>
    <div class="col-sm-4">
      <h3>&nbsp;
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
          <table width="250" height="34" align="center">
            <tr valign="baseline">
              <td height="28" align="right" nowrap>id:</td>
              <td><?php echo $row_UpRecordset1['cat_id']; ?></td>
              <td><input type="text" name="cat_name" value="<?php echo htmlentities($row_UpRecordset1['cat_name'], ENT_COMPAT, 'utf-8'); ?>" size="10"></td>
              <td><input type="submit" value="Update"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_update" value="form1">
          <input type="hidden" name="cat_id" value="<?php echo $row_UpRecordset1['cat_id']; ?>">
        </form>
        <p>&nbsp;</p>
      </h3>
    </div>
    <div class="col-sm-4">
      <h3>&nbsp;</h3>
    </div>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($UpRecordset1);
?>
