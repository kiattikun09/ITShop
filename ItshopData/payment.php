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


<!-- in image -->
   <style type="text/css">
   #content{
   	width: 90%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 0px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 185px;
   	height: 140px;
   }
</style>
</head>
<body>

  <div class="row">
    <div class="col-sm-7">
    <table class="shadow table" style="width:%;margin-left:30px;margin-top:20px;">
        <thead class="thead-dark">
        <tr>
            <th style="width:350px;">รายการสินค้า</th>
            <th >จำนวน</th>
            <th >ราคาสินค้า</th>
            <th >เวลาที่ซื้อ</th>
        </tr>
        </thead>
        </div>
        <?php 
            while($getRows = mysqli_fetch_array($query)){
        echo "
        <tbody>
            <tr>
                 <td>".$getRows['pro_name']."</td>
                 <td style='text-align:center';>".$getRows['quantity']."</td>
                 <td style='text-align:center';>".$getRows['price']."</td>
                 <td >".$getRows['order_date']."</td>
            </tr>
        </tbody>";
        }
        ?></table>
    </div>
    <div class="col-sm-5">
    <table class="table-dark" style="width:90% ;border-radius: 10px;margin-left:10px;margin-top:20px;box-shadow: 0 15px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 20px 0 rgba(0, 0, 0, 0.19);margin-left: 15px;">
    <!-- <thead class="thead-dark"> -->
        <tr>
            <th style="padding-left:10px;padding-top:10px;"><h3>กรุณาชำระเงิน</h3></th>
        </tr>
        <tr><th>
        <!-- <form sytle = "padding-left:10px;"> -->
 <div class="form-group"> <div class="dropdown-divider"></div>
                 <label for="exampleFormControlFile1" style="padding-left:10px;">หลักฐานการชำระเงิน รูปลสิปการชำระเงิน </label>
                <!-- <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1"style="margin-left: 10px;"> -->
                </div>
        </form>

        <div id="content">
  <?php
    $imgSql = "SELECT * FROM payments where cust_id = ".$cust_id."";
    $queryImg = mysqli_query($conn,$imgSql);
    $getRowsImag = mysqli_fetch_array($queryImg);
    if($getRowsImag['image'] != null){
      echo "<div id='img_div'>";
      echo "<img src='../itshopData/img-products/".$getRowsImag['image']."' >";
      // echo "<p>".$getRows['text']."</p>";
    echo "</div>";
    }
    
  ?>
  <form method="POST" action="_payment.php" enctype="multipart/form-data" style="margin-left: 15px;">
  	<input type="hidden"name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>

  	<div>
  		<button type="submit" name="upload" onclick="myFunction()">ตกลง</button>
  	</div>
  </form>
</div>
</tr>
        </th>


        
        <!-- </thead> -->
    </table>
    <table class="table-borderless table-dark" width="90%" height="90;" align="left"  style="border-radius: 10px;margin-top:5px;margin-rigth: 5px;box-shadow: 0 15px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 20px 0 rgba(0, 0, 0, 0.19);margin-left: 15px;">
    <td><center><img border="0" src="images/3w.jpg" width="100" height="90"></center></td>
    <td><center><img border="0" src="images/3w.jpg" width="100" height="90"></center></td>
       
   
        </table>
    </div>
  </div>
</body>
</html>