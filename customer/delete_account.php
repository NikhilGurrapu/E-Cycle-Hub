<center>
    <h1>Do you realy want to Delete your account ?</h1>
    <br><br>
    <form action="" method="post">
        <input type="submit" name="Yes" value="Yes, I want to delete" class="btn btn-danger">

        <input type="submit" name="No" value="No, I don't want to delete" class="btn btn-primary">
    </form>
    <br><br>
</center>

<?php

$c_email=$_SESSION['customer_email'];
if(isset($_POST['Yes'])){
    

    $get_id="select * from customers where customer_email='$c_email'";
    $run_id=mysqli_query($conn,$get_id);
    $row_id=mysqli_fetch_array($run_id);

    $p_cat_id=$row_id['customer_id'];
    

    $delete_order="delete from customer_orders where customer_id='$p_cat_id'";
    $run_order=mysqli_query($conn,$delete_order);
    if($run_order){

        $delete_payment="delete from payments where customer_id='$p_cat_id'";
        $run_payment=mysqli_query($conn,$delete_payment);
        if($run_payment){

            $delete_p_cat="delete from customers where customer_id='$p_cat_id'";
            $run_delete_customer=mysqli_query($conn, $delete_p_cat);
            if($run_delete_customer){
                session_destroy();
                echo "<script>alert('Account Deleted Successfully')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    }
}

if(isset($_POST['No'])){
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}

?>