<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php?my_orders">My Account</a></li>
                </ul><!--ul end-->

                <hr>

                <h4>User Section</h4>
                <ul>
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
                        else{
                            echo "
                            <li>
                                <a href='logout.php'>Logout</a>
                            </li>
                            ";
                        }

                    ?>
                    <?php
                        $get_term="select * from terms";
                        $run_term=mysqli_query($conn,$get_term);
                        while($row_term=mysqli_fetch_array($run_term)){
                            $term_id=$row_term['term_id'];
                            $term_title=$row_term['term_title'];
                            $term_para=$row_term['term_para'];
                    ?>
                    <li>
                        <button onclick="document.getElementById('id0<?php echo $term_id; ?>').style.display='block'" style="width:auto;"><?php echo $term_title; ?></button>
                        <div id="id0<?php echo $term_id; ?>" class="modal">
                            <div class="container-a">
                                <form class="modal-content animate" action="#" method="post">
                                    <div class="imgcontainer">
                                    <span onclick="document.getElementById('id0<?php echo $term_id; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    </div>
                                    <div class="container-a">
                                        <h2><?php echo $term_title; ?></h2>
                                    </div>
                                    <div class="container-a" style="background-color:#f1f1f1">
                                        <p><?php echo $term_para; ?></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            var modal = document.getElementById('id0<?php echo $term_id; ?>');
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        </script>
                    </li>
                    <?php } ?>
                    
                </ul><!--ul end-->

                <hr class="hidden-md hidden-lg hidden-sm">
            </div><!--col-sm-6 col-md-3 end-->

            <div class="col-sm-6 col-md-3">
                <h4>Top Products Categories</h4>
                <ul>
                    <?php
                    $get_p_cats="select * from product_categories order by rand() LIMIT 0,10";

                    $run_p_cats= mysqli_query($conn,$get_p_cats);
                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                        $p_cat_id=$row_p_cats['p_cat_id'];
                        $p_cat_title=$row_p_cats['p_cat_title'];
                        $p_cat_desc=$row_p_cats['p_cat_desc'];

                        echo "
                            <li>
                                <a href='shop.php?p_cat_id=$p_cat_id'>
                                    $p_cat_title
                                </a>
                            </li>
                        ";
                    }
                    ?>
                </ul>

                <hr class="hidden-md hidden-lg">
            </div><!--col-sm-6 col-md-3 end-->

            <div class="col-sm-6 col-md-3">
                <h4>Find Us</h4>
                <p>
                    <strong>E-cycle Hub inc.</strong>
                    <br/>Sion, Mumbai
                    <br/>Maharashtra
                    <br/>180-180-1818
                    <br/>ecycleshub@gmail.com
                    <br/><strong>Nikhil.G</strong>
                </p>

                <a href="contact.php">Check Our Contact Page</a>

                <hr class="hidden-md hidden-lg">
            </div>

            <div class="col-sm-6 col-md-3">
                <h4>Keep in Touch</h4>

                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
            </div>
        </div><!--row end-->
    </div><!--container end-->
</div><!--footer end-->

<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">&copy; 2022 E-CYCLE HUB | All Rights Reserved.</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">incase of any concern, <a href="contact.php">Contact Us</a></p>
        </div>
    </div>
</div><!--copyright end-->