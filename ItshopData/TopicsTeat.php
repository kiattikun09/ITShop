<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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
</head>
<body>
<?php
session_start();
include('dblink.php');
	$cust_id = $_SESSION['cust_id'];
	$firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  
  $sqllist = "SELECT COUNT(cust_id) as list FROM order_details ";
  $querylist = mysqli_query($link,$sqllist);
  $getRowslist = mysqli_fetch_array($querylist);
  //echo $getRowslist;
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <div align="center"><a class="navbar-brand" href="../ItShopOn/index.php">IT SHOP LOPBURI</a></div>
    </div>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>               
      </button>
      
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="../ItShopOn/index.php">Home</a></li>-->
        <li><a href="products.php"><i class="fas fa-box-open"></i>รายการสินค้า</a></li>
        <li class="dropdown">
        <li><a href="categories.php">ประเภทสินค้า</a></li>
        <li><a href="ShowOrder.php"style = "margin-right:20px";><font size="2">รายการสั่งซื้อสินค้า<span class=" badge badge-pill badge-danger position-absolute float-right mt-1" style="background:red;"><?php echo $getRowslist['list']?></span></font>
      <span class="sr-only"></span></a></li>
        <li><a href="customer.php">ข้อมูลสมาชิก</a></li>
        <li><a href="#">แจ้งการสำระเงิน</a></li>
        
      
      </ul>
      <div align="right">
        <h4>
          <?php
				if($cust_id == ""){ ?>
            <?php }?>
            <?php if($cust_id != ""){ ?>
            <a class="nav-link"><?php echo"สวัสดีคุณ:"." ".$firstname." ".$lastname; ?></a>
            <a class="nav-link" href="logout.php">Logout</a></h4>
          <?php }?>

      </div>
    </div>
  </div>
</nav>



    <!-- Bootstrap core JavaScript -->
    <script src="jquery.min.js.ดาวน์โหลด"></script>
    <script src="bootstrap.bundle.min.js.ดาวน์โหลด"></script>

  
  
  
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div align="right">
        
        <!-- Modal content-->
      </div>
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <div align="right">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <h4 align="right"><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="check_login.php" accept-charset="UTF-8" onsubmit="javascript:return checkNull();">
            <div class="form-group">
              <label for="usrname">
                <div align="right"><span class="glyphicon glyphicon-user"></span> username</div>
              </label>
              <div align="right">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter email">
              </div>
            </div>
            <div class="form-group">
              <label for="psw">
                <div align="right"><span class="glyphicon glyphicon-eye-open"></span> password</div>
              </label>
              <div align="right">
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
              </div>
            </div>
            <div class="checkbox">
              <label>
                <div align="right">
                  <input type="checkbox" value="" checked>
                  Remember me</div>
              </label>
            </div>
              <div align="right">
                <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <div align="right">
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          </div>
          <p align="right">Not a member? <a href="#">Sign Up</a></p>
          <p align="right">Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<div align="right"> </div>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
  


</body></html>
</body>
</html>

   

