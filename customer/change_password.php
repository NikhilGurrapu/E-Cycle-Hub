<h1 align="center">Change Password</h1>

<form action="" method="post">
    <div class="form-group">
        <label>Current Password:</label>
        <input type="password" name="current_password" class="form-control" required>
    </div>

    <div class="form-group">
        <label>New Password:</label>
        <input type="password" name="new_password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    </div>

    <div class="form-group">
        <label>Confirm New Password:</label>
        <input type="password" name="confirm_new_password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    </div>

    <div class="text-center">
        <button class="btn btn-success" name="submit" type="submit">
            <i class="fa fa-user-md"></i> Update
        </button>
    </div>
</form>

<?php

if(isset($_POST['submit'])){
    $c_email=$_SESSION['customer_email'];

    $c_old_password= $_POST['current_password'];
    $c_new_password= $_POST['new_password'];
    $c_confirm_new_password= $_POST['confirm_new_password'];

    $sel_c_old_pass="select * from customers where customer_email='$c_email' AND customer_pass='$c_old_password'";
    $run_c_old_pass=mysqli_query($conn,$sel_c_old_pass);
    $check_c_old_pass=mysqli_fetch_array($run_c_old_pass);

    if($check_c_old_pass==0){
        echo "<script>alert('Sorry, Incorrect Current password. Please Try again ! !')</script>";
        exit();
    }
    else{
        if($c_new_password!=$c_confirm_new_password){
            echo "<script>alert('Sorry, new password don;t match confirm password')</script>";
            exit();
        }
        else{
            $update_c_pass="update customers set customer_pass='$c_new_password' where customer_email='$c_email'";
            $run_c_pass=mysqli_query($conn,$update_c_pass);
        
            if($run_c_pass){
                echo "<script>alert('Password Updated Successfully')</script>";
                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
            }
            else{
                echo "<script>alert('Oops! Something went wrong ! !')</script>";
                echo "<script>window.open('my_account.php?change_password','_self')</script>";
            }
        }
    }
}

?>