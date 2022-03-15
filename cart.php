<?php
$active='Shopping Cart';
include("includes/header.php");
?>

        <div id="content"><!--content start-->
            <div class="container-fluid">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            Cart
                        </li>
                    </ul>
                </div>

                <div class="col-md-9" id="cart"><!--col-md-9 start-->
                    <form action="cart.php" method="post" enctype="multipart/form-data">
                        <h1>Shopping Cart</h1>

                        <?php

                            $ip_add= getRealIpUser();
                            $select_cart= "select * from cart where ip_add='$ip_add'";
                            $run_cart= mysqli_query($conn,$select_cart);
                            $count= mysqli_num_rows($run_cart);


                        ?>


                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>

                        <div class="table-responsive"><!--table-responsive start-->
                            <table class="table"><!--table start-->
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th colspan="1">Delete</th>
                                        <th>Sub-Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                        $sub_price=0;
                                        $total=0;
                                        while($row_cart=mysqli_fetch_array($run_cart)){

                                            $pro_id= $row_cart['p_id'];
                                            $pro_qty= $row_cart['qty'];
                                            
                                            $get_products= "select * from products where product_id='$pro_id'";
                                            $run_products= mysqli_query($conn, $get_products);

                                            while($row_products=mysqli_fetch_array($run_products)){
                                                
                                                $product_title= $row_products['product_title'];
                                                $product_img1= $row_products['product_img1'];
                                                $product_price= $row_products['product_price'];

                                                $sub_price= $row_products['product_price']*$pro_qty;

                                                $total+=$sub_price;

                                    ?>
                                    <tr>
                                        <td>
                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product image">
                                        </td>
                                        <td>
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
                                        </td>
                                        <td>
                                            <?php echo $product_price; ?>/-
                                        </td>
                                        <td><?php echo $pro_qty; ?></td>
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                        </td>
                                        <td>
                                            <?php echo $sub_price; ?>/-
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th colspan="2"><?php echo $total; ?>/-</th>
                                    </tr>
                                </tfoot>

                            </table><!--table end-->
                        </div><!--table-responsive end-->

                        <div class="box-footer"><!--box-footer start-->
                            <div class="pull-left"><!--pull-left start-->
                                <a href="shop.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i>&nbsp;Continue Shopping
                                </a>
                            </div><!--pull-left start-->

                            <div class="pull-right"><!--pull-right start-->
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                    <i class="fa fa-refresh"></i>&nbsp;Update Cart
                                </button>

                                <a href="checkout.php" class="btn btn-primary">
                                    Proceed Checkout <i class="fa fa-chevron-right"></i>
                                </a>

                            </div>
                        </div><!--box-footer end-->
                        

                    </form>
                </div><!--col-md-9 end-->

                <?php
                    function update_cart(){
                        global $conn;

                        if(isset($_POST['update'])){

                            foreach($_POST['remove'] as $remove_id){
                                $delete_product= "delete from cart where p_id='$remove_id'";
                                $run_delete= mysqli_query($conn, $delete_product);

                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }

                        }
                    }
                    echo @$up_cart= update_cart();
                ?>


                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order Summary</h3>
                        </div>

                        <p class="text-muted">
                            Shipping and additional costs are calculated based on value you have entered
                        </p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order Sub-Total</td>
                                        <th>&#8377; <?php echo $total; ?>/-</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and Handling</td>
                                        <th>&#8377; 0/-</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>&#8377; 0/-</th>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <th>&#8377; <?php echo $total; ?>/-</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12">
                    <h2>Products you may Like !</h2>
                    <div class="row" id="thumbs">
                            <?php
                                $get_products= "select * from products order by rand() LIMIT 0,4";
                                $run_products= mysqli_query($conn, $get_products);
                                while($row_products=mysqli_fetch_array($run_products)){
                                    $pro_id= $row_products['product_id'];
                                    $pro_title= $row_products['product_title'];
                                    $pro_price= $row_products['product_price'];
                                    $pro_image1= $row_products['product_img1'];

                                    echo "
                                        <div class='col-md-3 col-sm-6 center-responsive'>
                                            <div class='product same-height'>
                                                <a href='details.php?pro_id=$pro_id'>
                                                    <img class='img-responsive' src='admin_area/product_images/$pro_image1'>
                                                </a>
                                                <div class='text'>
                                                    <h3 align='center'>
                                                        <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                                                    </h3>
                                                    <p class='price'>$pro_price/-</p>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div><!--content end-->
        <?php
        include("includes/footer.php");
        ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>

    </body>
</html>