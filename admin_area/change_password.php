<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<?php

    if(isset($_GET['change_password'])){
        $admin_email=$_GET['change_password'];
        $get_p= "select * from admins where admin_email='$admin_email'";
        $run_p=mysqli_query($conn, $get_p);
        $row_p=mysqli_fetch_array($run_p);

        $a_id=$row_p['admin_id'];
        $a_pass=$row_p['admin_pass'];
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
                        <i class="fa fa-user"> Proflie/ Change Password</i>
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
                                    <label class="col-md-3 control-label">Current Password</label>
                                    <div class="col-md-6">
                                        <input name="old_pass" type="password" class="form-control" placeholder="Current Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">New Password</label>
                                    <div class="col-md-6">
                                        <input name="new_pass" type="password" class="form-control" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm New Password</label>
                                    <div class="col-md-6">
                                        <input name="c_new_pass" type="password" class="form-control" placeholder="Confirm New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="update" value="Change Password" type="submit" class="btn btn-success form-control" required>
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
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $c_new_pass=$_POST['c_new_pass'];
    
    if($old_pass==$a_pass){
        if($new_pass==$c_new_pass){
            $update="UPDATE admins SET admin_pass='$c_new_pass' WHERE admin_id='$a_id'";
            $run_update=mysqli_query($conn,$update);
            if($run_update){
                echo "<script>alert('Password Updated Successfully')</script>";
                echo "<script>window.open('index.php?dashboard','_self')</script>";
            }
            else{
                echo "<script>alert('Oops! Something went wrong...')</script>";
                echo "<script>window.open('index.php?change_password=$admin_email','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Sorry, new password don;t match confirm password')</script>";
            echo "<script>window.open('index.php?change_password=$admin_email','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Sorry, Incorrect Current password. Please Try again ! !')</script>";
        echo "<script>window.open('index.php?change_password=$admin_email','_self')</script>";
    }
}

?>
<?php } ?>
