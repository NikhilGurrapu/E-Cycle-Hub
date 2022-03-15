<?php

session_start();

include("includes/db.php");
include("functions/functions.php");


if(isset($_GET['pro_id'])){
    $product_id= $_GET['pro_id'];

    $get_product= "select * from products where product_id='$product_id'";
    $run_product= mysqli_query($conn,$get_product);
    $row_product= mysqli_fetch_array($run_product);
    
    $p_cat_id= $row_product['p_cat_id'];
    $brand_id= $row_product['brand_id'];
    $pro_title= $row_product['product_title'];
    $pro_color= $row_product['product_color'];
    $pro_img1= $row_product['product_img1'];
    $pro_img2= $row_product['product_img2'];
    $pro_img3= $row_product['product_img3'];
    $pro_img4= $row_product['product_img4'];
    $pro_price= $row_product['product_price'];
    $frame_name= $row_product['frame_name'];
    $motor_name=$row_product['motor_name'];
    $fork=$row_product['fork'];
    $suspension=$row_product['suspension'];
    $gear=$row_product['gear'];
    $mileage_pedal=$row_product['mileage_pedal'];
    $mileage_throttle=$row_product['mileage_throttle'];
    $rims=$row_product['rims_name'];
    $tyre_size=$row_product['tyre_size'];
    $max_speed=$row_product['max_speed'];
    $max_speed=$row_product['max_speed'];
    $display=$row_product['display'];
    $distance=$row_product['distance'];
    $brakes=$row_product['brakes'];
    $battery=$row_product['battery'];
    $battery_life=$row_product['battery_life'];
    $charge_time=$row_product['charge_time'];
    $product_model=$row_product['product_model'];
    $product_desc=$row_product['product_desc'];
    $product_keywords=$row_product['product_keywords'];
    $stock=$row_product['stock'];

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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Hairline&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">

        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    </head>
    <body>  



        <div id="navbar" class="navbar navbar-light bg-light" style="box-shadow: 0 10px 6px -6px #666;"><!--navbar-defult start-->
            <div class="container"><!--container start-->
                <div class="navbar-header"><!--navbar header start-->
                    <a href="index.php" class="navbar-brand home" style="width: 300px;">
                        <img src="images/ehub_logo.png" alt="ehub logo" width="135" height="75">
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
                                <a href="index.php">Home</a>
                            </li>
                            <li class="<?php if($active=='Shop') echo "active"; ?>">
                                <a href="shop.php">Products</a>
                            </li>
                            <li class="<?php if($active=='Contact Us') echo "active"; ?>">
                                <a href="contact.php">Contact Us</a>
                            </li>
                            <li class="<?php if($active=='My Account') echo "active"; ?>">
                                
                                <?php

                                    if(isset($_SESSION['customer_email'])){
                                        $emailID=$_SESSION['customer_email'];
                                        $getname="select * from customers where customer_email='$emailID'";
                                        $runname=mysqli_query($conn,$getname);
                                        $rowname=mysqli_fetch_array($runname);

                                        $c_name=$rowname['customer_name'];
                                        echo "<a href='customer/my_account.php?my_orders'>$c_name</a>";
                                    }
                                ?>

                            </li>                            
                            
                            <?php

                            if(!isset($_SESSION['customer_email'])){
                                echo "
                                    <li>
                                        <a href='customer_register.php'>Register</a>
                                    </li>
                                    <li>
                                        <a href='checkout.php'>Login</a>
                                    </li>
                                ";
                            }

                        ?>
                        </ul>
                    </div><!--padding-nav end-->
                    <?php
                            if(isset($_SESSION['customer_email'])){
                                echo "
                                    <a href='cart.php' class='btn navbar-btn btn-primary right'>
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
            <section>
            <div class="container-fluid">
                <div class="col-md-12" style="margin-bottom: 80px;">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php" style="text-decoration: none;">Home</a>
                        </li>
                        <li>
                            <a href='shop.php' style="text-decoration: none;">Products</a>
                        </li>
                        <li>
                            <a href="shop.php?p_cat_id=<?php echo $p_cat_id; ?>" style="text-decoration: none;"><?php echo $p_cat_title; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div id="productsMain" class="row">
                        <div class="col-sm-7">
                            <div id="mainImage">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php
                                        if(!$pro_img1==""){
                                            if(!$pro_img2==""){
                                                if(!$pro_img3==""){
                                                    if(!$pro_img4==""){
                                                        echo "
                                                            <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                                                            <li data-target='#myCarousel' data-slide-to='1'></li>
                                                            <li data-target='#myCarousel' data-slide-to='2'></li>
                                                            <li data-target='#myCarousel' data-slide-to='3'></li>
                                                        ";
                                                    }
                                                    else{
                                                        echo "
                                                            <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                                                            <li data-target='#myCarousel' data-slide-to='1'></li>
                                                            <li data-target='#myCarousel' data-slide-to='2'></li>
                                                        ";
                                                    }
                                                }
                                                else{
                                                    echo "
                                                        <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                                                        <li data-target='#myCarousel' data-slide-to='1'></li>
                                                    ";
                                                }
                                            }
                                            else{
                                                echo "
                                                    <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                                                ";
                                            }
                                        }
                                        ?>
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php
                                            if(!$pro_img1==""){
                                                if(!$pro_img2==""){
                                                    if(!$pro_img3==""){
                                                        if(!$pro_img4==""){
                                                            echo "
                                                                <div class='item active'>
                                                                    <center><img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                                <div class='item'>
                                                                    <center><img src='admin_area/product_images/$pro_img2' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                                <div class='item'>
                                                                    <center><img src='admin_area/product_images/$pro_img3' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                                <div class='item'>
                                                                    <center><img src='admin_area/product_images/$pro_img4' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                            ";
                                                        }
                                                        else{
                                                            echo "
                                                                <div class='item active'>
                                                                    <center><img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                                <div class='item'>
                                                                    <center><img src='admin_area/product_images/$pro_img2' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                                <div class='item'>
                                                                    <center><img src='admin_area/product_images/$pro_img3' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                            ";
                                                        }
                                                    }
                                                    else{
                                                        echo "
                                                                <div class='item active'>
                                                                    <center><img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                                <div class='item'>
                                                                    <center><img src='admin_area/product_images/$pro_img2' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                            ";
                                                    }
                                                }
                                                else{
                                                    echo "
                                                                <div class='item active'>
                                                                    <center><img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'></center>
                                                                </div>
                                                            ";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="row" id="thumbs">
                                    <div class="col-xs-2"></div>
                                    <?php
                                            if(!$pro_img1==""){
                                                if(!$pro_img2==""){
                                                    if(!$pro_img3==""){
                                                        if(!$pro_img4==""){
                                                            echo "
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='0'>
                                                                        <img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='1'>
                                                                        <img src='admin_area/product_images/$pro_img2' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='2'>
                                                                        <img src='admin_area/product_images/$pro_img3' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='3'>
                                                                        <img src='admin_area/product_images/$pro_img4' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                            ";
                                                        }
                                                        else{
                                                            echo "
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='0'>
                                                                        <img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='1'>
                                                                        <img src='admin_area/product_images/$pro_img2' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='2'>
                                                                        <img src='admin_area/product_images/$pro_img3' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                            ";
                                                        }
                                                    }
                                                    else{
                                                        echo "
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='0'>
                                                                        <img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='1'>
                                                                        <img src='admin_area/product_images/$pro_img2' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                            ";
                                                    }
                                                }
                                                else{
                                                    echo "
                                                                <div class='col-xs-2'>
                                                                    <a href='' class='thumb' data-target='#myCarousel' data-slide-to='0'>
                                                                        <img src='admin_area/product_images/$pro_img1' alt='$pro_title' class='img-responsive'>
                                                                    </a>
                                                                </div>
                                                            ";
                                                }
                                            }
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <?php add_cart(); ?>
                            <h1 style="font-family:'Roboto Mono',monospace;"><?php echo $pro_title; ?></h1>
                            <p style="font-family:'Roboto Mono',monospace;font-size: 30px;font-weight:900;">&#8377; <?php echo $pro_price; ?>/-</p>
                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;line-height:30px;letter-spacing:2.5px;padding-right:200px;"><?php echo $product_desc; ?></span>
                            <div class="row" style="margin-top: 30px;">
                                <div class="col-md-2" style="font-family: 'IBM Plex Mono', monospace;font-weight:700;font-size:large;letter-spacing:1px;color:#666;">Model</div>
                                <div class="col-md-10" style="font-family: 'Special Elite', cursive;font-weight:200;letter-spacing:2px;font-size:20px;"><?php echo $product_model; ?></div>
                            </div>
                            <div class="row" style="margin-top: 10px;margin-bottom:30px;">
                                <div class="col-md-2" style="font-family: 'IBM Plex Mono', monospace;font-weight:700;font-size:large;letter-spacing:1px;color:#666;">Series</div>
                                <div class="col-md-10" style="font-family: 'Special Elite', cursive;font-weight:200;letter-spacing:2px;font-size:20px;"><?php echo $gear; ?> Series</div>
                            </div>
                            <div class="row" style="margin-top: 10px;margin-bottom:30px;">
                                <div class="col-md-2" style="font-family: 'IBM Plex Mono', monospace;font-weight:700;font-size:large;letter-spacing:1px;color:#666;">Color</div>
                                <div class="col-md-10" style="font-family: 'Special Elite', cursive;font-weight:200;letter-spacing:2px;font-size:20px;"><?php echo $pro_color; ?></div>
                            </div>
                            <h2 style="font-family: 'Roboto Condensed', sans-serif;font-weight:700;font-size:35px;"><?php echo $pro_title; ?> E-Cycle Features</h2>
                            <div style="margin-top: 20px;">
                                <p>
                                    <img src="images/icons/icon3.png" style="width: 35px;height:35px;">
                                    <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:20px;letter-spacing:2px;">
                                        <?php echo $frame_name; ?>
                                    </span>
                                </p>
                                <p>
                                    <img src="images/icons/highlights-km.svg" style="width: 35px;height:35px;">
                                    <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:20px;letter-spacing:2px;">
                                        <?php echo $distance; ?>
                                    </span>
                                </p>
                                <p>
                                    <img src="images/icons/highlights-battery.svg" style="width: 35px;height:35px;">
                                    <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:20px;letter-spacing:2px;">
                                        <?php echo $battery; ?>
                                    </span>
                                </p>
                                <p>
                                    <img src="images/icons/suspension-icon.webp" style="width: 35px;height:35px;">
                                    <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:20px;letter-spacing:2px;">
                                        <?php echo $suspension; ?>
                                    </span>
                                </p>
                            </div>
                            <?php
                            if(isset($_SESSION['customer_email']) && $stock>0){
                                echo "
                                <form action='details.php?add_cart=$product_id' method='POST' class='form-horizontal'>
                                    <div style='margin-top: 25px;'>
                                        <select name='product_qty' class='form-control' style='width: 250px;' required oninput='setCustomValidity('')' oninvalid='setCustomValidity('Pick Quantity')'>
                                            <option disabled selected>Select Quantity</option>
                                            <option value='1'>1</option>
                                            <option value='2'>2</option>
                                            <option value='3'>3</option>
                                            <option value='4'>4</option>
                                            <option value='5'>5</option>
                                        </select>
                                    </div>
                                    <div style='margin-top: 25px;'>
                                        <a href='details.php?add_cart=$product_id'>
                                            <button style='width: 250px; padding: 10px 20px; background-color: rgb(79, 191, 168);color: #fff;font-size:20px;'>Add to cart</button>
                                        </a>
                                    </div>
                                </form>
                                ";
                            }
                            elseif($stock==0){
                                echo "
                                    <div style='margin-top: 25px;'>
                                        <p style='width: 250px; padding: 10px 20px; background-color: none;color: red;font-size:20px;'>Out of Stock</p>
                                    </div>
                                </form>
                                ";
                            }
                            ?>                            
                        </div>
                    </div>
                </div>
                </section>
                <section class="specification-section">
                    <div style="margin-bottom: 10px;">
                        <div class="container">
                            <header style="margin-bottom:50px;">
                                <h2 class="spec-heading">
                                    <span class="spec-product-Name"><?php echo $pro_title; ?></span><br>
                                    Technical Specifications
                                </h2>
                            </header>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/icon3.png" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Bicycle frame</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $frame_name; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/front-fork.png" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Fork
                                            </span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $fork; ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/highlights-battery.svg" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                                Battery
                                            </span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $battery; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/charge-time.webp" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Battery Life</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $battery_life; ?> Years</span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/mileage-icon.webp" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Mileage Pedal Assist</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $mileage_pedal; ?> Kms</span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/mileage-icon.webp" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Mileage Throttle</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $mileage_throttle; ?> Kms</span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/display-unit-icon.webp" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Display</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $display; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/charge-time.webp" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Charge Time</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $charge_time; ?> hours</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/motor-icon.webp" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Motor</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $motor_name; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/brake.webp" style="width: 35px;height:35px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Brakes</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $brakes; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/tires.webp" style="width: 35px;height:35px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Bicycle Wheel Size</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $tyre_size; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/rim.png" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Rims</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $rims; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/speed-gear.png" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            No of Gears</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $gear; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/suspension-icon.webp" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Bicycle Suspension</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $suspension; ?></span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <img src="images/icons/speed-meter.svg" style="width: 25px;height:25px;">
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Max-speed</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $max_speed; ?> Kmph</span>
                                        </p>
                                    </div>
                                    <div class="row spec-item">
                                        <p>
                                            <i class="fa fa-road"></i>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            Distance</span>
                                            <span style="font-family:'Roboto Mono',monospace;font-size:larger;padding:10px;letter-spacing:2px;">
                                            <?php echo $distance; ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                
                <section>
                    <div class="container">
                        <div class="row">
                            <?php
                            $get_products= "select * from products where brand_id='$brand_id' order by 1 DESC limit 4";

                            $result= mysqli_query($db, $get_products);
                            while($row_products=mysqli_fetch_array($result)){
                        
                                $product_id= $row_products['product_id'];
                                $pro_title= $row_products['product_title'];
                                $pro_price= $row_products['product_price'];
                                $pro_img1= $row_products['product_img1'];
                                $frame= $row_products['frame_name'];
                                $gear_name=$row_products['gear'];
                                $maxSpeed=$row_products['max_speed'];
                                $rims_name=$row_products['rims_name'];
                            ?>
                            <div class='col-md-4 single'>
                                <div class='bike-card'>
                                    <div class='new-models text-center'>
                                        
                                        <h3 class='bike-heading'><?php echo $pro_title ?></h3>
                                    </div>
                                    <div class='bike-img'>
                                        <img src='admin_area/product_images/<?php echo $pro_img1 ?>' width="500" height="150" alt='<?php echo $pro_title ?>'>
                                    </div>
                                    <div class='model-desc'>
                                        <div class='about-product'>
                                            <ul class='list-group listStyle1'>
                                                <li class='list-group-item d-flex align-items-start f3 text-Black pl-0'>
                                                    <img src="images/icons/icon3.png" style="width: 25px;height: 25px;">
                                                    <span style="font-family:'Roboto Mono',monospace;font-size:medium;padding-left:5px;letter-spacing:-1px;">
                                                        <?php echo $frame; ?>
                                                    </span>
                                                </li>
                                                <li class='list-group-item d-flex align-items-start f3 text-Black pl-0'>
                                                    <img src="images/icons/speed-gear.png" style="width: 25px;height: 25px;">
                                                    <span style="font-family:'Roboto Mono',monospace;font-size:medium;padding-left:5px;letter-spacing:-1px;">
                                                        <?php echo $gear_name; ?>
                                                    </span>
                                                </li>
                                                <li class='list-group-item d-flex align-items-start f3 text-Black pl-0'>
                                                    <img src="images/icons/speed-meter.svg" style="width: 25px;height: 25px;">
                                                    <span style="font-family:'Roboto Mono',monospace;font-size:medium;padding-left:5px;letter-spacing:-1px;">
                                                        <?php echo $maxSpeed; ?> Kmph
                                                    </span>
                                                </li>
                                                <li class='list-group-item d-flex align-items-start f3 text-Black pl-0'>
                                                    <img src="images/icons/rim.png" style="width: 25px;height: 25px;">
                                                    <span style="font-family:'Roboto Mono',monospace;font-size:medium;padding-left:5px;letter-spacing:-1px;">
                                                        <?php echo $rims_name; ?>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class='bike-price text-center'>
                                            <p>&#8377; <?php echo $pro_price ?>/-</p>
                                        </div>
                                        <div class='bike-info text-center'>
                                            <a href='details.php?pro_id=<?php echo $product_id; ?>'>KNOW MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <style>
            /*FAQ styles*/
.faq-section{
    width: 100%;
    height: 90vh;
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.faq-container{
    width: 100%;
    max-width: 80rem;
    margin: 0 auto;
    padding: 0 1.5rem;
}
.accordion-item{
    background-color: #283042;
    border-radius: .4rem;
    margin-bottom: 1rem;
    padding: 1rem;
    box-shadow: .5rem 2px .5rem rgba(0,0,0,0.1);
}
.accordion-link{
    font-size: 1.6ren;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    background-color: #283042;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
}
.accordion-link i{
    color: #e7d5ff;
    padding: .5rem;
}
.accordion-link .ion-md-remove{
    display: none;
}
.answer{
    max-height: 0;
    overflow: hidden;
    position: relative;
    background-color: #212838;
    transition: max-height 650ms;
}
.answer::before{
    content: "";
    position: absolute;
    width: .6rem;
    height: 90%;
    background-color: #8fc460;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}
.answer p{
    color: rgba(255, 255, 255, 0.6);
    font-size: 1.4rem;
    padding: 2rem;
}
.accordion-item:target .answer{
    max-height: 20rem;
}
.accordion-item:target .accordion-link .ion-md-add{
    display: none;
}
.accordion-item:target .accordion-link .ion-md-remove{
    display: block;
}
        </style>



        <section class="faq-section">
            <div class="container-fluid faq-container">
            <h2 style="font-weight:700;">Frequently Asked Questions (FAQs)</h2>
                <div class="row">
                
                    <div class="col-md-6">
                        <div class="accordion">
                            <?php
                                $get_faq="SELECT * FROM faq order by faq_id ASC LIMIT 6";
                                $run_faq=mysqli_query($conn,$get_faq);
                                while($row_faq=mysqli_fetch_array($run_faq)){
                                    $faq_id=$row_faq['faq_id'];
                                    $faq_question=$row_faq['faq_question'];
                                    $faq_answer=$row_faq['faq_answer'];
                            ?>
                                <div class="accordion-item" id="question<?php echo $faq_id; ?>">
                                    <a class="accordion-link" href="#question<?php echo $faq_id; ?>" style="text-decoration: none;">
                                        <?php echo $faq_question; ?>
                                        <i class="icon ion-md-add"></i>
                                        <i class="icon ion-md-remove"></i>
                                    </a>
                                    <div class="answer">
                                        <?php echo $faq_answer; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="accordion">
                            <?php
                                $get_faq="SELECT * FROM faq order by faq_id DESC LIMIT 6";
                                $run_faq=mysqli_query($conn,$get_faq);
                                while($row_faq=mysqli_fetch_array($run_faq)){
                                    $faq_id=$row_faq['faq_id'];
                                    $faq_question=$row_faq['faq_question'];
                                    $faq_answer=$row_faq['faq_answer'];
                            ?>
                                <div class="accordion-item" id="question<?php echo $faq_id; ?>">
                                    <a class="accordion-link" href="#question<?php echo $faq_id; ?>" style="text-decoration: none;">
                                        <?php echo $faq_question; ?>
                                        <i class="icon ion-md-add"></i>
                                        <i class="icon ion-md-remove"></i>
                                    </a>
                                    <div class="answer">
                                        <span><?php echo $faq_answer; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php
            include("includes/footer.php")
        ?>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>