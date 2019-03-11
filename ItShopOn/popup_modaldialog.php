<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    
	<!-- สามารถไปดาวน์โหลดมาไว้ใน server ได้เลย -->
    <link rel="stylesheet" href="http://www.jacklmoore.com/colorbox/example1/colorbox.css" />
  <body>
  <!-- นับเวลาถอยหลัง -->

  
  <!--จะโหลดมาไว้ใน  server  หรือใช้แบบนี้ก็ได้ -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script><script>
      function openColorBox(){
		  //กำหนดขนาดและหน้าเว็บที่จะแสดงใน popup สามารถใส่เป็นภาพก็ได้นะครับ
        $.colorbox({iframe:true, width:"350px", height:"250px", href: "index.php"});
      }
      
      function countDown(){
        seconds--
        $("#seconds").text(seconds);
        if (seconds === 0){
          openColorBox();
          clearInterval(i);
        }
      }
      //กำหนดเวลา วินาทีที่จะให้ popup ทำงาน 
      var seconds = 2,
          i = setInterval(countDown, 1000);
    </script>
</body>
</html>

</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3><li><a href="#"><span class="glyphicon glyphicon-log-in" id="myBeer"> เพื่ม</a></span></li></h3>

  <div align="right"><!-- Trigger the modal with a button -->

    
    <!-- Modal -->
  </div>
  <div class="modal fade" id="mynim" role="dialog">
    <div class="modal-dialog">
     
      <div align="right">
      
        
        <!-- Modal content-->
      </div>
      <div class="modal-content"> 
 <?php include("register.php"); ?>
</div>
</div>
</div>

<div align="right"> </div>

<script>
$(document).ready(function(){
    $("#myBeer").click(function(){
        $("#mynim").modal();
    });
});
</script>

   
  </div>
</div>

</body>
</html>
