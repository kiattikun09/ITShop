<?php require_once('../Connections/Myconnec.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO customers (`user`, password, email, firstname, lastname, sex, `prefix`, phone, address) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['user'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['prefix'], "int"),
                       GetSQLValueString($_POST['phone'], "int"),
                       GetSQLValueString($_POST['address'], "text"));

  mysql_select_db($database_Myconnec, $Myconnec);
  $Result1 = mysql_query($insertSQL, $Myconnec) or die(mysql_error());

  $insertGoTo = "../ItShopOn/index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style type="text/css">
 a:link {
	color: #FF0000;
}
 a:hover {
	color: #FF0000;
}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
  </script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center" class="bg-danger">
    <h3 class="alert"><strong>สมัครสมาชิก</strong>  </h3>
  </div>
</form>
<form action="<?php echo $editFormAction; ?>" method="post"onSubmit="return check()" name="form2" id="form2">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">User:</td>
      <td><input type="text" name="user" value="" size="32" placeholder="ชื่อ Login"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="password" name="password" value="" size="32"  placeholder="รหัสผ่าน"/></td>
    </tr>
     <tr>
        <td> &nbsp;Confirm Password</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword">
        </td>
        </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="" size="32"  placeholder="อีเมล์"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Firstname:</td>
      <td><input type="text" name="firstname" value="" size="32" placeholder="ชื่อ" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lastname:</td>
      <td><input type="text" name="lastname" value="" size="32" placeholder="นามสกุล" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sex:</td>
      <td valign="baseline"><table width="76">
        <tr>
          <td width="63" height="25"><input type="radio" name="sex" value="m" />
            ชาย</td> </tr> <tr><td><input type="radio" name="sex" value="f" />
            หญิง</td>
       
          
        </tr>
      </table></td>
       
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Prefix:</td>
      <td><select name="prefix">
        <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>นาย</option>
        <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>นาง</option>
        <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>นางสาว</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Phone:</td>
      <td><input type="text" name="phone" value="" size="32"  placeholder="เบอร์โทร"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Address:</td>
      <td><textarea name="address" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Save" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  
<script language="javascript">
  function check(){
	  if(document.form2.user.value==""){
		  alert("!!!กรุณากรอกชื่อผู้ใช้เพื่อใช้ในการ Login ด้วยจ้า");
		  document.form2.user.focus();
		  return false;
		  }
		  else if((document.form2.password.value=="")){
		  alert("!!!กรุณากรอกรหัสผ่านด้วยจ้า");
		  document.form2.password.focus();
		  return false;
		  }
		  if(document.form2.password.value != document.form2.txtConPassword.value)
	{
		alert('Confirm Password Not Match');
		document.form2.txtConPassword.focus();		
		return false;
	}
		    else if((document.form2.email.value=="")){
		  alert("!!!กรุณากรอก E-mail ด้วยจ้า");
		  document.form2.email.focus();
		  return false;
			}
		    else if((document.form2.firstname.value=="")){
		  alert("!!!กรุณากรอกชื่อ ด้วยจ้า");
		  document.form2.firstname.focus();
		  return false;
			}
		    else if((document.form2.lastname.value=="")){
		  alert("!!!กรุณากรอก นามสกุล ด้วยจ้า");
		  document.form2.lastname.focus();
		  return false;
			}
		   else if((document.form2.phone.value=="")){
		  alert("!!!กรุณากรอก เบอร์โทร ด้วยจ้า");
		  document.form2.phone.focus();
		  return false;
			}
		  else if((document.form2.address.value=="")){
		  alert("!!!กรุณากรอก ที่อยู่ปัจจุบัน ด้วยจ้า");
		  document.form2.address.focus();
		  return false;
			}
		else if(isNaN(document.form2.password.value)){
		  alert("!!!กรุณากรอก รหัสผ่านเป็ฯตัวเลข ด้วยจ้า");
		  document.form2.password.focus();
		  return false;
			}
		else if(form2.email.value.indexOf('@')==-1){
		  alert("!!!อีเมล์ของคุณไม่ถูกต้อง ตัวอย่างเชาน XXXX@XXXXXXX.XXX");
		  document.form2.email.focus();
		  return false;
			}  	
		  return true;;mysql_select_db("it_shop");
		  }           		  
</script>
		  
	

  <input type="hidden" name="MM_insert" value="form2" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp; </p>
<div class="container">
    <div class="row"></div>
</div>
</body>
</html>