<?php

    $customer_session= $_SESSION['customer_email'];
    $get_customer="select * from customers where customer_email='$customer_session'";
    $run_customer=mysqli_query($conn,$get_customer);
    $row_customer=mysqli_fetch_array($run_customer);

    $customer_id= $row_customer['customer_id'];
    $customer_name= $row_customer['customer_name'];
    $customer_lname= $row_customer['customer_lname'];
    $customer_email= $row_customer['customer_email'];
    $customer_state= $row_customer['customer_state'];
    $customer_city= $row_customer['customer_city'];
    $customer_contact= $row_customer['customer_contact'];
    $customer_address= $row_customer['customer_address'];
    $customer_image= $row_customer['customer_image'];

?>

<h1 align="center">Edit Account Details</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>First Name:</label>
        <input type="text" name="c_name" value="<?php echo $customer_name; ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Last Name:</label>
        <input type="text" name="c_lname" value="<?php echo $customer_lname; ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="c_email" value="<?php echo $customer_email; ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label>State:</label>
        <input type="text" name="c_state" value="<?php echo $customer_state; ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label>City:</label>
        <input type="text" name="c_city" value="<?php echo $customer_city; ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Contact:</label>
        <input type="text" name="c_contact" value="<?php echo $customer_contact; ?>" class="form-control" pattern="[6-9]{1}[0-9]{9}" oninvalid="alert('Please Enter a valid Contact Number')" title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
    </div>

    <div class="form-group">
        <label>Address:</label>
        <input type="text" name="c_address" value="<?php echo $customer_address; ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Image:</label>
        <img src="customer_images/<?php echo $customer_image ?>" alt="Proflie image" class="img-responsive" width="500" height="500">
        <br>
        <input type="file" name="c_image" class="form-control form-height-custom" required>
    </div>

    <div class="text-center">
        <button class="btn btn-success" name="update" type="submit">
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>
</form>

<?php

if(isset($_POST['update'])){
    $update_id=$customer_id;

    $c_name= $_POST['c_name'];
    $c_lname= $_POST['c_lname'];
    $c_email= $_POST['c_email'];
    $c_state= $_POST['c_state'];
    $c_city= $_POST['c_city'];
    $c_contact= $_POST['c_contact'];
    $c_address= $_POST['c_address'];

    $c_image= $_FILES['c_image']['name'];
    $c_image_tmp= $_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp,"customer_images/$c_image");

    $check_email="select * from customers where customer_email='$c_email' AND customer_id NOT LIKE '%$customer_id%'";
    $run_email=mysqli_query($conn,$check_email);
    $count_email=mysqli_num_rows($run_email);

    if($count_email==0){

        $check_contact="select * from customers where customer_contact='$c_contact' AND customer_id NOT LIKE '%$customer_id%'";
        $run_contact=mysqli_query($conn,$check_contact);
        $count_contact=mysqli_num_rows($run_contact);

        if($count_contact==0){

            $update_customer= "update customers set customer_name='$c_name',customer_email='$c_email',customer_state='$c_state',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";

            $run_customer=mysqli_query($conn,$update_customer);

            if($run_customer){
                echo "<script>alert('Your account details has been editied..')</script>";
                echo "<script>alert('Please Relogin to complete the Process...')</script>";
                echo "<script>window.open('../logout.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Contact Number Already in use')</script>";
            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Email Already in use')</script>";
        echo "<script>window.open('my_account.php?edit_account','_self')</script>";
    }

}

?>