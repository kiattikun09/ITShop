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
  $updateSQL = sprintf("UPDATE customers SET `user`=%s, email=%s, status=%s, password=%s, firstname=%s, lastname=%s, `prefix`=%s, sex=%s, address=%s, phone=%s WHERE cust_id=%s",
                       GetSQLValueString($_POST['user'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['prefix'], "int"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['cust_id'], "int"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($updateSQL, $Myconnec) or die(mysql_error());

  $updateGoTo = "member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_ReUp = "-1";
if (isset($_GET['cust_id'])) {
  $colname_ReUp = $_GET['cust_id'];
}
mysql_select_db($database_Myconnec, $Myconnec);
$query_ReUp = sprintf("SELECT * FROM customers WHERE cust_id = %s", GetSQLValueString($colname_ReUp, "int"));
$ReUp = mysql_query($query_ReUp, $Myconnec) or die(mysql_error());
$row_ReUp = mysql_fetch_assoc($ReUp);
$totalRows_ReUp = mysql_num_rows($ReUp);
?>
<!DOCTYPE html>
<!-- saved from url=(0064)https://blackrockdigital.github.io/startbootstrap-shop-homepage/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    

</head>

  <body>

    <!--ส่วนแก้ไข-->
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>&nbsp;
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">Cust_id:</td>
              <td><?php echo $row_ReUp['cust_id']; ?></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">User:</td>
              <td><input type="text" name="user" value="<?php echo htmlentities($row_ReUp['user'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Email:</td>
              <td><input type="text" name="email" value="<?php echo htmlentities($row_ReUp['email'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Status:</td>
              <td><input type="text" name="status" value="<?php echo htmlentities($row_ReUp['status'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Password:</td>
              <td><input type="text" name="password" value="<?php echo htmlentities($row_ReUp['password'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Firstname:</td>
              <td><input type="text" name="firstname" value="<?php echo htmlentities($row_ReUp['firstname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Lastname:</td>
              <td><input type="text" name="lastname" value="<?php echo htmlentities($row_ReUp['lastname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Prefix:</td>
              <td><input type="text" name="prefix" value="<?php echo htmlentities($row_ReUp['prefix'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Sex:</td>
              <td><input type="text" name="sex" value="<?php echo htmlentities($row_ReUp['sex'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Address:</td>
              <td><input type="text" name="address" value="<?php echo htmlentities($row_ReUp['address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Phone:</td>
              <td><input type="text" name="phone" value="<?php echo htmlentities($row_ReUp['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Update record"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_update" value="form1">
          <input type="hidden" name="cust_id" value="<?php echo $row_ReUp['cust_id']; ?>">
        </form>
        <p>&nbsp;</p>
      </h3>
    </div>
  </div>
</div>


  
</body></html>
<?php
mysql_free_result($ReUp);
?>
