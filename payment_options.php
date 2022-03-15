<div class="box">
    <?php

        $session_email= $_SESSION['customer_email'];
        $select_customer= "select * from customers where customer_email='$session_email'";
        $run_customer= mysqli_query($conn, $select_customer);
        $row_customer= mysqli_fetch_array($run_customer);

        $customer_id=$row_customer['customer_id'];

    ?>

    <h1 class="text-center">Payment Options</h1>
    <p class="lead">
        <a href="order.php?c_id=<?php echo $customer_id; ?>" style="text-decoration: none;">
            <img src="images/cod.jpg" alt="Cash on delivery" width="180" height="150">
            Cash on Delivery (COD)
        </a>
    </p>
    <p class="lead">
        <a href="pay_script.php?c_id=<?php echo $customer_id; ?>" style="text-decoration: none;">
            <img src="images/razorpay.png" alt="Pay with Razorpay" width="180" height="85">
            Razorpay
        </a>
    </p>
</div>
