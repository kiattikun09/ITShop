<?php require_once('../Connections/Myconnec.php'); ?>
<?php include("dw-upload.inc.php"); ?>
<?php include('check-login.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE products SET pro_name=%s, cat_id=%s, brand_id=%s, ge_id=%s, price=%s, quantity=%s, detail=%s, imag=%s, imagtwo=%s, imagthree=%s WHERE pro_id=%s",
                       GetSQLValueString($_POST['pro_name'], "text"),
                       GetSQLValueString($_POST['categories'], "int"),
					   GetSQLValueString($_POST['brand'], "int"),
					   GetSQLValueString($_POST['gen'], "int"),
                       GetSQLValueString($_POST['price'], "varchar"),
                       GetSQLValueString($_POST['quantity'], "int"),
                       GetSQLValueString($_POST['detail'], "text"),
                       GetSQLValueString(dwUpload($_FILES['imag']), "text"),
					   GetSQLValueString(dwUpload($_FILES['imagtwo']), "text"),
					   GetSQLValueString(dwUpload($_FILES['imagthree']), "text"),
                       GetSQLValueString($_POST['pro_id'], "int"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($updateSQL, $Myconnec) or die(mysql_error());

  $updateGoTo = "products.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Update_Recordset = "-1";
if (isset($_GET['pro_id'])) {
  $colname_Update_Recordset = $_GET['pro_id'];
}
mysql_select_db($database_Myconnec, $Myconnec);
$query_Update_Recordset = sprintf("SELECT * FROM products WHERE pro_id = %s", GetSQLValueString($colname_Update_Recordset, "int"));
$Update_Recordset = mysql_query($query_Update_Recordset, $Myconnec) or die(mysql_error());
$row_Update_Recordset = mysql_fetch_assoc($Update_Recordset);
$totalRows_Update_Recordset = mysql_num_rows($Update_Recordset);

mysql_free_result($Update_Recordset);
?>
<?php include("TopicsTeat.php"); ?>
<form action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">id:</td>
      <td><?php echo $row_Update_Recordset['pro_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ชื่อสินค้า:</td>
      <td><input type="text" name="pro_name" value="<?php echo htmlentities($row_Update_Recordset['pro_name'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ประเภท:</td>
      <td><script language=Javascript>
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
                        <option value="0">-cat_name -</option>
                    </select> </span>
                    <span id="brand">
                    <select>
                        <option value='0'>- brand -</option>
                    </select></span>
           <span id="gen">
                    <select>
                        <option value='0'>- gen -</option>
                    </select></span>
             </p>  
             </tr>
           
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ราคา:</td>
      <td><input type="text" name="price" value="<?php echo htmlentities($row_Update_Recordset['price'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">จำนวสินค้า:</td>
      <td><input type="text" name="quantity" value="<?php echo htmlentities($row_Update_Recordset['quantity'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">รายละเลียดl:</td>
      <td><textarea name="detail" cols="50" rows="5"><?php echo htmlentities($row_Update_Recordset['detail'], ENT_COMPAT, ''); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">รูปภาพที่ 1:</td>
      <td><input type="file" name="imag" value="<?php echo htmlentities($row_Update_Recordset['imag'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">รูปภาพที่ 2:</td>
      <td><input type="file" name="imagtwo" value="<?php echo htmlentities($row_Update_Recordset['imagtwo'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">รูปภาพที่ 3:</td>
      <td><input type="file" name="imagthree" value="<?php echo htmlentities($row_Update_Recordset['imagthree'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="pro_id" value="<?php echo $row_Update_Recordset['pro_id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>