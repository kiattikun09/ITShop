<?php 
    date_default_timezone_set("Asia/Bangkok");
    ob_start();
    include_once('connect.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $cust_id = $_SESSION['cust_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <style type="text/css">
      table{
        font-size: large;
        width:100%;
      }
      tr,th,td{
        border:1px solid #000000;
        text-align: center;
      }
      thead{
        background : #000000;
        height: 50px;
        color:#FFFFFF;
        text-align: center;
      }
      td{
        background : #f2f2f2;
      }
      </style>
</head>


<?php
 require_once('../Connections/Myconnec.php'); 
 include("dw-upload.inc.php");
 include("../ItshopData/dblink.php");
 include("../ItshopData/check-login.php");
 include("Tem.php"); 
 include_once('connect.php');
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }


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
$list_order = $_GET["list_order"];
$cust_id =  $_GET["cust_id"];
$slip = "";
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST["MM_insert"])) {
  
  $insertSQL = sprintf("INSERT INTO payments ( cust_id,transfer_date,slip,list_order) VALUES (%s, %s ,%s,%s)",
                      GetSQLValueString($_GET["cust_id"], "int"),
                      GetSQLValueString( date('Y-m-d h:m:s' ),"date"),
                      GetSQLValueString(dwUpload($_FILES['slip']), "text"),
                      GetSQLValueString($_GET["list_order"],"int"));
  $Result1 = mysqli_query($conn,$insertSQL);
  $insertGoTo = "Payment.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  $updateStatusOrder = "update order_details set status = 1 where order_id=".$order_id."";
  $queryUpdateProduct = mysql_query($updateStatusOrder,$Myconnec); 

  echo "<script type=\"text/javascript\">";
  echo "alert(\"ยืนยันการสั่งซื้อสำเร็จค่ะ\");";
  echo "window.close()";
  echo "</script>";
  header("Location:index.php"); 
}


include_once('connect.php');
$sql = "SELECT 
        order_details.quantity,
        order_details.price as total_price,
        products.pro_name,
        products.price
        FROM list_order_details
        LEFT JOIN order_details ON list_order_details.list_order = order_details.list_order
        LEFT JOIN products ON order_details.pro_id = products.pro_id
        WHERE order_details.cust_id = ".$cust_id." AND list_order_details.list_order = ".$list_order."";
        $query= mysqli_query($conn,$sql);
$sqlsum = "SELECT SUM(price) as sum_product FROM order_details WHERE list_order = ".$list_order."" ;
$querysum = mysqli_query($conn,$sqlsum);
$rowsum = mysqli_fetch_array($querysum);      
?>
<body>
<div class="container-fluid">
<br><br>
  <div class="row">
    <div class="col-md"></div>
    <div class="col-md-7">
    <h6 style="font-size:30px;"><b>รายการที่ท่านจะชำระเงิน</b></h6>
    <br>
    <table class="shadow">
      <thead>
        <tr>
          <th>จำนวนสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>ราคาสินค้า/ชิ้น</th>
          <th>ราคารวม/รายการสินค้า</th>
        </tr>
      </thead>
      <tbody>
      <?php while($getRows = mysqli_fetch_array($query)){ ?>
        <tr>
            <td><?=$getRows['quantity'];?></td>
            <td><?=$getRows['pro_name'];?></td>
            <td><?=$getRows['price'];?></td>
            <td><?=$getRows['total_price'];?></td>
        </tr>
      <?php } ?>   
      </tbody>
      <tbody>
        <tr>
          <td colspan="3" style="text-align:left;"><b style="padding-left: 40%;"> ราคารวม</b></td>
          <td><?=$rowsum['sum_product']?></td>
        </tr>
      </tbody>
    </table>
    </div>
    <div class="col-md"></div>
  </div><br><br>
  <div class="row">
    <div class="col-md"></div>
    <div class="col-md shadow" style="border-radius:20px;">
    <br>
    <form method="post" name="from" enctype="multipart/form-data">
      <div class="form-group md-3">
        <label for="slip"><b>ใบสลิป :</b></label>
        <p>
        <input type="file" name="slip" id="slip"<?=$row['slip'];?>/>
        </p>
        <span> <?php echo $row['slip'] ?></span>
      </div>
      <div class="form-group md-3">
        <button type="sumbit" class="btn btn-success" name="MM_insert" onclick="myFunction()">ยืนยัน </button>
        <button type="button" class="btn btn-danger"><a href="Payment.php" style="color:snow;text-decoration: none">ยกเลิก</a></button>
      </div>
    </form>
    </div>
    <div class="col-md"></div>
  </div>
</div>

<script>
function myFunction() {
  alert("ชำระเงินสำเร็จคะ!!!  ติดตามรหัสสินค้าได้ที่หน้าหลักคะ!!!");
}

</script>
</body>
</html>

