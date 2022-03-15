<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<?php

    if(isset($_GET['view_profile'])){
        $admin_email=$_GET['view_profile'];
        $get_p= "select * from admins where admin_email='$admin_email'";
        $run_p=mysqli_query($conn, $get_p);
        $row_p=mysqli_fetch_array($run_p);

        $a_id=$row_p['admin_id'];
        $a_name=$row_p['admin_name'];
        $a_email=$row_p['admin_email'];
        $a_image=$row_p['admin_image'];
        $a_country=$row_p['admin_country'];
        $a_about=$row_p['admin_about'];
        $a_contact=$row_p['admin_contact'];
        $a_role=$row_p['admin_role'];
    }

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
                <h1 class="page-header" style="color: #155567;">Profile</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-user"> Profile</i>
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
                                    <label class="col-md-3 control-label">Admin ID</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $a_id; ?>" name="admin_id" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $a_name; ?>" name="username" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $a_email; ?>" name="email" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Image</label>
                                    <div class="col-md-6">
                                        <input name="image" type="file" class="form-control" required>
                                        <br>
                                        <img width="100" height="100" src="admin_images/<?php echo $a_image; ?>" alt="<?php echo $a_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-md-6">
                                        <select name="country" class="form-control">
                                            <option><?php echo $a_country ?></option>
                                            <option>India</option>
                                            <option>USA</option>
                                            <option>China</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">About</label>
                                    <div class="col-md-6">
                                        <textarea name="about" class="form-control"><?php echo $a_about; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Contact</label>
                                    <div class="col-md-6">
                                        <input name="contact" type="text" value="<?php echo $a_contact; ?>" class="form-control" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" oninvalid="alert('Please Enter a valid Contact Number')" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Role</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $a_role; ?>" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="update" value="Update Profile" type="submit" class="btn btn-success form-control" required>
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

if(isset($_POST['update'])){

    $admin_id=$_POST['admin_id'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $country= $_POST['country'];
    $about= $_POST['about'];
    $contact= $_POST['contact'];

    $image= $_FILES['image']['name'];
    $temp_name1= $_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name1,"admin_images/$image");

    $check_email="select * from admins where admin_email='$email' AND admin_id NOT LIKE '%$admin_id%'";
    $run_email=mysqli_query($conn,$check_email);
    $count_email=mysqli_num_rows($run_email);

    if($count_email==0){

        $check_contact="select * from admins where admin_contact='$contact' AND admin_id NOT LIKE '%$admin_id%'";
        $run_contact=mysqli_query($conn,$check_contact);
        $count_contact=mysqli_num_rows($run_contact);

        if($count_contact==0){

            $update_user="update admins set admin_name='$username',admin_email='$email',admin_image='$image',admin_country='$country',admin_about='$about',admin_contact='$contact' where admin_id='$admin_id'";
            $run_product=mysqli_query($conn, $update_user);
            if($run_product){
                echo "<script>alert('Profile Updated Successfully ! !')</script>";
                echo "<script>window.open('login.php','_self')</script>";
                session_destroy();
            }
            else{
                echo "<script>alert('Oops! Something went wrong')</script>";
                echo "<script>window.open('index.php?view_users','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Contact Number Already in use')</script>";
            echo "<script>window.open('view_profile=$admin_email','_self')</script>";
        }        
    }
    else{
        echo "<script>alert('Email Already in use')</script>";
        echo "<script>window.open('view_profile=$admin_email','_self')</script>";
    }
}

?>
<?php } ?>
