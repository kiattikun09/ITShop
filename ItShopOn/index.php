<!DOCTYPE html>
<!-- saved from url=(0064)https://blackrockdigital.github.io/startbootstrap-shop-homepage/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
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
  include_once('connect.php');
  $sql = "select * from categories ";
  $q = mysqli_query($conn,$sql);


  $sqllist = "SELECT COUNT(order_id) as list FROM orders WHERE cust_id=".$cust_id."";
  $querylist = mysqli_query($conn,$sqllist);
  @$getRowslist = mysqli_fetch_array($querylist);
  //echo $getRowslist;
  

?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="border-radius: 10px; <!--border:1px Red solid-->;box-shadow: 0 15px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fa fa-home fa-1x">IT SHOP LOPBURI</i></a>
        <!-- Search form -->
        <input class="form-control " style="width:35%;margin-left: 35px;" type="text" placeholder="Search" aria-label="Search"[{NgModel}]="name">
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
              <a class="nav-link " href="index.php">หน้าแรก
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <?php
				if($cust_id == ""){ ?>
            <li class="nav-item">
              
               <a  class="nav-link" href="#" id="myBtn">Login</a>
               
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="register.php">สมัคสมาชิค</a>
            </li>
            <?php }?>
            <li class="nav-item">
              <a class="nav-link" href="Call Center.php">ติดต่อเรา</a>
            </li>
            <?php
				if($cust_id != ""){ ?>
                <li class="nav-item">
              <a class="nav-link" href="member.php?cust_id=<?=$cust_id?>"><?php echo"คุณ:"." ".$firstname." ".$lastname; ?></a>
            </li>
                <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
			 <?php }?>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
	<div class="row">
    <div class="col-lg-3">
      <ul id="accordion" class="accordion">
        <?php 
        while($menu = mysqli_fetch_array($q)){?>
        <li>
          <div class="link"><i class="fa fa-list-ul fa-f2"></i><?php echo $menu['cat_name']; ?><i class="fa fa-chevron-down"></i></div>
          <ul class="submenu">
            <?php 
            $sql2 = "select * from brand where cat_id = '".$menu['cat_id']."' ";
            $q2 = mysqli_query($conn,$sql2);
            while($submenu = mysqli_fetch_array($q2)){ ?>
            <li style="border-radius: 5px; <!--border:1px Red solid-->;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"><a href="notebook.php?cat_id=<?=$menu['cat_id']?>&type=<?=$submenu['brand_id']?>" target="iframe_target"><?php echo $submenu['brand_name'] ?></a></li><?php 
            }?>
          </ul>
        </li><?php
        } ?>
	    </ul>
    </div>
    <!-- /.col-lg-3 -->
    <div class="col-lg-9">
      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item">
            <img class="d-block img-fluid"><img src="img/12.jpg" width="90%" height="350">
          </div>
          <div class="carousel-item active"><img src="img/900.jpg" width="90%" height="350"></div>
          <div class="carousel-item">
            <img class="d-block img-fluid"><img src="img/13.jpg" width="90%" height="350">
          </div>
        </div>
        <a class="carousel-control-prev" href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="https://blackrockdigital.github.io/startbootstrap-shop-homepage/#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">
        <iframe id="iframe_target" width="100%" height="2000px" name="iframe_target" frameborder="0" src="Notebook.php"  > </iframe>
      </div>
          <!-- /.row -->
    </div>
        <!-- /.col-lg-9 -->
  </div>
      <!-- /.row -->

</div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright © Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

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
         <h4 style="text-align:center"><b>Login</b></h4>
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
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
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


<script src="js/index.js"></script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
</body>
</html>