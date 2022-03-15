<div class="box">
    <div class="box-header">
        <center>
            <h1>Login</h1>
        </center>
    </div>
<br>
    <form method="post" action="checkout.php">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="c_email" class="form-control" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="c_pass" class="form-control" placeholder="Password" required>
        </div>
        <br>
        <div class="text-center">
            <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Login
            </button>
        </div>
    </form>
    <br>
    <div>
        <span align="left">
        <a href="customer_register.php">
            <h5>Don't have account? Register Here</h5>
        </a>
        </span>
        <span align="right">
        <a href="#">
            <h5>Forgot password</h5>
        </a>
        </span>
    </div>
</div>

<?php

if(isset($_POST['login'])){
    $c_email= $_POST['c_email'];
    $c_pass= $_POST['c_pass'];

    $get_ip= getRealIpUser();

    $select_c= "select * from customers where customer_email='$c_email' AND customer_pass='$c_pass'";
    $run_c=mysqli_query($conn, $select_c);
    $check_c= mysqli_num_rows($run_c);

    $select_cart= "select * from cart where ip_add='$get_ip'";
    $run_cart= mysqli_query($conn, $select_cart);
    $check_cart= mysqli_num_rows($run_cart);

    if($check_c==0){
        echo "<script>alert('Incorrect Email/Passoword.....')</script>";
        exit();
    }
    if($check_c==1 AND $check_cart==0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You are Logged In')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You are Logged In')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
}

?>

