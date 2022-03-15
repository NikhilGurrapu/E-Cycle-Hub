<style>
    ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type: none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}

</style>
<?php
include("includes/db.php");
?>
<?php
if(isset($_GET['my_orders_status'])){

    $order_id=$_GET['my_orders_status'];

    $get_order="select * from customer_orders where order_id='$order_id'";
    $run_order=mysqli_query($conn,$get_order);
    $row_order=mysqli_fetch_array($run_order);

    $customer_id=$row_order['customer_id'];
    $product_id=$row_order['product_id'];
    $product_title=$row_order['product_title'];
    $product_image=$row_order['product_image'];
    $product_qty= $row_order['qty'];
    $due_amount=$row_order['due_amount'];
    $invoice_no=$row_order['invoice_no'];
    $order_date=$row_order['order_date'];
    $payment_method=$row_order['payment_method'];
    $payment_status=$row_order['payment_status'];
    $order_status=$row_order['order_status'];

    $get_customer="select * from customers where customer_id='$customer_id'";
    $run_customer=mysqli_query($conn,$get_customer);
    $row_customer=mysqli_fetch_array($run_customer);

    $c_name=$row_customer['customer_name'];
    $c_lname=$row_customer['customer_lname'];
    $c_address=$row_customer['customer_address'];
    $c_contact=$row_customer['customer_contact'];

    $get_product="select * from products where product_id='$product_id'";
    $run_product=mysqli_query($conn,$get_product);
    $row_product=mysqli_fetch_array($run_product);

    
    $brand_id=$row_product['brand_id'];

    $get_brand="select * from brands where brand_id='$brand_id'";
    $run_brand=mysqli_query($conn,$get_brand);
    $row_brand=mysqli_fetch_array($run_brand);

    $brand_name=$row_brand['brand_name'];

}
?>
<div class="row">
    <div class="col-md-6">
        <h2>Delivery Address</h2><br>
        <h4><?php echo $c_name.' '.$c_lname; ?></h4>
        <h5 style="font-family:'Roboto Mono',monospace;line-height:25px;"><?php echo $c_address; ?></h5><br>
        <h4>Phone number: </h4><span style="font-family:'Roboto Mono',monospace;"><?php echo $c_contact; ?></span>
    </div>
    <div class="col-md-6">
        <div class="row" style="padding: 15px;">
            <img src="../admin_area/product_images/<?php echo $product_image; ?>" alt="" width="300" height="200">
        </div>
        <div class="row" style="padding-left: 35px;padding-top:-20px;">
            <div class="col-md-5">
                <h3><?php echo $product_title; ?></h3>
                <h5>Brand name: <?php echo $brand_name; ?></h5>
            </div>
            <div class="col-md-4">
                <h3>Quantity: <?php echo $product_qty; ?></h3>
            </div>
            <div class="col-md-3">
                <h3>&#8377; <?php echo $due_amount; ?>/-</h3>
            </div>
            
        </div>
    </div>
</div>
<br><br><br><br>
<div>
    <?php
    if($order_status=="Delivered"){
        echo "
        <ol class='progtrckr' data-progtrckr-steps='5'>
            <li class='progtrckr-done'>Ordered</li><li class='progtrckr-done'>Packing</li><li class='progtrckr-done'>Shipping</li><li class='progtrckr-done'>Out For Delivery</li><li class='progtrckr-done'>Delivered</li>
        </ol>
        ";
    }
    if($order_status=="Out For Delivery"){
        echo "
        <ol class='progtrckr' data-progtrckr-steps='5'>
            <li class='progtrckr-done'>Ordered</li><li class='progtrckr-done'>Packing</li><li class='progtrckr-done'>Shipping</li><li class='progtrckr-done'>Out For Delivery</li><li class='progtrckr-todo'>Delivered</li>
        </ol>
        ";
    }
    if($order_status=="Shipping"){
        echo "
        <ol class='progtrckr' data-progtrckr-steps='5'>
            <li class='progtrckr-done'>Ordered</li><li class='progtrckr-done'>Packing</li><li class='progtrckr-done'>Shipping</li><li class='progtrckr-todo'>Out For Delivery</li><li class='progtrckr-todo'>Delivered</li>
        </ol>
        ";
    }
    if($order_status=="Packing"){
        echo "
        <ol class='progtrckr' data-progtrckr-steps='5'>
            <li class='progtrckr-done'>Ordered</li><li class='progtrckr-done'>Packing</li><li class='progtrckr-todo'>Shipping</li><li class='progtrckr-todo'>Out For Delivery</li><li class='progtrckr-todo'>Delivered</li>
        </ol>
        ";
    }
    if($order_status=="Ordered"){
        echo "
        <ol class='progtrckr' data-progtrckr-steps='5'>
            <li class='progtrckr-done'>Ordered</li><li class='progtrckr-todo'>Packing</li><li class='progtrckr-todo'>Shipping</li><li class='progtrckr-todo'>Out For Delivery</li><li class='progtrckr-todo'>Delivered</li>
        </ol>
        ";
    }
    ?>
    
<br><br><br>
</div>