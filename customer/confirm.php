<?php

session_start();

if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{

include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['order_id'])){
    $order_id= $_GET['order_id'];

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <title>E-cycle Hub</title>
    </head>
    <body>

        <div id="top"><!--Top start-->
            <div class="container"><!--container start-->
                <div class="col-md-6 offer"><!--col-md-6 offer start-->
                        <a href="#" class="btn btn-success btn-sm">
                            <?php

                                if(!isset($_SESSION['customer_email'])){
                                    echo "Guest";
                                }else{
                                    echo "" . $_SESSION['customer_email'] . "";
                                }

                            ?>
                        </a>
                        <a href="#">&nbsp;<?php items(); ?> &nbsp;ITEMS IN YOUR CART&nbsp; |&nbsp; TOTAL PRICE: &nbsp;<?php total_price(); ?> </a>
                </div><!--col-md-6 offer end-->

                <div class="col-md-6"><!--col-md-6 start-->
                    <ul class="menu"><!--menu start-->
                        
                                <?php

                                    if(!isset($_SESSION['customer_email'])){
                                        echo "
                                            <li>
                                                <a href='../customer_register.php'>Register</a>
                                            </li>
                                            <li>
                                                <a href='../checkout.php'>Login</a>
                                            </li>
                                        ";
                                    }
                                    else{
                                        echo "
                                        <li>
                                            <a href='../logout.php'>Logout</a>
                                        </li>
                                        ";
                                    }

                                ?>

                    </ul><!--col-md-6 end-->
                </div><!--menu end-->
            </div><!--Container end-->
        </div><!--Top end-->


        <div id="navbar" class="navbar navbar-default"><!--navbar-defult start-->
            <div class="container"><!--container start-->
                <div class="navbar-header"><!--navbar header start-->
                    <a href="index.php" class="navbar-brand home">E-cycle Hub</a>
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>

                    <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>

                </div><!--navbar header start-->

                <div class="navbar-collapse collapse" id="navigation">

                    <div class="padding-nav">

                        <ul class="nav navbar-nav left">
                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <a href="../shop.php">Products</a>
                            </li>
                            <li class="active">
                                <a href="my_account.php">My Account</a>
                            </li>
                            <li>
                                <a href="../cart.php">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="../contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div><!--padding-nav end-->
                    <a href="../cart.php" class="btn navbar-btn btn-primary right">
                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;<span><?php items(); ?></span>
                    </a>
                    <div class="navbar-collapse collapse right">
                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div class="collapse clearfix" id="search">
                        <form method="get" action="results.php" class="navbar-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                                <span class="input-group-btn">
                                    <button type="submit" name="search" value="search" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div><!--navbar=collapse collapse end-->
            </div><!--container end-->
        </div><!--navbar-default end-->

        <div id="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            My account
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                        include("includes/sidebar.php")
                    ?>
                </div>

                <div class="col-md-9">
                    <?php
                    
                                   
                        if(isset($_GET['order_id'])){
                            $order_id=$_GET['order_id'];

                            $check_order="select * from payments where order_id='$order_id'";
                            $run_check=mysqli_query($conn, $check_order);
                            $count_check=mysqli_num_rows($run_check);
                            if($count_check==1){
                                echo "<script>alert('Your order(s) will be completed within 24 working hours...')</script>";
                                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            }

                            $get_order="select * from customer_orders where order_id='$order_id'";
                            $run_order=mysqli_query($conn,$get_order);
                            $row_order=mysqli_fetch_array($run_order);

                            $o_id=$row_order['order_id'];
                            $due_amount=$row_order['due_amount'];
                            $invoice_no=$row_order['invoice_no'];
                        }
                    ?>
                    <div class="box">
                        <h1 align="center">Please confirm your payment</h1>
                        
                        <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Order ID</label>
                                <input type="text" class="form-control" name="order_id" value="<?php echo $order_id; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Invioce No</label>
                                <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice_no; ?>" required readonly>
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" name="amount_sent" value="<?php echo $due_amount; ?>" required readonly>
                            </div>

                            <div class="form-group">
                                <label>Select Payment Mode:</label>
                                <select name="payment_mode" class="form-control">
                                    <option value="NA">Select Payment Mode</option>
                                    <option value="Back Code">Back Code</option>
                                    <option value="UBL / Omni Paisa">UBL / Omni Paisa</option>
                                    <option value="Easy Paisa">Easy Paisa</option>
                                    <option value="Western Union">Western Union</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Transaction / Reference ID:</label>
                                <input type="text" class="form-control" name="ref_no" required>
                            </div>

                            <div class="form-group">
                                <label>Payment Date:</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary btn-lg" name="confirm_payment">
                                    <i class="fa fa-user-md"></i> Confirm Payment
                                </button>
                            </div>
                        </form>

                        <?php

                            if(isset($_GET['update_id'])){
                                $update_id= $_GET['update_id'];

                                $order_id= $_POST['order_id'];
                                $get_order="select * from customer_orders where order_id='$order_id'";
                                $run_order=mysqli_query($conn, $get_order);
                                $row_order=mysqli_fetch_array($run_order);

                                $product_id=$row_order['product_id'];
                                $product_title=$row_order['product_title'];
                                $product_image=$row_order['product_image'];

                                $invoice_no= $_POST['invoice_no'];
                                $amount= $_POST['amount_sent'];
                                $payment_mode= $_POST['payment_mode'];
                                $ref_no= $_POST['ref_no'];
                                $payment_date= $_POST['date'];

                                $complete= "Completed";

                                $insert_payment= "insert into payments(order_id,product_id,product_title,product_image,invoice_no,amount,payment_mode,ref_no,payment_date) 
                                values('$order_id','$product_id','$product_title','$product_image','$invoice_no','$amount','$payment_mode','$ref_no','$payment_date')";

                                $run_insert_payment= mysqli_query($conn, $insert_payment);

                                $update_customer_order= "update customer_orders set order_status='$complete' where order_id='$update_id'";
                                $run_customer_order= mysqli_query($conn, $update_customer_order);
                                
                                $update_pending_order= "update pending_orders set order_status='$complete' where order_id='$update_id'";
                                $run_pending_order= mysqli_query($conn, $update_pending_order);

                                if($run_pending_order){
                                    echo "<script>alert('Thankyou for purchasing. Your order(s) will be completed within 24 working hours...')</script>";
                                    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                                }
                                else{
                                    echo "<script>alert('Oops! Something went worong ...')</script>";
                                    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                                }

                            }
                        ?>
                    </div>
                </div>


            </div>
        </div>
        <?php
        include("includes/footer.php");
        ?>
        <script src="js/bootstrap-337.min.js"></script>
        <script src="js/jquery-331.min.js"></script>
    </body>
</html>
<?php } ?>