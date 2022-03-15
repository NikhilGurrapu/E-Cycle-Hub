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
                        <li>
                            Register
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                        include("includes/sidebar.php")
                    ?>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <center>
                                <h2>Register a new account</h2>
                            </center>

                            <form action="customer_register.php" method="post" enctype="multipart/form-data">

                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_name" placeholder="First Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_lname" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Email</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="c_email" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Password</label>
                                    <div class="form-group">
                                        <input type="password" name="c_password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    </div>
                                </div>

                                <br>

                                <div class="col-md-6">
                                    <label>State</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_state" placeholder="State" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>City</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_city" placeholder="City" required>
                                    </div>
                                </div>

                                <br>

                                <div class="col-md-6">
                                    <label>Contact</label>
                                    <div class="form-group">
                                        <input type="text" oninvalid="alert('Please Enter a valid Contact Number')" class="form-control" name="c_contact" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="c_address" placeholder="Address" required>
                                    </div>
                                </div>

                                <br>
                                
                                <div class="col-md-12">
                                    <label>Profile picture</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control form-height-custom" placeholder="Profile picture" name="c_img" required>
                                    </div>
                                </div>
                                
                                
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit" name="register">
                                    <i class="fa fa-user-md"></i> Register
                                    </button>
                                    
                                </div>
                            </form>

                            <center>
                                <a href="checkout.php">
                                    <h5>Already have an account? Login Here</h5>
                                </a>
                            </center>

                        </div>
                    </div>
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

<?php


if(isset($_POST['register'])){

    $c_name= $_POST['c_name'];
    $c_lname= $_POST['c_lname'];
    $c_email= $_POST['c_email'];
    $c_password= $_POST['c_password'];
    $c_state= $_POST['c_state'];
    $c_city= $_POST['c_city'];
    $c_contact= $_POST['c_contact'];
    $c_address= $_POST['c_address'];
    $c_image= $_FILES['c_img']['name'];

    $c_image_tmp= $_FILES['c_img']['tmp_name'];

    $c_ip= getRealIpUser();

    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

    $check_email="select * from customers where customer_email='$c_email'";
    $run_email=mysqli_query($conn,$check_email);
    $count_email=mysqli_num_rows($run_email);

    if($count_email==0){

        $check_contact="select * from customers where customer_contact='$c_contact'";
        $run_contact=mysqli_query($conn,$check_contact);
        $count_contact=mysqli_num_rows($run_contact);

        if($count_contact==0){

            $insert_customer= "insert into customers(customer_name,customer_lname,customer_email,customer_pass,customer_state,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_lname','$c_email','$c_password','$c_state','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
            $run_customer= mysqli_query($conn,$insert_customer);
        
            $sel_cart= "select * from cart where ip_add='$c_ip'";
            $run_cart=mysqli_query($conn, $sel_cart);
            $check_cart= mysqli_num_rows($run_cart);
        
            if($check_cart>0){

                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('Successfully Registered')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
        
            }
            else{

                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('Successfully Registered')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Contact Number Already in use')</script>";
            echo "<script>window.open('customer_register.php','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Email Already in use')</script>";
        echo "<script>window.open('customer_register.php','_self')</script>";
    }
}


?>