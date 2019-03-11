<?php require_once('../Connections/Myconnec.php'); ?>
<?php include("dw-upload.inc.php");?>
<?php include("dblink.php");?>
<?php include("check-login.php");?>
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
<div class="container">
?php include("TopicsTeat.php");?
  <div class="row">
    <div class="col-sm-3">
      <h3></h3>
      <p></p>
      <p></p>
    </div>
    <div class="col-sm-4">
      <h3>&nbsp;
        <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1">
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">ชื่อสินค้า:</td>
              <td><p><input class="form-control" type="text" name="pro_name" value="" size="32" placeholder="ชื่อสินค้า"></p></td>
              
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
    <body>
     
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
                    </select></span>
             </p>  
            </tr>
            </p>
            <tr valign="baseline">
              <td nowrap align="right">ราคาสินค้า:</td>
              <td><p><input name="price" type="text" class="form-control" value="" size="32"></p></td>
          </tr>
            <tr valign="baseline">
              <td nowrap align="right">จำนวนสินค้า:</td>
              <td><p><input name="quantity" type="text" class="form-control" value="" size="32"></p></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right" valign="top">รายละเอียดสินค้า:</td>
              <td><p><textarea name="detail" cols="50" rows="5"></textarea></p></td>
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
                <input type="file" name="imagthree" id="imagthree"<?=$row['imagthree'];?> />
              </p></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="ยืนยัน"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1">
        </form>
      </h3>
    </div>
    <div class="col-sm-4"></div>
 
    
  </div>
</div>
</body></html>