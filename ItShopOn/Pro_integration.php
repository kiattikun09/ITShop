
<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT SHOP LOPBURI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>


<?php
  include_once('connect.php');
  
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $cust_id = $_SESSION['cust_id'];
  // echo $cust_id;
  $sqlOrder = "select products.imag,orders.quantity,orders.price,orders.order_id from orders
                LEFT JOIN products on orders.pro_id = products.pro_id
                where cust_id = ".$cust_id."";
  $queryOrder = mysqli_query($conn,$sqlOrder);

  $sqlTotal = "SELECT SUM(price) as total FROM orders WHERE cust_id=".$cust_id."";
  $queryTotal = mysqli_query($conn,$sqlTotal);
  $getRowsTotal = mysqli_fetch_array($queryTotal);

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">สินค้า</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ราคารวม</th>
            <th scope="col">แก้ไขรายการ</th>
          </tr>
        </thead>
        <img src="" alt="">
        <tbody>
        <?php
          while($getRowsOrder = mysqli_fetch_array($queryOrder)){
            echo "<tr>";
            echo "<td><img class='card-img-top' src='../Itshopdata/img-products/".$getRowsOrder['imag']."' alt='' style='width:100px;'></td>";
            echo "<td>".$getRowsOrder['quantity']."</td>";
            echo "<td>".$getRowsOrder['price']."</td>";
            echo "<td><a href='deleteOrder.php?order_id=".$getRowsOrder["order_id"]."'>ลบรายการ</a></td>";
            echo "</tr>";
          }
        ?>
        </tbody>
      </table>
      <div>
          <h4> ราคารวมทั้งหมด:<?php echo $getRowsTotal['total']?></h4>
          <button type="button" class="btn btn-warning" ><a href="index.php" style="text-decoration: none;color:snow">ย้อนกลับ</button>&nbsp;&nbsp;
          <button class="btn btn-success"><a href="_orders_product.php?cust_id=<?php echo $cus?>" style="text-decoration: none;color:snow">ซื้อเลย</a></button>
      </div>
  </div>
</div>







<script>
function calculate(){
  var x = document.getElementById('amount')
  alert(x.value);
}
</script>
</body>
</html>
