<center>
    <h1>My Orders</h1>
    <p class="lead">YOUR ORDERS AT ONE PLACE</p>
    <p class="text-muted">
        If you have any questions feel free to <a href="../contact.php">Contact us</a>. Our Customer Service work 24/7.
    </p>
</center>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Invoice No</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Cancel Order</th>
            </tr>
        </thead>

        <tbody>

            <?php
                
                $i=0;
                $customer_session= $_SESSION['customer_email'];
                $get_customer= "select * from customers where customer_email='$customer_session'";
                $run_customer= mysqli_query($conn, $get_customer);
                $row_customer= mysqli_fetch_array($run_customer);

                $customer_id= $row_customer['customer_id'];

                $get_orders= "select * from customer_orders where customer_id='$customer_id'";
                $run_orders= mysqli_query($conn, $get_orders);

                while($row_orders=mysqli_fetch_array($run_orders)){
                    
                    $order_id= $row_orders['order_id'];
                    $product_id= $row_orders['product_id'];
                    $product_title= $row_orders['product_title'];
                    $product_image= $row_orders['product_image'];
                    $produtc_qty= $row_orders['qty'];
                    $due_amount= $row_orders['due_amount'];
                    $invoice_no= $row_orders['invoice_no'];
                    $order_status= $row_orders['order_status'];
                    $order_date= substr($row_orders['order_date'],0,11);

                    $i++;

            ?>
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $invoice_no; ?></td>
                <td><?php echo $product_title; ?></td>
                <td>
                    <a href="../details.php?pro_id=<?php echo $product_id; ?>">
                        <img src="../admin_area/product_images/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="140" height="90">
                    </a>
                </td>
                <td><?php echo $produtc_qty; ?></td>
                <td>&#8377;&nbsp;<?php echo $due_amount; ?>/-</td>
                <td><?php echo $order_date; ?></td>
                <td>
                    <?php
                    if($order_status=='Canceled'){
                        echo "
                        <span style='color: red; font-weight: bold; font-size: 16px;'><i class='fa fa-circle'></i> $order_status</span>
                </td>
                <td>
                </td>
                        ";
                    }else{
                        if($order_status=='Delivered'){
                            echo "
                                <a href='my_account.php?my_orders_status=$order_id'>
                                    <input type='button' name='order_status' value='Delivered' class='btn btn-success'>
                                </a>
                            </td>
                            <td>
                                <a href='my_account.php?my_orders'>
                                    <input type='button' name='cancel_order' value='Return' class='btn btn-danger'>
                                </a>
                            </td>
                            ";
                        }else{
                        echo "
                        <a href='my_account.php?my_orders_status=$order_id'>
                            <input type='button' name='order_status' value='Track Order' class='btn btn-success'>
                        </a>
                </td>
                <td>
                    <a href='my_account.php?cancel_order=$order_id'>
                        <input type='button' name='cancel_order' value='Cancel Order' class='btn btn-danger'>
                    </a>
                </td>
                        ";
                    }
                    }
                    ?>
            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>
<?php

if(isset($_POST['cancel_order'])){
    $get_order="UPDATE customers set order_status='Canceled' WHERE customer_id=$customer_id;";
    $run_order=mysqli_query($conn,$get_order);

    echo "<script>alert('Order '.$product_title.' Canceled ! !')</script>";
}

?>
