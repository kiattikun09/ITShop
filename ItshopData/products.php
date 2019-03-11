<?php require_once('../Connections/Myconnec.php'); ?>
<?php include('check-login.php'); ?>
<?php include("dw-upload.inc.php");?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  

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

mysql_select_db($database_Myconnec, $Myconnec);
$query_Recordset1 = "SELECT cat_id, pro_name, detail, price, quantity, brand_id, ge_id, imag, imagtwo, imagthree FROM products";
$Recordset1 = mysql_query($query_Recordset1, $Myconnec) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_Myconnec, $Myconnec);
$query_Recordset1 = "SELECT products.pro_id,categories.cat_name,brand.brand_name,products.pro_name,products.detail,products.price,products.quantity,products.imag,products.imagtwo,products.imagthree FROM categories,products,brand WHERE products.cat_id = categories.cat_id and products.brand_id=brand.brand_id";
$Recordset1 = mysql_query($query_Recordset1, $Myconnec) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);;


?>

<?php include("dblink.php");?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

 

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO products (pro_name, cat_id, brand_id, 	ge_id, price, quantity, detail, imag, imagtwo, imagthree) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['pro_name'], "text"),
                       GetSQLValueString($_POST['categories'], "int"),
					   GetSQLValueString($_POST['brand'], "int"),
					   GetSQLValueString($_POST['gen'], "int"),
                       GetSQLValueString($_POST['price'], "varchar"),
                       GetSQLValueString($_POST['quantity'], "int"),
                       GetSQLValueString($_POST['detail'], "text"),
                       GetSQLValueString(dwUpload($_FILES['imag']), "text"),
					   GetSQLValueString(dwUpload($_FILES['imagtwo']), "text"),
					   GetSQLValueString(dwUpload($_FILES['imagthree']), "text"));
					   

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($insertSQL, $Myconnec) or die(mysql_error());

  $insertGoTo = "products.php";
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
  <title>products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  	.lickColor{
		color:#FFFFFF;
		text-decoration:none;
		}
	A:link	{
		color:#FFFFFF;
		text-decoration:none;
		}
	A:visited{
		color:#FFFFFF;
		text-decoration:none;
		}
	img:hover{
		transform: scale(2.5); 
		transition-duration:0.5s;
		}		
  </style>
</head>

<?php include("TopicsTeat.php"); ?>

<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 align="center" class="modal-title" id="exampleModalLabel">Add Products</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" onSubmit="return check()" name="form" id="form" >
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">ชื่อสินค้า:</td>
              <td><p><input class="form-control" type="text" name="pro_name" value="" size="32" placeholder="ชื่อสินค้า"placeholder="ชื่อสินค้า"></p></td>
              
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">ประเภท:</td>
              <td><p>
                 <html> <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('categories', -1);     
    </script>
    <!-- <body> -->
     
        <form name="form" method="post" action="get_form.php">
            <p> <span id="categories">
                    <select>
                        <option value="0">- ประเภทสินค้า -</option>
                    </select> </span>
                    <span id="brand">
                    <select>
                        <option value='0'>- แบรนด์สินค้า -</option>
                    </select></span>
          			<span id="gen">
                    <select>
                        <option value='0'>- รุ่นสินค้า -</option>
                    </select></span></form>
          </p>  
            </tr>
            </p>
            <tr valign="baseline">
              <td nowrap align="right">ราคาสินค้า:</td>
              <td><p><input name="price" type="text" class="form-control" value="" size="32"placeholder="ราคาสินค้า"></p></td>
          </tr>
            <tr valign="baseline">
              <td nowrap align="right">จำนวนสินค้า:</td>
              <td><p><input name="quantity" type="text" class="form-control" value="" size="32"placeholder="จำนวนสินค้า"></p></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right" valign="top">รายละเอียดสินค้า:</td>
              <td><p><textarea name="detail" cols="50" rows="5"placeholder="รายละเอียด"></textarea></p></td>
            </tr>
            <tr valign="baseline">
              <td height="30" align="right" nowrap><p>
                <label for="imag">รูปภาพที่หนึ่ง :</label>
                </p>
                <p>
                  <label for="prdimgtwo">รูปภาพที่สอง :</label>
                </p>
                <p>
                  <label for="prdimgthree">รูปภาพที่สาม :</label>
                </p></td>
              <td align="left"><p><input type="file" name="imag" id="imag"<?=$row['imag'];?>/></p>
              <p>
                <input type="file" name="imagtwo" id="imagtwo"<?=$row['imagtwo'];?>/>
              </p>
              <p>
                <input type="file" name="imagthree" id="imagthree"<?=$row['imagthree'];?>/>
              </p></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td>
              <input type="submit" class="btn btn-success" value="ยืนยัน">
              &nbsp;
              <input type="button" class="btn btn-danger" value="ยกเลิก" data-dismiss="modal">
              </td>
              
            </tr>
          </table>
          
          <script language="javascript">
  function check(){
	  if(document.form.pro_name.value==""){
		  alert("!!!กรุณากรอกชื่อผู้ใช้เพื่อใช้ในการ Login ด้วยจ้า");
		  document.form.pro_name.focus();
		  return false;
		  }
		    else if((document.form.price.value=="")){
		  alert("!!!กรุณากรอก ราคา ด้วยจ้า");
		  document.form.price.focus();
		  return false;
			}
		    else if((document.form.quantity.value=="")){
		  alert("!!!กรุณากรอก จำนวนสินค้า ด้วยจ้า");
		  document.form.quantity.focus();
		  return false;
			}
		    else if((document.form.detail.value=="")){
		  alert("!!!กรุณากรอก รายละเอียด ด้วยจ้า");
		  document.form.detail.focus();
		  return false;					
			}  	
		  return true;;mysql_select_db("itshop");
		  }
   		  
</script>
          
          <input type="hidden" name="MM_insert" value="form1">
        </form>
        <p>&nbsp;</p>
      </h3>
    </div>
    <div class="col-sm-4"></div>
        
        

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div> -->
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

<form name="form1" method="post" action="show-search.php">
  <label for="search"></label>
  <div align="left">
 
  </div>
  <div >
   
    <div align="right">
      ค้นหาสินค้า: 
      <input type="text" name="search" id="search2"placeholder="ชื่อสินค้า">
      <input type="submit" name="btnsearch" id="btnsearch" value="ตกลง">

         <!-- Button trigger modal -->
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="">Add</button>
    </div>



  </div>
</form>
<div class="container">
  <?php do { ?>
    <table width="119%" height="100" class="table">
      <thead>
        <tr>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">
        <tr>
          <td height="48"><table width="657" height="130">
              <tr>
                <th scope="col"> <div align="left">
                <?php
					if($row_Recordset1['imag'] != null){
						echo "<img src='img-products/".$row_Recordset1['imag']."' style='width : 200px;' >&nbsp;&nbsp;";
						}
					if($row_Recordset1['imagtwo'] != null){
						echo "<img src='img-products/".$row_Recordset1['imagtwo']."' style='width : 200px;'>&nbsp;&nbsp;";
						}
					if($row_Recordset1['imagthree'] != null){
						echo "<img src='img-products/".$row_Recordset1['imagthree']."' style='width : 200px;'>&nbsp;&nbsp;";
						}	 
				?>
              
              

               <!--<img src="img-products/<?php //echo $row_Recordset1['imag']; ?>" width="149" height="117">
                <img src="img-products/<?php //echo $row_Recordset1['imagtwo']; ?>" width="134" height="117">
                <img src="img-products/<?php //echo $row_Recordset1['imagthree']; ?>" width="150" height="114">--> 
                  <table width="635">
                    <tr>
                      <th scope="col"><font color=\"red\">ชื่อ : </font><?php $productItem = $row_Recordset1['pro_name']; echo $row_Recordset1['pro_name']; ?></th>
                      </tr>
                    <tr>
                      <th scope="row"><table width="636">
                        <tr>
                          <th width="160" scope="col"><font color=\"red\">ประเภท : </font><?php echo $row_Recordset1['cat_name']; ?></th>
                          <th width="180" scope="col"><font color=\"red\">แบรนด์ : </font><?php echo $row_Recordset1['brand_name']; ?></th>
                          <th width="280" scope="col">&nbsp;</th>
                          </tr>
                        </table></th>
                      </tr>
                    <tr>
                      <th scope="row"><table width="384">
                        <tr>
                          <th width="149" scope="col"><font color=\"red\"> ราคา :</font><?php echo $row_Recordset1['price']; ?></th>
                          <th width="196" scope="col"><font color=\"red\">จำนวน :</font><?php echo $row_Recordset1['quantity']; ?></th>
                          </tr>
                        </table></th>
                      </tr>
                    <tr>
                      <th scope="row"><font color=\"red\">รายละเอียด : </font><?php echo $row_Recordset1['detail']; ?></th>
                      </tr>
                    <tr>
                      <th scope="row"><table width="200">
                        <tr>
                          <th scope="col"><div align="center"class="btn btn-success"><a href="products-Up.php?pro_id=<?php $deleteItem = $row_Recordset1['pro_id']; echo $row_Recordset1['pro_id']; ?>">Update</a></div></th>
                          <th scope="col">
                          <div align="center"class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">
                          	Delete
                          </div>
                          </th>
                          </tr>
                        </table></th>
                      </tr>
          </table>
                </div></th>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td></td>
        </tr>
      </tbody>
    </table>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">ต้องการลบรายการนี้?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4><?php echo $productItem?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"><a href="products-delete.php?pro_id=<?php echo $deleteItem; ?>">Delete</a></button>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<?php
mysql_free_result($Recordset1);
?>
