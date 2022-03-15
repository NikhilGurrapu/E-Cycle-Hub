<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['c_id'])){
    $customer_id= $_GET['c_id'];
}

$ip_add= getRealIpUser();

$status= "Pending";
$payment_method="COD";
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
        values('$customer_id','$product_id','$product_title','$product_image','$cost_price','$selling_price','$pro_qty','$final_c_p','$sub_total','$profit','$invoice_no',NOW(),'$payment_method','$status','Ordered')";
        $run_customer_order=mysqli_query($conn, $insert_customer_order);

        $delete_cart= "delete from cart where ip_add='$ip_add'";
        $run_delete= mysqli_query($conn, $delete_cart);

        echo "<script>window.open('success-order.php','_self')</script>";
    }
}

?>