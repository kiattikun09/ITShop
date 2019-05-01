<!DOCTYPE html>
<!-- saved from url=(0064)https://blackrockdigital.github.io/startbootstrap-shop-homepage/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT SHOP LOPBURI</title>
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/fontawesome/css/font-awesome.min.css">
    
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="shop-homepage.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Iconos -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  
  
	  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

    <?php
        include_once('connect.php');
        $pro_id =  $_GET["pro_id"];
        $cust_id =  $_GET["cust_id"];
        // echo $pro_id;
        // echo $cust_id;
        $sql = "select * from products WHERE pro_id = ".$pro_id."";
		//echo $sql;
      	$query = mysqli_query($conn,$sql);
			if($query){
			//echo "queried";
			$getRows = mysqli_fetch_array($query);
			//echo $getRows["pro_name"];
				}
				else{
					
					}
    ?>

    <!-- Font Awesome Icon Library ดาว-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
<!-- จบดาว -->
</head>

<body style="margin-right: 80px; padding-top: 5px;">


                <div align="left"style="margin-left: 10px; padding-right: 20px;">
                  <table width="98%" height="90;"  style="border-radius: 5px; &lt;!--border:5px Red solid--&gt;;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 20px 0 rgba(0, 0, 0, 0.19);">
                    <tr class="info">
                    <tr>                     
                      <th scope="col"> <div align="lift" style="margin-right: 0px;">
                     
                          <div align="left"style="margin-right: 20px;">
                            <table width="886" border="0">
                              <tr>
                                <th width="243" scope="col"><div align="left">
                                  <table width="231">
                                      <tr>
                                         <th scope="col"><div align="center"><img src="../ItshopData/img-products/<?php echo $getRows['imag']; ?>" width="80%" height="Auto"/></div></th>
                                    </tr>
                                  </table>
                                   </div></th>
                                   <th style="padding-right: 50px;"><p><h2><?php echo $getRows['pro_name']; ?></h2></p></th>
                              </tr>
                            </table>
                      </div></th>
                    </tr>
                </td> </tr>
                  </table>
                </div>
                </table>






<table width="95%" height="90;" align="left"  style="border-radius: 5px;margin-rigth: 5px;box-shadow: 0 15px 8px 0 rgba(0, 0, 0, 0.2), 0 10px 20px 0 rgba(0, 0, 0, 0.19);margin-left: 10px;">
        <th scope="row"style="padding-left: 10px; padding-right: 10px;padding-top: 30px;">
        
        <p><span class='fa fa-star checked'></span>
           <span class='fa fa-star checked'></span>
           <span class='fa fa-star checked'></span>
           <span class='fa fa-star'></span>
           <span class='fa fa-star'></span>
           <a href=''>  49 คะแนน</a></p>

        <p><div class="form-group"style="margin-left: 10px;margin-right: 10px;">
            <label for="exampleFormControlTextarea1">เพิ่มความคิดเห็น</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="แสดงคามคิดเห็น...."></textarea></div>
        </p>

        <p><button type="button" class="btn btn-secondary">ส่งความคิดเห็น</button></p>

        
        
        
        </th></table>  



</body>
</html>