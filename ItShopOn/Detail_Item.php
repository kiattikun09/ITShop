<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- dropdown img -->
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
#myImag1 {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
#myImgg2 {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}
#myImag1:hover {opacity: 0.7;}
#myImgg2:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
.table {
	font-size: 10px;
}
</style>
<style type="text/css">
.table tr th {
	font-size: 14px;
}
</style>
<!-- จบ dropdown -->
</head>

<body>

             <?php
			 	include_once('connect.php');
         $pro_id =  $_GET["pro_id"];
         
			 	//$get_id=isset($_GET['pro_id']);
        // echo $pro_id + "pro_id";
        // echo $cust_id + "cus_id";
				$sql = "select * from products WHERE pro_id = ".$pro_id."";
				//echo $sql;
      			$query = mysqli_query($conn,$sql);
				if($query){
					//echo "queried";
					$getRows = mysqli_fetch_array($query);
					//echo $getRows["pro_name"];
				}
				else{
					//echo "fuck";
					}
             ?><tbody>
             <div class="container-fulid">
           	   <div class="row">
                   <div class="col-md">
              <div align="center"style="margin-right: 50px;margin-left: 25px;">
                <div align="left">
                  <table width="70%" height="90;"  style="border-radius: 5px; &lt;!--border:5px Red solid--&gt;;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 20px 0 rgba(0, 0, 0, 0.19);">
                                   
                    <tr class="info">
                    <tr>                     
                      <th scope="col"> <div align="lift" style="margin-right: 0px;">
                         <!-- <div align="left"> -->
                          <div align="left">
                            <table width="979" border="0">
                              <tr>
                                <th width="243" scope="col"><div align="left">
                                  <table width="231">
                                      <tr>
                                         <th scope="col"><div align="center"><img src="../ItshopData/img-products/<?php echo $getRows['imag']; ?>"alt="Snow" width="108%" height="237" id="myImg" style="width:100%;max-wdith:90px;" /></div></th>
                                    </tr>
                                         <tr>
                                           <th scope="row"><div align="center">
                                             <table width="208">
                                               <tr>
                                                 <th width="90" scope="col"><img src="../ItshopData/img-products/<?php echo $getRows['imagtwo']; ?>" alt="Snow" width="112%" height="104" id="myImag1" style="width:100%;max-width:90px" /></th>
                                                 <th width="106" scope="col"><img src="../ItshopData/img-products/<?php echo $getRows['imagthree']; ?>"alt="Snow" width="109%" height="95" id="myImgg2" style ="width:100%; max-width:90px"/>
                                                   
                                                   
                                                   
                                                 </th>
                                               </tr>
                                             </table>
                                           </div></th>
                                    </tr>
                                  </table>
                                                 </div></th>
                                               <th width="541" scope="col"><p><h3><font color=\"red\"> </font>&nbsp;<?php echo $getRows['pro_name']; ?></h3></p>
                                                 <p>&nbsp;</p
                                               >
                                                 <p align="Letf"><font color=""> สินค้ามี : </font><?php echo $getRows['quantity']; ?> ชิ้น  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลือกจำนวน : 
                                                 <input type="text" name="amount" id="amount" value="" style="text-align:right;width:20px;" >&nbsp;ชื้น</p>
                                                 <p>&nbsp;</p>
                                                 <h1><font color="/&quot;red/&quot;">:฿<?php echo $getRows['price']; ?></font></h1>
                                                 <table width="437" border="0">
                                                   <tr>
                                                     <th scope="col">&nbsp;</th>
                                                     <th scope="col">&nbsp;</th>
                                                   </tr>
                                                 </table>
                                                 <p>&nbsp;</p>
                                                 <p><a href="notebook.php" style="text-decoration: none;color:snow;"><button type="button" class="btn btn-warning" style="width:45%">ย้อนกลับ</button>
                                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_id;?>">
                                                   <button  class="btn btn-success" type="sumbit"style ="width : 45%" onclick="calculate()" >ใส่ตะกร้า</button>
                                                 </p>
                                               </th>
                              </tr>
                            </table>
                      </div></th>
                    </tr>
                                   </td> </tr>
                  </table>
                </div>
                               </table>
                     </div>
                 </div>
            </div>
       
        
        <table width="89%" height="90;" align="left"  style="border-radius: 5px;margin-rigth: 5px;box-shadow: 0 15px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 20px 0 rgba(0, 0, 0, 0.19);margin-left: 15px;">
        <P><th scope="row"><font color="">รายละเอียด :</p> 
        </font><?php echo $getRows['detail']; ?></th></table>  
               
               
        

             
  <script>
function calculate(){
  var x = document.getElementById('amount')
  var y = document.getElementById('pro_id')
  window.open('_Detail_item.php?amount='+x.value+'&pro_id='+y.value);
}
</script>
               
               
               
  <!-- The Modal imag-->
             
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal imag
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var img1 = document.getElementById('myImag1');
var img2 = document.getElementById('myImgg2');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
img1.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
img2.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<!-- จบ imag -->
</body>
</html>