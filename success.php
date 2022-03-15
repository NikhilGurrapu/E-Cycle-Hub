<?php

session_start();

include("includes/db.php");
include("functions/functions.php");
global $customer_id;
global $customer_email;
global $customer_name;
global $customer_lname;
global $customer_contact;
global $customer_address;
global $customer_city;
global $payment;
$payment="Completed";
global $Razorpay;
$Razorpay="Razorpay";
global $total_final;
global $total;
global $pro_id;
global $pro_qty;
global $product_title;
global $product_image;

if(isset($_GET['c_id'])){
    $customer_id= $_GET['c_id'];
    $get_customer="select * from customers where customer_id='$customer_id'";
    $run_customer=mysqli_query($conn,$get_customer);
    $row_customer=mysqli_fetch_array($run_customer);

    $customer_email=$row_customer['customer_email'];
    $customer_name=$row_customer['customer_name'];
    $customer_lname=$row_customer['customer_lname'];
    $customer_contact=$row_customer['customer_contact'];
    $customer_address=$row_customer['customer_address'];
    $customer_city=$row_customer['customer_city'];

}

$ip_add= getRealIpUser();

$invoice_no= "ORD".mt_rand()."EHUB";

$select_cart= "select * from cart where ip_add='$ip_add'";
$run_cart= mysqli_query($conn, $select_cart);
while($row_cart=mysqli_fetch_array($run_cart)){

    $pro_id= $row_cart['p_id'];
    $pro_qty= $row_cart['qty'];
    
    $get_products= "select * from products where product_id='$pro_id'";
    $run_products= mysqli_query($conn, $get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        $product_id=$row_products['product_id'];
        $product_title=$row_products['product_title'];
        $product_image=$row_products['product_img1'];

        $cost_price=$row_products['cost_price'];
        $selling_price=$row_products['product_price'];

        $count= $row_products['count'];
        $count+=$pro_qty;

        $stock=$row_products['stock'];
        $stock-=$pro_qty;

        $update_p_c_s="update products set count='$count',stock='$stock' where product_id='$pro_id'";
        $run_update_p_c_s=mysqli_query($conn,$update_p_c_s);

        $brand_id=$row_products['brand_id'];

        $get_brand="select * from brands where brand_id='$brand_id'";
        $run_brand=mysqli_query($conn,$get_brand);
        $row_brand=mysqli_fetch_array($run_brand);

        $brand_count=$row_brand['brand_count'];
        $brand_count+=$pro_qty;

        $update_brand_count="update brands set brand_count='$brand_count' where brand_id='$brand_id'";
        $run_update_b_c=mysqli_query($conn,$update_brand_count);

        $sub_total=$row_products['product_price']*$pro_qty;
        $final_c_p=$cost_price*$pro_qty;

        $profit=$sub_total-($cost_price*$pro_qty);

        $insert_customer_order= "insert into customer_orders(customer_id,product_id,product_title,product_image,cost_price,selling_price,qty,final_cost_price,due_amount,profit,invoice_no,order_date,payment_method,payment_status,order_status) 
        values('$customer_id','$product_id','$product_title','$product_image','$cost_price','$selling_price','$pro_qty','$final_c_p','$sub_total','$profit','$invoice_no',NOW(),'$Razorpay','$payment','Ordered')";
        $run_customer_order=mysqli_query($conn, $insert_customer_order);

        $insert_payment="insert into payments(invoice_no,product_id,customer_id,product_title,product_image,qty,amount,payment_date,payment_method,payment_status) 
        values('$invoice_no','$product_id','$customer_id','$product_title','$product_image','$pro_qty','$sub_total',NOW(),'$Razorpay','$payment')";
        $run_payment=mysqli_query($conn,$insert_payment);
        

        $delete_cart= "delete from cart where ip_add='$ip_add'";
        $run_delete= mysqli_query($conn, $delete_cart);
    }
    $total_final=$total*100;
}

?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Payment Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
        <br>
        <a href="customer/my_account.php?my_orders">
            <button class="btn btn-success">Go to MyOrders</button>
        </a>
      </div>
    </body>
</html>