<?php

if(isset($_GET['cancel_order'])){
    $order_id=$_GET['cancel_order'];
        $get_o="select * from customer_orders where order_id='$order_id'";
        $run_o=mysqli_query($conn, $get_o);
        $row_o=mysqli_fetch_array($run_o);
            $o_id=$row_o['order_id'];
            $customer_id=$row_o['customer_id'];
            $product_id=$row_o['product_id'];
            $product_title=$row_o['product_title'];
            $product_image=$row_o['product_image'];
            $due_amount=$row_o['due_amount'];
            $invoice_no=$row_o['invoice_no'];
            $order_date=$row_o['order_date'];
            $payment_method=$row_o['payment_method'];
            $payment_status=$row_o['payment_status'];
            $order_status=$row_o['order_status'];

            $get_c="select * from customers where customer_id='$customer_id'";
            $run_c=mysqli_query($conn,$get_c);
            $row_c=mysqli_fetch_array($run_c);
            $customer_name=$row_c['customer_name'];
            $customer_lname=$row_c['customer_lname'];
            $customer_contact= $row_c['customer_contact'];

            $get_brand="select brand_id from products where product_id='$product_id'";
            $run_brand=mysqli_query($conn,$get_brand);
            $row_brand=mysqli_fetch_array($run_brand);
            $brand_id=$row_brand['brand_id'];

            $get_b_count="select * from brands where brand_id='$brand_id'";
            $run_b_count=mysqli_query($conn,$get_b_count);
            $row_b_count=mysqli_fetch_array($run_b_count);

            $brand_count=$row_b_count['brand_count'];

            $brand_count-=1;

            $update_b_count="update brands set brand_count='$brand_count' where brand_id='$brand_id'";
            $run_update_b_count=mysqli_query($conn,$update_b_count);
    
    $update="UPDATE customer_orders SET order_status='Canceled' WHERE order_id='$order_id'";
    $run_update=mysqli_query($conn,$update);
    if($run_update){
        echo "<script>alert('Order '.$product_title.' Canceled')</script>";
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
    else{
        echo "<script>alert('Oops! Something went wrong..')</script>";
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
}

?>