<?php
$active='Home';
include("includes/header.php");
?>

        <div class="container-fluid" id="slider"><!--conatiner slider start-->

            <div class="col-md-12"><!--col-md-12 start-->

                <div class="carousel slide" id="myCarousel"><!--carousel slide start-->

                    <ol class="carousel-indicators">
                        <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner">
                        <?php

                        $get_slides="select * from slider LIMIT 0,1";

                        $run_slider=mysqli_query($conn, $get_slides);

                        while($row_slides=mysqli_fetch_array($run_slider)){
                            $slide_name= $row_slides['slide_name'];
                            $slide_image= $row_slides['slide_image'];

                            echo "

                            <div class='item active'>
                            <img src='admin_area/slides_images/$slide_image'>
                            </div>

                            ";
                        }

                        $get_slides="select * from slider LIMIT 1,3";

                        $run_slider=mysqli_query($conn, $get_slides);

                        while($row_slides=mysqli_fetch_array($run_slider)){
                            $slide_name= $row_slides['slide_name'];
                            $slide_image= $row_slides['slide_image'];

                            echo "

                            <div class='item'>
                            <img src='admin_area/slides_images/$slide_image'>
                            </div>

                            ";
                        }
                        ?>
                    </div>

                    <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a href="#myCarousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div><!--carousel slide end-->


            </div><!--col-md-12 end-->

        </div><!--container slider end-->

        <!--intro start-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center info-text">
                        <p class="p-info-text">
                            Experience the new thing, the next-gen thing. 
                            The electric energetic majestic e-bike you will want to take a selfie with and ride with pride, for a healthier life and a greener planet.
                            <br>
                            Make a move with our e-bikes, and flaunt your smart choice. 
                            Flaunt your style, flaunt your speed, flaunt your smile, flaunt the power! And be prepared for the stares as you zip past the world full throttle and people are left in awe.
                            <br>
                            <strong>Want it, Flaunt it!</strong>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!--intro end-->

        <!--Electrofying Features start-->
        <!--
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading text-center">
                            <h1 class="electrofying-heading">Electrifying Features</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img class="electrifying-features-img" src="https://www.herolectro.com/assets/images/battery.webp" alt="Hero Lectro E-Bike Battery">
                    </div>
                    <div class="col-lg-6 align-slef-center">
                        <div class="product-info text-center">
                            <h4 class="h4styles">Battery</h4>
                            <p class="pstyles">
                            The powerhouse of an e-bike, Our Li-ion batteries are BIS certified and IP67 rating makes them water repellent and provides 100% dust protection, to ensure you ride carefree in all weathers.
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="hl" align="right">
            </div>
        </section>  

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center order-md-1">
                        <div class="product-info text-center">
                            <h4 class="h4styles">Motor</h4>
                            <p class="pstyles">
                            Our e-bikes come fitted with a high torque, 250W BLDC motor. Highly efficient and more torque per watt. Powerful performance with silent operation and a longer life.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="electrifying-features-img" src="https://www.herolectro.com/assets/images/motor.webp" alt="Hero Lectro E-Bike Battery">
                    </div>
                </div>
                <hr class="hl" align="left">
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img class="electrifying-features-img" src="https://www.herolectro.com/assets/images/led-display.webp" alt="Hero Lectro E-Bike Battery">
                    </div>
                    <div class="col-lg-6">
                        <div class="product-info text-center">
                            <h4 class="h4styles">LED Display</h4>
                            <p class="pstyles">
                            Manage all functions of your e-bike with the handy LED display. Switch the battery on-off or toggle between 4 modes, the IP65 rated display does it all eamlessly in all weathers.
                            </p>
                        </div>
                    </div>
                </div>
                <hr class="hl" align="right">
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <div class="product-info">
                            <h4 class="h4styles">Headlamp</h4>
                            <p class="pstyles">
                            Fit your e-bike with the LED headlamp and never go dark again. With the high intensity lumination you receive from the headlamp, riding early mornings or late nights gets easier.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="electrifying-features-img" src="https://www.herolectro.com/assets/images/headlamp.webp" alt="Hero Lectro E-Bike Battery">
                    </div>
                </div>
                <hr class="hl" align="left">
            </div>
        </section>
                        -->
        <!--Electrofying Features start-->

        <!--Riding Style start-->
        <section class="light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading text-center">
                            <h1 class="h1-ride-style">Choose your Riding Style</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 icon-info">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="https://www.herolectro.com/assets/images/icon1.webp" alt="Throttle">
                            </div>
                            <h4 class="h4-ride-style">THROTTLE</h4>
                            <p class="p-ride-style">
                                Simply twist and go at 25km/hr with Throttle mode. 100% electric mode, experience the full power of battery.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 icon-info">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="https://www.herolectro.com/assets/images/icon2.webp" alt="Pedelec">
                            </div>
                            <h4 class="h4-ride-style">PEDELEC</h4>
                            <p class="p-ride-style">
                            Pedal with upto 90% electric assist. Choose the electric support you need out of 3 settings - high, medium, low.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 icon-info">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="https://www.herolectro.com/assets/images/icon3.webp" alt="Cruise">
                            </div>
                            <h4 class="h4-ride-style">CRUISE</h4>
                            <p class="p-ride-style">
                            Glide at constant speed of 6km/hr at the push of a button. No pedaling required, 100% electric.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 icon-info">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="https://www.herolectro.com/assets/images/icon4.webp" alt="Pedal">
                            </div>
                            <h4 class="h4-ride-style">PEDAL</h4>
                            <p class="p-ride-style">
                            Ride the conventional way, all mechanical power. Pure pedaling, no electric support. Save battery.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Riding Style End-->

        <!-- E-bike start-->
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading text-center">
                            <h1>Which E-bike is right for you?</h1>
                            <div class="show-all-models text-center">
                                <a href="shop.php"><h3>See all models</h3></a>
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
                            $get_products= "select * from products order by 1 DESC LIMIT 4";

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
                            <div class='col-md-3 single'>
                            <span class="thumb-product-type">NEW</span>
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
        <!-- E-bike end-->

        
        <?php
            include("includes/footer.php")
        ?>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>
