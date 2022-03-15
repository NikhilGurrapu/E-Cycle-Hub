<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<?php

    if(isset($_GET['update_order_status'])){
        $order_id=$_GET['update_order_status'];
        $get_o= "select * from customer_orders where order_id='$order_id'";
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

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        
    </head>
    <body>
        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Update Order Status</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-bicycle"> View Orders / Update Order Status</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default"><!--panel panel-default start-->
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Order Status</label>
                                    <div class="col-md-6">
                                        <select name="update_order_status" class="form-control">
                                            <option value="<?php echo $order_status; ?>"><?php echo $order_status; ?></option>
                                            <option value="Ordered">Ordered</option>
                                            <option value="Packing">Packing</option>
                                            <option value="Shipping">Shipping</option>
                                            <option value="Out For Delivery">Out For Delivery</option>
                                            <option value="Delivered">Delivered</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input name="update_order" value="Update Order Status" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Order ID</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $o_id; ?>" name="order_id" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product ID</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $product_id; ?>" name="product_id" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Customer ID</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $customer_id; ?>" name="customer_id" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Invoice No</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $invoice_no; ?>" name="invoice_no" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Customer Name</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $customer_name.' '.$customer_lname; ?>" name="customer_name" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Customer Contact</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $customer_contact; ?>" name="contact" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Title</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $product_title; ?>" name="product_id" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image</label>
                                    <div class="col-md-6">
                                        <img src="product_images/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="100" height="60">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Amount</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $due_amount; ?>" name="amount" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Order Date</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $order_date; ?>" name="date" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Payment Status</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $payment_status; ?>" name="payment_status" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Payment Method</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $payment_method; ?>" name="payment_method" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->






        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>


<?php

if(isset($_POST['update_order'])){
    $order_id=$_POST['order_id'];
    $update_order_status=$_POST['update_order_status'];

    $update_order="UPDATE customer_orders SET order_status='$update_order_status' WHERE order_id='$order_id'";
    
    $run_product=mysqli_query($conn, $update_order);
    if($run_product){
        echo "<script>alert('Order status Updated')</script>";
        echo "<script>window.open('index.php?view_orders','_self')</script>";
    }
    else{
        echo "<script>alert('Oops! Something went wrong')</script>";
        echo "<script>window.open('index.php?view_orders','_self')</script>";
    }

}

?>
<?php } ?>
