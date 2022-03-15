<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<?php
if(isset($_GET['delete_color'])){
    $p_cat_id=$_GET['delete_color'];
    $delete_p_cat="delete from colors where color_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('Color Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}
?>

<?php
if(isset($_GET['delete_p_cat'])){
    $p_cat_id=$_GET['delete_p_cat'];
    $delete_p_cat="delete from product_categories where p_cat_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('Product Category Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_p_cats','_self')</script>";
    }
}
?>

<?php
if(isset($_GET['delete_cat'])){
    $p_cat_id=$_GET['delete_cat'];
    $delete_p_cat="delete from series where series_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('Category Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}
?>

<?php
if(isset($_GET['delete_customer'])){
    $p_cat_id=$_GET['delete_customer'];

    $delet_c_order="delete from customer_orders where customer_id='$p_cat_id'";
    $run_delete_c_order=mysqli_query($conn,$delet_c_order);
    if($run_delete_c_order){
        $delete_p_cat="delete from customers where customer_id='$p_cat_id'";
        $run_delete=mysqli_query($conn, $delete_p_cat);
        if($run_delete){
            echo "<script>alert('Customer Deleted Successfully ! !')</script>";
            echo "<script>window.open('index.php?view_customers','_self')</script>";
        }
    }
}
?>

<?php
if(isset($_GET['delete_order'])){
    $order_id=$_GET['delete_order'];
    $delete_order="delete from customer_orders where customer_id='$order_id'";
    $run_delete=mysqli_query($conn, $delete_order);
    if($run_delete){
        echo "<script>alert('Order Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_orders','_self')</script>";
    }
}
?>

<?php
if(isset($_GET['delete_payment'])){
    $order_id=$_GET['delete_payment'];
    $delete_order="delete from payments where payment_id='$order_id'";
    $run_delete=mysqli_query($conn, $delete_order);
    if($run_delete){
        echo "<script>alert('Payment Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_payments','_self')</script>";
    }
}
?>

<?php

if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    $delete_pro="delete from products where product_id='$delete_id'";
    $run_delete=mysqli_query($conn, $delete_pro);
    if($run_delete){
        echo "<script>alert('Product Deleted ! ! !')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}

?>

<?php
if(isset($_GET['delete_slide'])){
    $p_cat_id=$_GET['delete_slide'];
    $delete_p_cat="delete from slider where slide_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('Slide Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
}
?>

<?php
if(isset($_GET['delete_term'])){
    $p_cat_id=$_GET['delete_term'];
    $delete_p_cat="delete from terms where term_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('Term Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";
    }
}
?>

<?php
if(isset($_GET['delete_user'])){
    $p_cat_id=$_GET['delete_user'];
    $delete_p_cat="delete from admins where admin_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('User Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
}
?>

<?php
if(isset($_GET['delete_frame'])){
    $p_cat_id=$_GET['delete_frame'];
    $delete_p_cat="delete from frames where frame_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('Frame Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}
?>
<?php
if(isset($_GET['delete_faq'])){
    $p_cat_id=$_GET['delete_faq'];
    $delete_p_cat="delete from faq where faq_id='$p_cat_id'";
    $run_delete=mysqli_query($conn, $delete_p_cat);
    if($run_delete){
        echo "<script>alert('FAQ Deleted Successfully ! !')</script>";
        echo "<script>window.open('index.php?insert_faq','_self')</script>";
    }
}
?>
<?php } ?>

