<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    include "config.php";
    conndb();

    $data = $_GET['data'];
    $val = $_GET['val'];


         if ($data=='categories') { 
              echo "<select name='categories' onChange=\"dochange('brand', this.value)\">";
              echo "<option value='0'>- categories -</option>\n";
              $result=mysql_query("select * from categories order by cat_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[cat_id]' >$row[cat_name]</option>" ;
              }
         } else if ($data=='brand') {
              echo "<select name='brand' onChange=\"dochange('gen', this.value)\">";
              echo "<option value='0'>- brand -</option>\n";                             
              $result=mysql_query("SELECT * FROM brand WHERE cat_id= '$val' ORDER BY brand_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[brand_id]\" >$row[brand_name]</option> " ;
              }
         } else if ($data=='gen') {
              echo "<select name='gen'>\n";
              echo "<option value='0'>- gen -</option>\n";
              $result=mysql_query("SELECT * FROM gen WHERE brand_id= '$val' ORDER BY ge_name");
              while($row = mysql_fetch_array($result)){
                   echo "<option value=\"$row[brand_id]\" >$row[ge_name]</option> \n" ;
              }
         }
         echo "</select>\n";

        echo mysql_error();
        closedb();
?>