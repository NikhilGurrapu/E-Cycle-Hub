<?php
include("includes/db.php");

if(isset($_POST['payment_id']) && isset($_POST['order_id']) && isset($_POST['amount']) && isset($_POST['customer_id']) && isset($_POST['product_id']) && isset($_POST['product_title']) && isset($_POST['product_image']) && isset($_POST['payment'])){
    $payment_id=$_POST['payment_id'];
    $order_id=$_POST['order_id'];
    $amount=$_POST['amount'];
    $customer_id=$_POST['customer_id'];
    $product_id=$_POST['product_id'];
    $product_title=$_POST['product_title'];
    $product_image=$_POST['product_image'];
    $payment_status=$_POST['payment'];

    $query="INSERT INTO payments('payment_id','order_id','product_id','customer_id','product_title','product_image','amount','payment_date','payment_status') 
    VALUES('$payment_id','$order_id','$product_id','$customer_id','$product_title','$product_image','$amount',NOW(),'$payment_status')";
    mysqli_query($conn,$query);
}

?>