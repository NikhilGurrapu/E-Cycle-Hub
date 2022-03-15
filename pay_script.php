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
global $total_final;
global $total;
global $pro_id;
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

$invoice_no= 'ORD'.mt_rand().'EHUB';

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

        $sub_total=$row_products['product_price']*$pro_qty;
        $total+=$sub_total;
    }
    $total_final=$total*100;
}

?>

<html>
<head>
    <title>
        Razorpay
    </title>
    <style>
        .razorpay-payment-button{
            background-color: #4CAF50;
            color: white;
            font-size: 20px;
            padding: 14px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 250px;
            border: 1px solid #4CAF50;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
            margin-top: 250px;
            
        }
    </style>
</head>
        <script src="js/jquery-331.min.js"></script>
        <form action="success.php?c_id=<?php echo $customer_id; ?>" method="POST">
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="rzp_test_JbP0qmrXU34N7l"
                data-amount="<?php echo $total*100; ?>"
                data-currency="INR"
                data-buttontext="Pay with Razorpay"
                data-name="E-cycles Hub Co."
                data-description=""
                data-image="https://imgkub.com/images/2022/02/22/IMG_20220221_200651.png"
                data-prefill.name="<?php echo $customer_name; ?>"
                data-prefill.email="<?php echo $customer_email; ?>"
                data-prefill.contact="<?php echo $customer_contact; ?>"
                data-theme.color="#F37254"
            ></script>
        </form>
</html>