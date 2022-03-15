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
                <h1 class="page-header" style="color: #155567;">Insert Brand</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Brand Name</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default"><!--panel panel-default start-->
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Brand Name</label>
                                    <div class="col-md-6">
                                        <input name="brand_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="brand_insert" value="Insert Brand" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->


        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Colors</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Colors</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default"><!--panel panel-default start-->
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Color name</label>
                                    <div class="col-md-6">
                                        <input name="color_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="color_insert" value="Insert Color" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Frame</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Frame Type</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Frame type</label>
                                    <div class="col-md-6">
                                        <select name="frame_type" class="form-control">
                                        <option value="N/A">Select Frame Type</option>
                                        <option value="Alloy">Alloy</option>
                                        <option value="Carbon">Carbon</option>
                                        <option value="Steel">Steel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Frame Name</label>
                                    <div class="col-md-6">
                                        <input name="frame_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="frame_insert" value="Insert Frame" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Battery</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Battery Type</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Battery Name</label>
                                    <div class="col-md-6">
                                        <input name="battery_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="battery_insert" value="Insert Battery Name" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Motor</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Motor</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Motor type</label>
                                    <div class="col-md-6">
                                        <select name="motor_type" class="form-control">
                                        <option value="N/A">Select Motor Type</option>
                                        <option value="Brushless DC Motor">Brushless DC Motor</option>
                                        <option value="HUB Motor">HUB Motor</option>
                                        <option value="Mid-Drive Motor">Mid-Drive Motor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Motor Name</label>
                                    <div class="col-md-6">
                                        <input name="motor_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="motor_insert" value="Insert Motor Name" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Fork/Suspension</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Fork/Suspension</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Fork/Suspension type</label>
                                    <div class="col-md-6">
                                        <select name="fork_type" class="form-control">
                                        <option value="N/A">Select Fork/Suspension Type</option>
                                        <option value="Fork">Fork</option>
                                        <option value="Suspension">Suspension</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Fork/Suspension Name</label>
                                    <div class="col-md-6">
                                        <input name="fork_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="fork_insert" value="Insert Fork/Suspension" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Gear</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Gear</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Gear Name</label>
                                    <div class="col-md-6">
                                        <input name="gear_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="gear_insert" value="Insert Gear" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Rims of Wheels</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Rims of Wheels Type</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Rims type</label>
                                    <div class="col-md-6">
                                        <select name="rims_type" class="form-control">
                                            <option value="N/A">Select Rims Type</option>
                                            <option value="Alloy">Alloy</option>
                                            <option value="Carbon">Carbon</option>
                                            <option value="Steel">Steel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Rims Name</label>
                                    <div class="col-md-6">
                                        <input name="rims_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="rims_insert" value="Insert Rims" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Tyre</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Tyre</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Tyre Size</label>
                                    <div class="col-md-6">
                                        <input name="tyre_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="tyre_insert" value="Insert Tyre size" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Pedal</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Mileage Pedal</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Mileage Pedal (in Kms)<br><span><i>only add number</i></span></label>
                                    <div class="col-md-6">
                                        <input name="pedal_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="pedal_insert" value="Insert Pedal" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Throttle</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Mileage Throttle</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Mileage Throttle (in Kms)<br><span><i>only add number</i></span></label>
                                    <div class="col-md-6">
                                        <input name="throttle_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="throttle_insert" value="Insert Throttle" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Brake</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Brake</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Brake Name</label>
                                    <div class="col-md-6">
                                        <input name="break_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="break_insert" value="Insert Brake" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Display</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Display</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Display Name</label>
                                    <div class="col-md-6">
                                        <input name="display_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="display_insert" value="Insert Display" type="submit" class="btn btn-success form-control" required>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                    </div><!--panel-heading end-->
                </div><!--panel panel-default end-->       

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Distance</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Insert Distance</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->

        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->

                <div class="panel panel-default">
                    <div class="panel-heading"><!--panel-heading start-->

                        <div class="panel-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Distance</label>
                                    <div class="col-md-6">
                                        <input name="distance_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="distance_insert" value="Insert Distance" type="submit" class="btn btn-success form-control" required>
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

if(isset($_POST['color_insert'])){

    $color_name= $_POST['color_name'];
    $check_p_cat="SELECT * FROM colors WHERE color_name='$color_name'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Color Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into colors(color_name) values('$color_name')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Successfully Inserted COLOR')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>
<?php

if(isset($_POST['frame_insert'])){

    $frame_name= $_POST['frame_name'];
    $frame_type= $_POST['frame_type'];

    $check_p_cat="SELECT * FROM spec WHERE spec_name='$frame_name' AND spec_type='$frame_type' AND spec='Frame'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Frame Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$frame_name','$frame_type','Frame')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Frame Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>
<?php

if(isset($_POST['battery_insert'])){

    $battery_name= $_POST['battery_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_name' AND spec_type='Battery' AND spec='Battery'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Battery Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_name','Battery','Battery')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Battery Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>

<?php

if(isset($_POST['motor_insert'])){

    $motor_type= $_POST['motor_type'];
    $motor_name= $_POST['motor_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$motor_name' AND spec_type='$motor_type' AND spec='Motor'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Motor Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$motor_name','$motor_type','Motor')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Motor Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>

<?php

if(isset($_POST['fork_insert'])){

    $motor_type= $_POST['fork_type'];
    $motor_name= $_POST['fork_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$motor_name' AND spec_type='$motor_type' AND spec='Fork'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Fork / Suspension Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$motor_name','$motor_type','Fork')";
        $run_product= mysqli_query($conn,$insert_product);
        if($run_product){
            echo "<script>alert('Fork / Suspension Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>
<?php

if(isset($_POST['gear_insert'])){

    $battery_name= $_POST['gear_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_name' AND spec_type='Gear' AND spec='Gear'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Gear Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_name','Gear','Gear')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Gear Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>
<?php

if(isset($_POST['rims_insert'])){

    $frame_name= $_POST['rims_name'];
    $frame_type= $_POST['rims_type'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$frame_name' AND spec_type='$frame_type' AND spec='Rims'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Rims Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$frame_name','$frame_type','Rims')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Rims Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>
<?php

if(isset($_POST['pedal_insert'])){

    $battery_name= $_POST['pedal_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_name' AND spec_type='Mileage Pedal' AND spec='Mileage Pedal'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Pedal Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_name','Mileage Pedal','Mileage Pedal')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Pedal Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>
<?php

if(isset($_POST['throttle_insert'])){

    $battery_type= $_POST['throttle_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_type' AND spec_type='Mileage Throttle' AND spec='Mileage Throttle'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Throttle Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_type','Mileage Throttle','Mileage Throttle')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Throttle Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }    
}

?>
<?php

if(isset($_POST['break_insert'])){

    $battery_name= $_POST['break_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_name' AND spec_type='Brakes' AND spec='Brakes'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Brakes Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_name','Brakes','Brakes')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Brakes Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }

    
}

?>
<?php

if(isset($_POST['display_insert'])){

    $battery_name= $_POST['display_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_name' AND spec_type='Display' AND spec='Display'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Display Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_name','Display','Display')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Display Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }

    
}

?>
<?php

if(isset($_POST['distance_insert'])){

    $battery_name= $_POST['distance_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_name' AND spec_type='Distance' AND spec='Distance'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Distance Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_name','Distance','Distance')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Distance Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }

    
}

?>
<?php

if(isset($_POST['brand_insert'])){

    $battery_name= $_POST['brand_name'];
    $check_p_cat="SELECT * FROM brands WHERE brand_name='$battery_name'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Brand Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into brands(brand_name) values('$battery_name')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('New Brand Inserted')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }

    
}

?>
<?php

if(isset($_POST['tyre_insert'])){

    $battery_name= $_POST['tyre_name'];
    $check_p_cat="SELECT * FROM spec WHERE spec_name='$battery_name' AND spec_type='Tyre' AND spec='Tyre'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Motor Details Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into spec(spec_name,spec_type,spec) values('$battery_name','Tyre','Tyre')";

        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('New Tyre Inserted..')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }
}

?>
<?php } ?>