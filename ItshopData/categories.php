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

$maxRows_Cat = 10;
$pageNum_Cat = 0;
if (isset($_GET['pageNum_Cat'])) {
  $pageNum_Cat = $_GET['pageNum_Cat'];
}
$startRow_Cat = $pageNum_Cat * $maxRows_Cat;

mysql_select_db($database_Myconnec, $Myconnec);
$query_Cat = "SELECT * FROM categories";
$query_limit_Cat = sprintf("%s LIMIT %d, %d", $query_Cat, $startRow_Cat, $maxRows_Cat);
$Cat = mysql_query($query_limit_Cat, $Myconnec) or die(mysql_error());
$row_Cat = mysql_fetch_assoc($Cat);

if (isset($_GET['totalRows_Cat'])) {
  $totalRows_Cat = $_GET['totalRows_Cat'];
} else {
  $all_Cat = mysql_query($query_Cat);
  $totalRows_Cat = mysql_num_rows($all_Cat);
}
$totalPages_Cat = ceil($totalRows_Cat/$maxRows_Cat)-1;

mysql_select_db($database_Myconnec, $Myconnec);
$query_brand = "SELECT * FROM brand";
$brand = mysql_query($query_brand, $Myconnec) or die(mysql_error());
$row_brand = mysql_fetch_assoc($brand);
$totalRows_brand = mysql_num_rows($brand);

mysql_select_db($database_Myconnec, $Myconnec);
$query_gen = "SELECT * FROM gen";
$gen = mysql_query($query_gen, $Myconnec) or die(mysql_error());
$row_gen = mysql_fetch_assoc($gen);
$totalRows_gen = mysql_num_rows($gen);

$query_Cat = "SELECT * FROM categories";
$Cat = mysql_query($query_Cat, $Myconnec) or die(mysql_error());
$row_Cat = mysql_fetch_assoc($Cat);
$totalRows_Cat = mysql_num_rows($Cat);

// catadd
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO categories (cat_name) VALUES (%s)",
                       GetSQLValueString($_POST['name'], "text"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($insertSQL, $Myconnec) or die(mysql_error());

  $insertGoTo = "categories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
</head>
<?php include('check-login.php'); ?>
<?php include('TopicsTeat.php'); ?>
<body> 


<div class="container">
  <div class="row">
    <div class="col-sm-3">
    <h2 align="left">ประเภทสินค้า</h2>
    <div align="left">
      <table width="209" class="well table-condensed">
        <thead>
          <tr>

            <th width="121"><div align="center">name</div></th>           
        <th width="121"><div align="center"></div></th>  
            
        <!-- Trigger the modal with a button -->
        <div class="container">
			<th width="122"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#mymodal">เพิ่ม</button></th>
            </tr>
            
            <!-- Modal  categories-->
  <div class="modal fade" id="mymodal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo $editFormAction; ?>" method="post" name="form1">
          ซื่อประเภอสินค้า:
            <div class="form-group"><input type="text"class="form-control" name="name" id="name"placeholder="categories" /></div>
             <div align="Right"><input type="submit" name="btncategories" id="btncategories"  value="ยืนยัน" /> </div>

             <input type="hidden" name="MM_insert" value="form1" />
          </form>
        </div>
        <div class="modal-footer">
        
        </div>
      </div>
    </div>
    </div>
</div>
</div>
            
          <tbody>
            <?php do { ?>
              <tr>
                
                <td><div align="center"><?php echo $row_Cat['cat_name']; ?></div></td>
                <td width="28"><div align="center"><a href="categories-delete.php?cat_id=<?php echo $row_Cat['cat_id']; ?>"><button  class="btn btn-danger"onclick="myFunction()">ลบ</button></a></div></td>
                
                <td width="44"><div align="center"><a href="categories-Up.php?cat_id=<?php echo $row_Cat['cat_id']; ?>" rel="modal:open"><button  class="btn btn-primary">แก้ไข</button></a></div></td>
              </tr>
              <?php } while ($row_Cat = mysql_fetch_assoc($Cat)); ?>
          </tbody>
      </table>
    </div>
    </div>
    <div class="col-sm-4">
      <h2 align="left">แบรนด์สินค้า</h2>
      <div align="left">
        <table width="344"  class="well table-condensed">
          <thead><tr>
  
            <th width="98"><div align="center">ประเภท id</div></th>
            <th width="152"><div align="center">แบรนด์</div></th>
            <th width="28"><div align="center"></div></th>
            <div class="container">
			<th width="122"><a href="brand-add.php"><button type="button" class="btn btn-warning" >เพิ่ม</button></a></th>
            </tr>
          <tbody>
            <?php do { ?>
              <tr>
               
                <td><div align="center"><?php echo $row_brand['cat_id']; ?></div></td>
                <td><div align="center"><?php echo $row_brand['brand_name']; ?></div></td>
                <td width="28"><div align="center"><a href="brand-delete.php?brand_id=<?php echo $row_brand['brand_id']; ?>"><button  class="btn btn-danger"onclick="myFunction()">ลบ</button></a></div></td>
                <td width="46"><div align="center"><a href="brand-Up.php?brand_id=<?php echo $row_brand['brand_id']; ?>"><button  class="btn btn-primary">แก้ไข</button></a></div></td>
              </tr>
              <?php } while ($row_brand = mysql_fetch_assoc($brand)); ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-sm-3">
     <h2 align="left">รุ่นสินค้า</h2>
     <div align="left">
       <table width="478" class="well table-condensed">
         <thead>
           <tr>
             
             <th width="100"><div align="center">แบรนด์ id</div></th>
             <th width="100"><div align="center">ประเภท id</div></th>
             <th width="167"><div align="center">รุ่น</div></th>
             <th width="167"><div align="center"></div></th>
             <div class="container">
			        <th width="122"><a href="gen-add.php"><button type="button" class="btn btn-warning" >เพิ่ม</button></a></th>
             </div>
            </tr>
          <tbody>
            <?php do { ?>
              <tr>
                
                <td><div align="center"><?php echo $row_gen['brand_id']; ?></div></td>
                <td><div align="center"><?php echo $row_gen['cat_id']; ?></div></td>
                <td><div align="center"><?php echo $row_gen['ge_name']; ?></div></td>
                <td width="37"><div align="center"><a href="gen-delete.php?ge_id=<?php echo $row_gen['ge_id']; ?>"><button  class="btn btn-danger"onclick="myFunction()">ลบ</button></a></div></td>
                <td width="50"><div align="center"><a href="gen-Up.php?ge_id=ge_id"><button  class="btn btn-primary">แก้ไข</button></a></div></td>
              </tr>
              <?php } while ($row_gen = mysql_fetch_assoc($gen)); ?>
          </tbody>
       </table>
     </div>
    </div>
  </div>
</div>

<script>
function myFunction() {
  alert("ยืนยันการลบรายการนี้!!!");
}
</script>

</body>
</html>
<?php
mysql_free_result($Cat);

mysql_free_result($brand);

mysql_free_result($gen);
?>







