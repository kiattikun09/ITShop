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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_POST['search'])) {
  $colname_Recordset1 = $_POST['search'];
}
mysql_select_db($database_Myconnec, $Myconnec);
$query_Recordset1 = sprintf("SELECT products.pro_id,categories.cat_name,products.pro_name,products.detail,products.price,products.quantity,brand.brand_name,gen.ge_name,products.imag,products.imagtwo,products.imagthree
 FROM categories,products,gen,brand
WHERE products.cat_id = categories.cat_id and products.brand_id=brand.brand_id AND products.ge_id=gen.ge_id AND pro_name LIKE %s", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $Myconnec) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<?php include("TopicsTeat.php"); ?>

<div class="container">
  <?php do { ?>
    <table width="119%" height="100" class="table">
      <thead>
        <tr>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">      
        <tr>
          <td height="48"><table width="657" height="130">
            <tr>
              <th scope="col"> <div align="left"><img src="img-products/<?php echo $row_Recordset1['imag']; ?>" width="93" height="81"><img src="img-products/<?php echo $row_Recordset1['imagtwo']; ?>" width="84" height="71"><img src="img-products/<?php echo $row_Recordset1['imagthree']; ?>" width="87" height="59">
                <table width="375">
                  <tr>
                    <th scope="col">ชื่อ : <?php echo $row_Recordset1['pro_name']; ?></th>
                  </tr>
                  <tr>
                    <th scope="row"><table width="280">
                      <tr>
                        <th width="135" scope="col">ประเภท : <?php echo $row_Recordset1['cat_id']; ?></th>
                        <th width="102" scope="col">แบรนด์ : <?php echo $row_Recordset1['brand_id']; ?></th>
                        <th width="27" scope="col">รุ่น : <?php echo $row_Recordset1['ge_id']; ?></th>
                      </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row"><table width="200">
                      <tr>
                        <th scope="col">ราคา :<?php echo $row_Recordset1['price']; ?></th>
                        <th scope="col">จำนวน : <?php echo $row_Recordset1['quantity']; ?></th>
                      </tr>
                    </table></th>
                  </tr>
                  <tr>
                    <th scope="row">รายละเอียด : <?php echo $row_Recordset1['detail']; ?></th>
                  </tr>
                  <tr>
                    <th scope="row"><table width="200">
                      <tr>
                        <th scope="col"><div align="center"><a href="products-Up.php?pro_id=<?php echo $row_Recordset1['pro_id']; ?>">Updat</a></div></th>
                        <th scope="col"><div align="center"><a href="products-delete.php?pro_id=<?php echo $row_Recordset1['pro_id']; ?>">Delete</a></div></th>
                      </tr>
                    </table></th>
                  </tr>
                </table>
              </div></th>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</div>

</body>
</html>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
