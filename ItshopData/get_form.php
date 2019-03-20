<?php
    include "config.php";
    conndb();

    $cat_id = $_POST['categories'];
    $brand_id = $_POST['brand'];
    $ge_id = $_POST['gen'];

    $sql_1 = "SELECT * FROM categories WHERE cat_id = '$cat_id' ";
    $result_1 = mysql_query($sql_1);
    $row_1 = mysql_fetch_array($result_1);
    $cat_name = $row_1['cat_name'];

    $sql_2 = "SELECT * FROM brand WHERE brand_id = '$brand_id' ";
    $result_2 = mysql_query($sql_2);
    $row_2 = mysql_fetch_array($result_2);
    $brand_name = $row_2['brand_name'];

    $sql_3 = "SELECT * FROM gen WHERE ge_id = '$ge_id' ";
    $result_3 = mysql_query($sql_3);
    $row_3 = mysql_fetch_array($result_3);
    $ge_name = $row_3['ge_name'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drop Down menu เลือกจังหวัด, อำเภอ, ตำบล ของประเทศไทย โดย www.itangmo.com</title>
        <meta name="description" content="ไอ้แตงโมดอทคอม แจกแอพฟรีประจำวัน สอนทำเว็บไซต์ ด้วย php,ajax,jquery,css,css3,HTML5 แบบง่ายสุดๆ"/>
        <meta name="keywords" content="app ฟรีประจำวัน,สอนทำเว็บไซต์ฟรี,สอนทำเว็บ,สอนทำเว็บไซต์,php,html5,css,css3,jquery,ajax,สอนทำเว็บไซต์ด้วย php,Drop Down menu เลือกจังหวัด"/>
    </head>
    <body>
        <h3>Drop Down menu เลือกจังหวัด, อำเภอ, ตำบล ของประเทศไทย</h3>
        <p>โดย <a href="http://www.itangmo.com" title="Drop Down menu เลือกจังหวัด, อำเภอ, ตำบล ของประเทศไทย">www.itangmo.com</a></p>
        <p>จังหวัด : <?php echo $cat_name." (".$cat_id.")"; ?></p>
        <p>อำเภอ : <?php echo $brand_name." (".$brand_id.")"; ?></p>
        <p>ตำบล : <?php echo $ge_name." (".$ge_id.")"; ?></p>
    </body>
</html>
