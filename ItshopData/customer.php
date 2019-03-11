<?php require_once('../Connections/Myconnec.php'); ?>
<?php include("TopicsTeat.php"); ?>
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

mysql_select_db($database_Myconnec, $Myconnec);
$query_CU = "SELECT cust_id, `user`, email, password, firstname, lastname, address, phone FROM customers";
$CU = mysql_query($query_CU, $Myconnec) or die(mysql_error());
$row_CU = mysql_fetch_assoc($CU);
$totalRows_CU = mysql_num_rows($CU);

$query_CU = "SELECT * FROM customers";
$CU = mysql_query($query_CU, $Myconnec) or die(mysql_error());
$row_CU = mysql_fetch_assoc($CU);
$totalRows_CU = mysql_num_rows($CU);
?>
<?php include("check-login.php"); ?>
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
      <div class="col-sm-12">
        <h2>รายชื่อสมาชิก</h2>
        <table width="93%" height="69" class="table">
          <thead>
            <tr>
              <th width="10%"><div align="center">user</div></th>
              <th width="12%"><div align="center">Pass</div></th>
              <th width="11%"><div align="center">Firstname</div></th>
              <th width="13%"><div align="center">Lastname</div></th>
              <th width="8%"><div align="center">Email</div></th>
              <th width="32%"><div align="center">Address</div></th>
              <th width="14%"><div align="center">Tel.</div></th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody><?php do { ?>
            <tr class="active">
              <td height="22"><div align="center"><?php echo $row_CU['user']; ?></div></td>
              <td><div align="center"><?php echo $row_CU['password']; ?></div></td>
              <td><div align="center"><?php echo $row_CU['firstname']; ?></div></td>
              <td><div align="center"><?php echo $row_CU['lastname']; ?></div></td>
              <td><div align="center"><?php echo $row_CU['email']; ?></div></td>
              <td><div align="center"><?php echo $row_CU['address']; ?></div></td>
              <td><div align="center"><?php echo $row_CU['phone']; ?></div></td>
              <td><div align="center"><a href="customer-delete.php?cust_id=<?php echo $row_CU['cust_id']; ?>">ลบ</a></div></td>
            </tr>
			<?php } while ($row_CU = mysql_fetch_assoc($CU)); ?>
          </tbody>
        </table>
        
      </div>
    </div>
    
</div>

</body>
</html>
<?php
mysql_free_result($CU);
?>
