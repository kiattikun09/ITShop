<!DOCTYPE html>
<!-- saved from url=(0064)https://blackrockdigital.github.io/startbootstrap-shop-homepage/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
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
</head>

  <body>
<?php
session_start();
	$cust_id = $_SESSION['cust_id'];
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];
?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../ItShopOn/index.php">IT SHOP LOPBURI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
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
             <?php
			 	$get_id=isset($_GET['pro_id']);
				$sql = "select * from products WHERE pro_id = '".$get_id."'";
      			$query = mysqli_query($conn,$sql);
				if($query){
					echo $query;
				}
				else{
					echo "error";
					}
             ?>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content --><!-- TemplateBeginEditable name="ส่วนที่ต้องแก้ไข" -->
    <div class="container">
    	<div class="row">
        	<div class="col-md"></div>
            <div class="col-md">
            	
            </div>
            <div class="col-md"></div>
        </div>
    </div>
    <!-- TemplateEndEditable --><!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright © Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

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