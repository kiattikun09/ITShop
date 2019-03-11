<?php 
    include_once('connect.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $cust_id = $_SESSION['cust_id'];

    $sql = "SELECT
    customers.firstname,
    customers.lastname,
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
<?php include("Tem.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

     <!-- bootstrap icon -->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/fontawesome/css/font-awesome.min.css">
    
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="shop-homepage.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Iconos -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  
  
	  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <table class="shadow table" style="width:90%;margin-left:100px;margin-top:20px;">
        <thead class="thead-dark">
        <tr>
            <th>รายการสินค้า</th>
            <th>จำนวน</th>
            <th>ราคาสินค้า</th>
            <th>เวลาที่ซื้อ</th>
        </tr></thead>
        <?php 
        while($getRows = mysqli_fetch_array($query)){
        echo "
        <tbody>
            <tr>
                 <td>".$getRows['pro_name']."</td>
                 <td>".$getRows['quantity']."</td>
                 <td>".$getRows['price']."</td>
                 <td>".$getRows['order_date']."</td>
            </tr>
        </tbody>";
        }
        ?>
    </table>
</body>
</html>