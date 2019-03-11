<?php require_once('../Connections/Myconnec.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE customers SET `user`=%s, email=%s, status=%s, password=%s, firstname=%s, lastname=%s, `prefix`=%s, sex=%s, address=%s, phone=%s WHERE cust_id=%s",
                       GetSQLValueString($_POST['user'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['prefix'], "int"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['cust_id'], "int"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($updateSQL, $Myconnec) or die(mysql_error());

  $updateGoTo = "../ItShopOn/member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_ReUp = "-1";
if (isset($_GET['cust_id'])) {
  $colname_ReUp = $_GET['cust_id'];
}
mysql_select_db($database_Myconnec, $Myconnec);
$query_ReUp = sprintf("SELECT * FROM customers WHERE cust_id = %s", GetSQLValueString($colname_ReUp, "int"));
$ReUp = mysql_query($query_ReUp, $Myconnec) or die(mysql_error());
$row_ReUp = mysql_fetch_assoc($ReUp);
$totalRows_ReUp = mysql_num_rows($ReUp);
?>
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
            
          </ul>
        </div>
      </div>
    </nav>
    <!--ส่วนแก้ไข-->
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>&nbsp;
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">Cust_id:</td>
              <td><?php echo $row_ReUp['cust_id']; ?></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">User:</td>
              <td><input type="text" name="user" value="<?php echo htmlentities($row_ReUp['user'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Email:</td>
              <td><input type="text" name="email" value="<?php echo htmlentities($row_ReUp['email'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Status:</td>
              <td><input type="text" name="status" value="<?php echo htmlentities($row_ReUp['status'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Password:</td>
              <td><input type="text" name="password" value="<?php echo htmlentities($row_ReUp['password'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Firstname:</td>
              <td><input type="text" name="firstname" value="<?php echo htmlentities($row_ReUp['firstname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Lastname:</td>
              <td><input type="text" name="lastname" value="<?php echo htmlentities($row_ReUp['lastname'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Prefix:</td>
              <td><input type="text" name="prefix" value="<?php echo htmlentities($row_ReUp['prefix'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Sex:</td>
              <td><input type="text" name="sex" value="<?php echo htmlentities($row_ReUp['sex'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Address:</td>
              <td><input type="text" name="address" value="<?php echo htmlentities($row_ReUp['address'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Phone:</td>
              <td><input type="text" name="phone" value="<?php echo htmlentities($row_ReUp['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Update record"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_update" value="form1">
          <input type="hidden" name="cust_id" value="<?php echo $row_ReUp['cust_id']; ?>">
        </form>
        <p>&nbsp;</p>
      </h3>
    </div>
  </div>
</div>

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
<?php
mysql_free_result($ReUp);
?>
