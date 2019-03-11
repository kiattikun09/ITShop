<?php 
include_once('connect.php');
$amount = $_GET['amount'];
// echo $amount;
$pro_id =  $_GET["pro_id"]; //เป็นการดึงรหัส Pro_id มาจากหน้าที่แล้ว
// echo $pro_id;
$amountProduct;
//เปิด session เพื่อที่จะเอารหัสผู้ใช้งาน
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//สิ้นสุดเงื่อนไข
$cust_id = $_SESSION['cust_id']; //เป็นการเรียกรหัสผู้ใช้งาน
// echo $cust_id;
// if(!$pro_id){ echo "notget";}
// echo $pro_id;
// การใช้คำสั่ง database
$sql = "select * from products WHERE pro_id = ".$pro_id."";
$query = mysqli_query($conn,$sql);
$getRows = mysqli_fetch_array($query);
// จบบรรทัด การใช้คำสั่ง database

// การใช้คำสั่ง database
$calculatorPrice = "select price*".$amount." as total_price from products WHERE pro_id = ".$pro_id."";
$queryPrice = mysqli_query($conn,$calculatorPrice);
$getRowsPrice = mysqli_fetch_array($queryPrice);
// จบบรรทัด การใช้คำสั่ง database

//เพิ่มข้อมูลลงตารางสั่งซื้อ
$insertData = "INSERT INTO orders(cust_id,order_date,pro_id,quantity,price) values(".$cust_id.",CURRENT_TIMESTAMP(),".$pro_id.",".$amount.",".$getRowsPrice['total_price'].");";
$queryOrders = mysqli_query($conn,$insertData);
//จบบรรทัด INSERT 

$selectProduct = "select quantity from products where pro_id = ".$pro_id."";
$sqlSelectProducts = mysqli_query($conn,$selectProduct);
if($sqlSelectProducts){ echo "select Product success";}else{echo "can not select product";}
$getRowsProducts = mysqli_fetch_array($sqlSelectProducts);

$totalQuantityUpdate = $getRowsProducts['quantity'] - $amount;


//แก้ไขตาราง Product เพื่อที่จะให้จำนวนสิ้นค้าลดลง
$updateData = "update products SET quantity = ".$totalQuantityUpdate."  WHERE pro_id = ".$pro_id."";
$queryUpdateProduct = mysqli_query($conn,$updateData);
//จบบรรทัด การใช้คำสั่ง Update

header("Location:Pro_integration.php?amount=".$amount."&pro_id=".$pro_id."");
?>