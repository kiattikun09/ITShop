
<?php include("Check_login.php")?>
<!DOCTYPE html>
<!-- saved from url=(0064)https://blackrockdigital.github.io/startbootstrap-shop-homepage/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Iconmeps -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- TemplateBeginEditable name="doctitle" -->
    <title>IT SHOP LOPBURI</title>
    <!-- TemplateEndEditable -->
    <!-- Bootstrap core CSS -->
    <link href="../ItShopOn/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../ItShopOn/shop-homepage.css" rel="stylesheet">
    <!-- TemplateBeginEditable name="head" -->
    <!-- TemplateEndEditable -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT SHOP LOPBURI</title>
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
<?php
session_start();
	$cust_id = $_SESSION['cust_id'];
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];
?>
<?php
 $sqllist = "SELECT COUNT(order_id) as list FROM orders WHERE cust_id=".$cust_id."";
  @$querylist = mysqli_query($conn,$sqllist);
  @$getRowslist = mysqli_fetch_array($querylist);
  //echo $getRowslist;
  ?>
  

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <!-- <div class="container"> -->
        <a class="navbar-brand" href="../ItShopOn/index.php">IT SHOP LOPBURI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

          <a href ="Pro_integration.php" i class=" fa fa-shopping-cart fa-2x"style="color:snow; margin-right:1px;"></i></a>
              <a style = "margin-right:20px";><font size="2"><span class=" badge badge-pill badge-danger position-absolute float-right mt-1"style=""><?php echo $getRowslist['list']?></span></font>
                <span class="sr-only"></span>
        </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="Payment.php">ชำระเงิน
                <span class="sr-only">(current)</span>
              </a>
            </li>


            <li class="nav-item active">
              <a class="nav-link" href="../ItShopOn/index.php">หน้าแรก
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <?php
				if($cust_id == ""){ ?>
            <li class="nav-item">
              
               <a  class="nav-link" href="#" id="myBtn">Login</a>
               
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="#">สมัคสมาชิค</a>
            </li>
            <?php }?>
            <li class="nav-item">
              <a class="nav-link" href="#">ติดต่อเรา</a>
            </li>
            <?php
				if($cust_id != ""){ ?>
                <li class="nav-item">
              <a class="nav-link"href="../ItShopOn/member.php"><?php echo"สวัสดีคุณ:"." ".$firstname." ".$lastname; ?></a>
            </li>
                <li class="nav-item">
              <a class="nav-link" href="../ItShopOn/logout.php">Logout</a>
            </li>
			 <?php }?>
            
          </ul>
        </div>
      <!-- </div> -->
    </nav>

    <!-- Page Content --><!-- TemplateBeginEditable name="ส่วนที่ต้องแก้ไข" -->
    <div class="jumbotron text-center">
<p><i class="fas fa-map-marker-alt"></i>&nbsp;ตำบลท่าหิน อำเภอเมืองลพบุรี จังหวัดลพบุรี  15000</p>
<p><i class="fas fa-door-open"></i>&nbsp;เปิดทำการ วันจันทร์ ถึง วันเสาร์ ยกเว้นวันหยุดราชการ</p>
<p><i class="fas fa-history"></i>&nbsp;เวลาทำการ 8:00-19:00</p>
<p><i class="fas fa-phone-square"></i>&nbsp;036 421 090</p>



</div>
    <div class="container">

  <div class="row">
    <div class="col-sm-3">
    <p><a href="https://www.facebook.com/itshoplb"><center><img src="images/facebook.png" widh=50px; height=50px;></p></center>
      <center><p>www.facebook.com</p></center></a>
    </div>
    <div class="col-sm-3">
    <p><a href="#"><center><img src="images/Line.png" widh=50px; height=50px;></p></center>
      <center><p>www.Line.com</p></center></a>
    </div>
    <div class="col-sm-3">
    <p><a href="#"><center><img src="images/instagram.png" widh=50px; height=50px;></p></center>
      <center><p>www.instagram.com</p></center></a>
    </div>
    <div class="col-sm-3">
    <p><a href="https://itshoplb.blogspot.com/2014/07/set-mtu-modem.html"><center><img src="images/dd.JPG" widh=50px; height=50px;></p></center>
      <center><p>www.instagram.com</p></center></a>
    </div>
  </div>
</div>

<!-- <div class="jumbotron center"> -->
<div class="col-sm-8">
<h3><i class="fas fa-map-marked-alt"></i>&nbsp;แผนที่</h3>
     <center><P style="margin-left: 90px;"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d964.3304589593848!2d100.64814772770058!3d14.807184709824101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311e0069ef6d4407%3A0x66e5d2fe093d1b09!2sitshop!5e0!3m2!1sth!2sth!4v1554346076505!5m2!1sth!2sth" width="1400" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</center>
</div>
<!-- </div></div> -->
<!-- TemplateEndEditable --><!-- /.container -->

    <!-- Footer -->
    <!-- <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright © Your Website 2018</p>
      </div>
      <!-- /.container -->
    <!-- </footer> --> 

    <!-- Bootstrap core JavaScript -->
    <script src="../ItShopOn/jquery.min.js.ดาวน์โหลด"></script>
    <script src="../ItShopOn/bootstrap.bundle.min.js.ดาวน์โหลด"></script>

  
  
  
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
          <form role="form" method="post" action="../ItShopOn/check_login.php" accept-charset="UTF-8" onsubmit="javascript:return checkNull();">
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
