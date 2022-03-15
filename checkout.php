<?php
$active='My Account';
include("includes/header.php");
?>

        <div id="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                            <?php
                                if(!isset($_SESSION['customer_email'])){
                                    echo "
                                    <li>Login</li>
                                    ";
                                }
                                else{
                                    echo "
                                    <li>Payment Options</li>
                                    ";
                                }
                            ?>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                        include("includes/sidebar.php")
                    ?>
                </div>

                <div class="col-md-9">
                    <?php

                        if(!isset($_SESSION['customer_email'])){

                            include("customer/customer_login.php");
                        }
                        else{
                            include("payment_options.php");
                        }
                    ?>
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