<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Insert Products</title>
        
    </head>
    <body>
        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert User</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-users"> Users / Insert User</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default"><!--panel panel-default start-->
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input name="username" type="text" class="form-control" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input name="email" type="text" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input name="password" type="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Image</label>
                                    <div class="col-md-6">
                                        <input name="image" type="file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-md-6">
                                        <select name="country" class="form-control">
                                            <option>Select Country</option>
                                            <option>India</option>
                                            <option>USA</option>
                                            <option>China</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">About</label>
                                    <div class="col-md-6">
                                        <textarea name="about" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Contact</label>
                                    <div class="col-md-6">
                                        <input name="contact" oninvalid="alert('Format for Contact Number: 1234567890');" title="Format for Contact Number: 1234567890" type="text" class="form-control" placeholder="Contact" pattern="[6-9]{1}[0-9]{9}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Role</label>
                                    <div class="col-md-6">
                                        <select name="role" class="form-control">
                                            <option>Select Admin Role</option>
                                            <option>Admin</option>
                                            <option>Manager</option>
                                            <option>Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="submit" value="Insert User" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>
<?php

if(isset($_POST['submit'])){

    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $country= $_POST['country'];
    $about= $_POST['about'];
    $contact= $_POST['contact'];
    $role= $_POST['role'];

    $image= $_FILES['image']['name'];

    $temp_name1= $_FILES['image']['tmp_name'];

    move_uploaded_file($temp_name1,"admin_images/$image");

    $check_admin_e="SELECT * FROM admins WHERE admin_email='$email'";
    $run_check_e=mysqli_query($conn,$check_admin_e);
    if(mysqli_num_rows($run_check_e)>0){
        echo "<script>alert('Email Already in Use')</script>";
        echo "<script>window.open('index.php?insert_user','_self')</script>";
    }
    else{
        $check_admin_c="SELECT * FROM admins WHERE admin_contact='$contact'";
        $run_check_c=mysqli_query($conn,$check_admin_c);
        if(mysqli_num_rows($run_check_c)>0){
            echo "<script>alert('Contact Already Register')</script>";
            echo "<script>window.open('index.php?insert_user','_self')</script>";
        }
        else{
            $insert= "insert into admins(admin_name,admin_email,admin_pass,admin_image,admin_country,admin_about,admin_contact,admin_role) 
            values('$username','$email','$password','$image','$country','$about','$contact','$role')";
            $run= mysqli_query($conn,$insert);
            if($run){
                echo "<script>alert('Successfully Inserted New User')</script>";
                echo "<script>window.open('index.php?view_users','_self')</script>";
            }
            else{
                echo "<script>alert('Oops! Something went wrong..')</script>";
                echo "<script>window.open('index.php?insert_user','_self')</script>";
            }
        }
    }
}

?>
<?php } ?>