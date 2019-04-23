<?php 
    date_default_timezone_set("Asia/Bangkok");
    ob_start();
    include_once('../ItShopOn/connect.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $cust_id = $_SESSION['cust_id'];

    $sql = "SELECT
    customers.firstname,
    customers.lastname,
    order_details.order_id,
    order_details.price,
    order_details.quantity,
    products.pro_name,
    order_details.order_date
    FROM
    customers
    INNER JOIN order_details ON order_details.cust_id = customers.cust_id
    INNER JOIN products ON order_details.pro_id = products.pro_id
    WHERE customers.cust_id= ".$cust_id."";
    $query= mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <style type="text/css">
      table{
        font-size: large;
      }
      </style>
</head>


<?php
 require_once('../Connections/Myconnec.php'); 
 include("dw-upload.inc.php");
 include("dblink.php");
 include("check-login.php");
 include("TopicsTeat.php");
 include_once('../ItShopOn/connect.php');
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
$order_id =  $_GET["order_id"];
$cust_id =  $_GET["cust_id"];
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
   $insertGoTo = "ShowOrder.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  echo $_POST['check_payment'];
  $updateStatusOrder  = sprintf("UPDATE payments SET check_payment= %s" ,
    GetSQLValueString($_POST['check_payment'], "int"));
  $queryUpdateProduct = mysql_query($updateStatusOrder,$Myconnec); 
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ตรวจสอบสำเร็จค่ะ\");";
  echo "window.close()";
  echo "</script>";
  header("Location:ShowOrder.php"); 
}


include_once('../ItShopOn/connect.php');
$sql = "SELECT
        customers.firstname,
        customers.lastname,
        order_details.order_id,
        order_details.price,
        order_details.quantity,
        products.pro_name,
        order_details.order_date,
        payments.pay_id,
        payments.amount,
        payments.transfer_date,
        payments.location,
        payments.slip,
        payments.bank
        FROM
        customers
        INNER JOIN order_details ON order_details.cust_id = customers.cust_id
        INNER JOIN products ON order_details.pro_id = products.pro_id
        INNER JOIN payments ON payments.order_id = order_details.order_id
        WHERE customers.cust_id= ".$cust_id." AND order_details.order_id = ".$order_id."" ;
        $query= mysqli_query($conn,$sql);
        // $getRows = mysqli_fetch_array($query);
?>
<?php
    $sqlTotal = "SELECT SUM(price) as total FROM orders WHERE cust_id=".$cust_id."";
    $queryTotal = mysqli_query($conn,$sqlTotal);
    $getRowsTotal = mysqli_fetch_array($queryTotal);
?>


<body>
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h3>ตรวจสอบการชำระเงิน</h3>
      <p></p>
      <p></p>
    </div>
    <div class="col-sm-4">
      <h3>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1">
         <table align="center" >
          <tr valign="baseline"> 
          <td nowrap align="right"><label> เลขที่ใบสั่งซื้อ :</label> </td>
          <td><input class="form-control" type="text" name="order_id" value= <?php echo $order_id; ?>" size="32" placeholder=""></p></td>
              </td>
          </tr>
            <tr valign="baseline">
              <td nowrap align="right"> ชื่อสินค้า:</td>
              <td><p><input disabled class="form-control" type="text" name="pro_name" value="<?php echo $getRows['pro_name'] ?>" size="32" placeholder="ชื่อสินค้า"></p></td>
              
            </tr>
     
          <form name="form" method="post" action="get_form.php">
            
              <tr valign="baseline">
                <td nowrap align="right">ราคาสินค้า:</td>
                <td><p><input  disabled name="price" type="text" class="form-control" value="<?php echo $getRows['price']*['quantity'] ?>" size="32"></p></td>
            </tr>

              <tr valign="baseline">
                <td nowrap align="right">จำนวนสินค้า:</td>
                <td><p><input disabled name="quantity" type="text" class="form-control" value="<?php echo $getRows['quantity'] ?>" size="32"></p></td>
              </tr>
              

              
              <tr valign="baseline">
                <td nowrap align="right" valign="top">วันที่สั่งซื้อ:</td>
                <td><p> <input disabled name="order_date" type="text" class="form-control" value="<?php echo $getRows['order_date'] ?>" size="32"></p></td>
              </td>
              </tr>
              
              <tr valign="baseline">
                <td height="30" align="right" nowrap>
                  <label for="slip">ใบสลิป : </label>
                 </td>
                <td align="left">
               <input  disabled type="file" name="slip" value="../ItshopData/img-slip/<?php echo htmlentities($getRows['slip'], ENT_COMPAT, ''); ?>" size="32" />
               <img  name="slip"  id="slip" src="../ItshopData/img-slip/<?php echo htmlentities($getRows['slip'], ENT_COMPAT, ''); ?>">
     </td>    
              </tr>
              <tr valign="baseline">
                <td nowrap align="right">จำนวนเงินที่โอน :</td>
                <td><p><input disabled s id="amount" name="amount" type="text" class="form-control" value="<?php echo $getRows['amount'] ?>" size="32"></p></td>
            </tr>
              <tr valign="baseline">
                <td nowrap align="right">&nbsp;</td>
                <td>  <button type="sumbit" class="btn btn-success"  value="1" id="check_payment" name="check_payment" > การชำระเงินถูกต้อง </button>
                <button type="sumbit" class="btn btn-danger"  value="0" id="check_payment" name="check_payment" > การชำระเงินไม่ถูกต้อง </button>
                <button type="button" class="btn btn-warning" ><a href="Payment.php" style="text-decoration: none;color:snow">ย้อนกลับ</button>
                
                </td>
                
              </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1">
          </form>
      </h3>
    </div>
    <div class="col-sm-4"></div>
 
    
  </div>
</div>
</body></html> 