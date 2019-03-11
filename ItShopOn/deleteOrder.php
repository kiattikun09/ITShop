<?php
//ลบสินค้าในตะกร้า
    include_once('connect.php');
    $order_id = $_GET['order_id'];

    $selectOrder = "select quantity,pro_id from orders where order_id=".$order_id."";
    $sqlSelectOrders = mysqli_query($conn,$selectOrder);
    if($sqlSelectOrders){ echo "select order success";}else{echo "can not select order";}
    $getRowsOrders = mysqli_fetch_array($sqlSelectOrders);
    echo $getRowsOrders['pro_id'];

    $selectProduct = "select quantity from products where pro_id = ".$getRowsOrders['pro_id']."";
    $sqlSelectProducts = mysqli_query($conn,$selectProduct);
    if($sqlSelectProducts){ echo "select Product success";}else{echo "can not select product";}
    $getRowsProducts = mysqli_fetch_array($sqlSelectProducts);

    $totalQuantity = $getRowsOrders['quantity']+$getRowsProducts['quantity'];
    echo $totalQuantity;

    $updateProduct = "update products set quantity = ".$totalQuantity." where pro_id=".$getRowsOrders['pro_id']."";
    $queryUpdateProduct = mysqli_query($conn,$updateProduct);
    if($queryUpdateProduct){ echo "update product success";}else{echo "can not update product";}

    $sqlDeleteOrders = "delete from orders where order_id = ".$order_id.";";
    $queryDelete = mysqli_query($conn,$sqlDeleteOrders);

    header("Location:Pro_integration.php");
?>