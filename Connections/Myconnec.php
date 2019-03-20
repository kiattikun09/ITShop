<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Myconnec = "localhost";
$database_Myconnec = "itshop";
$username_Myconnec = "root";
$password_Myconnec = "0898061748";
$Myconnec = mysql_pconnect($hostname_Myconnec, $username_Myconnec, $password_Myconnec) or trigger_error(mysql_error(),E_USER_ERROR); 
?>