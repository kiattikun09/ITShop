<?php
 include_once('connect.php');
 if (session_status() == PHP_SESSION_NONE) {
   session_start();
 }
 $cust_id = $_SESSION['cust_id'];
 
$sqlSelectOrders = "SELECT order_id,order_date,pro_id,quantity,price,cust_id FROM orders WHERE cust_id = ".$cust_id."";
$querySelectOrders = mysqli_query($conn,$sqlSelectOrders);
$getRowsSelectOrders = mysqli_fetch_array($querySelectOrders);

$sqlInsertOrderDetails = "INSERT INTO order_details(order_id,order_date,pro_id,quantity,price,cust_id) ".$sqlSelectOrders."";
$queryInsertOrderDetails = mysqli_query($conn,$sqlInsertOrderDetails);

$sqlDeleteOrders = "DELETE FROM orders WHERE cust_id = ".$cust_id."";
$queryDeleteOrders = mysqli_query($conn,$sqlDeleteOrders);

if($queryDeleteOrders){
    echo "<script type=\"text/javascript\">";
    echo "alert(\"สั่งซื้อสำเร็จค่ะ (รอการชำระเงินคะ)\");";
    echo "window.close()";
    echo "</script>";
    // header("Location:index.php");
}

?>