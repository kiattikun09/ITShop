<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/2-col-portfolio.css" rel="stylesheet">
    
   

  </head>

  <body>
  <?php 


  $cat_id = $_GET['cat_id'];
  $brand_id = $_GET['type'];
  
    include_once('connect.php'); 
    if($cat_id == '' && $brand_id == ''){
      $sql = "select * from products";
      $query = mysqli_query($conn,$sql);
    }else{
    $sql = "select * from products where cat_id = '".$cat_id."' and brand_id = '".$brand_id."'";
    $query = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($query);
    }
  ?>
    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
      </h1>
      <div class="row" >
        <?php
        while($a = mysqli_fetch_array($query)){
          echo " <div class='col-lg-4 portfolio-item'>
          <div class='card h-100'>
            <a href='Detail_Item.php?pro_id=".$a['pro_id']."'><img class='card-img-top' src='../Itshopdata/img-products/".$a['imag']."' alt=''></a>
            <div class='card-body'>
              <h4 class='card-title'>
                <a href='#'>".$a['pro_name']."</a>
              </h4>
              <p class='card-text'><font color=\"FF6600\">฿".$a['price']."</font></p>
            </div>
          </div>
        </div>";
        }
        ?>
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">«</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">»</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- /.container -->

    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  


</body></html>