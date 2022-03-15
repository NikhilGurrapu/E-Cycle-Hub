<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<?php

    if(isset($_GET['edit_user'])){
        $admin_id=$_GET['edit_user'];
        $get_p= "select * from admins where admin_id='$admin_id'";
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
                <h1 class="page-header" style="color: #155567;">Edit User</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-bicycle"> Users / Edit User</i>
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
                                    <label class="col-md-3 control-label">Role</label>
                                    <div class="col-md-6">
                                        <select name="role" class="form-control">
                                            <option><?php echo $a_role; ?></option>
                                            <option>Admin</option>
                                            <option>Manager</option>
                                            <option>Staff</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input name="update" value="Update User Role" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $a_name; ?>" name="username" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $a_email; ?>" name="email" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Image</label>
                                    <div class="col-md-6">
                                        <img width="100" height="100" src="admin_images/<?php echo $a_image; ?>" alt="<?php echo $a_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $a_country ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Contact</label>
                                    <div class="col-md-6">
                                        <input name="contact" type="text" value="<?php echo $a_contact; ?>" class="form-control" readonly>
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
    $role= $_POST['role'];

    $update_user="update admins set admin_role='$role' where admin_id='$admin_id'";

    $run_product=mysqli_query($conn, $update_user);
    if($run_product){
        echo "<script>alert('User Updated Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }
    else{
        echo "<script>alert('Oops! Something went wrong')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
    }

}

?>
<?php } ?>
