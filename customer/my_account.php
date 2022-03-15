<?php

session_start();

if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}else{

include("includes/db.php");
include("functions/functions.php");

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

        <div id="navbar" class="navbar navbar-light bg-light" style="box-shadow: 0 10px 6px -6px #666;padding-bottom:20px;"><!--navbar-defult start-->
            <div class="container"><!--container start-->
                <div class="navbar-header"><!--navbar header start-->
                    <a href="../index.php" class="navbar-brand home" style="width: 300px;">
                        <img src="../images/ehub_logo.png" alt="ehub logo" width="135" height="75">
                    </a>
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
                            <li class="<?php if($active=='Home') echo "active"; ?>">
                                <a href="../index.php">Home</a>
                            </li>
                            <li class="<?php if($active=='Shop') echo "active"; ?>">
                                <a href="../shop.php">Products</a>
                            </li>
                            <li class="<?php if($active=='Contact Us') echo "active"; ?>">
                                <a href="../contact.php">Contact Us</a>
                            </li>
                            <li class="<?php if($active=='My Account') echo "active"; ?>">
                                
                                <?php

                                    if(isset($_SESSION['customer_email'])){
                                        $emailID=$_SESSION['customer_email'];
                                        $getname="select * from customers where customer_email='$emailID'";
                                        $runname=mysqli_query($conn,$getname);
                                        $rowname=mysqli_fetch_array($runname);

                                        $c_name=$rowname['customer_name'];
                                        echo "<a href='my_account.php?my_orders'>$c_name</a>";
                                    }
                                ?>

                            </li>                            
                            
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

                        ?>
                        </ul>
                    </div><!--padding-nav end-->
                    <?php
                            if(isset($_SESSION['customer_email'])){
                                echo "
                                    <a href='../cart.php' class='btn navbar-btn btn-primary right'>
                                        <i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;<span>
                                        ";
                                        items();
                                        echo "</span>
                                    </a>
                                    ";
                            }
                    ?>
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
                            <a href="../index.php">Home</a>
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
                    <div class="box">

                        <?php

                        if(isset($_GET['my_orders'])){
                            include("my_orders.php");
                        }
                        if(isset($_GET['edit_account'])){
                            include("edit_account.php");
                        }
                        if(isset($_GET['change_password'])){
                            include("change_password.php");
                        }
                        if(isset($_GET['delete_account'])){
                            include("delete_account.php");
                        }
                        if(isset($_GET['cancel_order'])){
                            include("cancel_order.php");
                        }
                        if(isset($_GET['my_orders_status'])){
                            include("my_orders_status.php");
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