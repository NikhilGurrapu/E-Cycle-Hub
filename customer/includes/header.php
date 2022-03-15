<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<?php

if(isset($_GET['pro_id'])){
    $product_id= $_GET['pro_id'];
    $get_product= "select * from products where product_id='$product_id'";

    $run_product= mysqli_query($conn,$get_product);
    $row_product= mysqli_fetch_array($run_product);

    $p_cat_id= $row_product['p_cat_id'];
    $p_series_id= $row_product['p_series_id'];
    $pro_model= $row_product['product_model'];
    $pro_title= $row_product['product_title'];
    $pro_price= $row_product['product_price'];
    $pro_desc= $row_product['product_desc'];
    $pro_img1= $row_product['product_img1'];
    $pro_img2= $row_product['product_img2'];
    $pro_img3= $row_product['product_img3'];
    $pro_img4= $row_product['product_img4'];

    $get_p_cat= "select * from product_categories where p_cat_id='$p_cat_id'";

    $run_p_cat= mysqli_query($conn, $get_p_cat);
    $row_p_cat= mysqli_fetch_array($run_p_cat);

    $p_cat_title= $row_p_cat['p_cat_title'];
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