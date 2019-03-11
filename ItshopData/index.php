<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style type="text/css">
body {
	background-position: left top;
	background-image: url(images/gg.jpg);
	background-repeat: no-repeat;
	width: 100%;
	height: 100%;
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
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<div class="container">
    <div class="row">
    <div class="span4 offset4 well">
        <legend align="center"  > <b> Please Sign In</b></legend>
        <div class="alert alert-info" align="center"> </div>
        <form  name="form1" method="post" action="check-login.php" accept-charset="UTF-8" onsubmit="javascript:return checkNull();">
        <input type="text" id="username" class="span4" name="username" placeholder="Username">
        <input type="password" id="password" class="span4" name="password" placeholder="Password">
        <button type="submit" name="lgin" class="btn btn-info btn-block" value="Sign in" >Sign in</button>
        <button name="register" value="register" type="submit" class="btn btn-danger btn-block" onclick="MM_goToURL('parent','register.php');return document.MM_returnValue" >register</button>
      </form>
      </div>
  </div>
  </div>
</body>
</html>