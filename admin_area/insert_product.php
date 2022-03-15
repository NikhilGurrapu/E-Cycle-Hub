<?php

require_once("dbcontroller.php");
$db_handle=new DBController();
$queryFT="SELECT DISTINCT spec_type FROM spec WHERE spec='Frame'";
$resultFT=$db_handle->runQuery($queryFT);
?>

<?php

require_once("dbcontroller.php");
$db_handle=new DBController();
$queryMT="SELECT DISTINCT spec_type FROM spec WHERE spec='Motor'";
$resultMT=$db_handle->runQuery($queryMT);
?>

<?php

require_once("dbcontroller.php");
$db_handle=new DBController();
$queryRT="SELECT DISTINCT spec_type FROM spec WHERE spec='Rims'";
$resultRT=$db_handle->runQuery($queryRT);
?>

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
        <style>
            .hide
            {
                display: none;
            }
            .show
            {
                display: contents;
                content: TRUE;
            }
        </style>
    </head>
    <body>
        <script src="js/jquery-331.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function getFrameName(val){
                $.ajax({
                    type: "POST",
                    url: "getFrameName.php",
                    data: 'spec_type='+val,
                    success:function(data){
                        $("#frame-name-list").html(data);
                    }
                });
            }
        </script>
        <script type="text/javascript">
            function getMotorName(val){
                $.ajax({
                    type: "POST",
                    url: "getMotorName.php",
                    data: 'spec_type='+val,
                    success:function(data){
                        $("#motor-name-list").html(data);
                    }
                });
            }
        </script>
        <script type="text/javascript">
            function getRimsName(val){
                $.ajax({
                    type: "POST",
                    url: "getRimsName.php",
                    data: 'spec_type='+val,
                    success:function(data){
                        $("#rims-name-list").html(data);
                    }
                });
            }
        </script>
        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Insert Product</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-bicycle"> Products / Insert Product</i>
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
                                <!--Product Title-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input name="title" type="text" class="form-control" required placeholder="Product Name">
                                    </div>
                                </div>
                                <!--Product Brand-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Brand</label>
                                    <div class="col-md-6">
                                        <select name="brand" class="form-control">
                                            <option value="NA">Select Brand Name</option>
                                            <?php
                                            $get_p_cats="select * from brands";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                                $p_cat_id= $row_p_cats['brand_id'];
                                                $p_cat_title= $row_p_cats['brand_name'];

                                                echo "
                                                <option value='$p_cat_id' style='font-size: 20px;'>$p_cat_title</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Category-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Category</label>
                                    <div class="col-md-6">
                                        <select name="category" class="form-control">
                                            <option>Select Product Category</option>
                                            <?php
                                            $get_p_cats="select * from product_categories";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                                $p_cat_id= $row_p_cats['p_cat_id'];
                                                $p_cat_title= $row_p_cats['p_cat_title'];

                                                echo "
                                                <option value='$p_cat_id' style='font-size: 20px;'>$p_cat_title</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Color-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Color</label>
                                    <div class="col-md-6">
                                        <select name="color" class="form-control">
                                            <option>Select a Product Color</option>
                                            <?php
                                            $get_p_cats="select * from colors";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                                $p_cat_id= $row_p_cats['color_id'];
                                                $p_cat_title= $row_p_cats['color_name'];

                                                echo "
                                                <option value='$p_cat_title' style='color: $p_cat_title; font-size: 20px;'>$p_cat_title</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Images-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Image 1</label>
                                    <div class="col-md-6">
                                        <input name="image1" type="file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Image 2</label>
                                    <div class="col-md-6">
                                        <input name="image2" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Image 3</label>
                                    <div class="col-md-6">
                                        <input name="image3" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Image 4</label>
                                    <div class="col-md-6">
                                        <input name="image4" type="file" class="form-control">
                                    </div>
                                </div>
                                <!--Product Cost Prices-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Cost Price</label>
                                    <div class="col-md-6">
                                        <input name="cost_price" type="number" oninvalid="alert('Cost Price should be greater than 0');" class="form-control" required placeholder="Cost Price" min="1" pattern="[1-9]{1}[0-9]+">
                                    </div>
                                </div>
                                <!--Product Selling Prices-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Selling Price</label>
                                    <div class="col-md-6">
                                        <input name="price" type="number" oninvalid="alert('Selling Price should be greater than 0');" class="form-control" required placeholder="Selling Price" min="1" pattern="[1-9]{1}[0-9]+">
                                    </div>
                                </div>
                                <!--Product Stock-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Stock</label>
                                    <div class="col-md-6">
                                        <input name="stock" type="number" oninvalid="alert('Stock should be Greater than 0');" class="form-control" required placeholder="Product Stock" min="1" pattern="[1-9]{1}[0-9]+">
                                    </div>
                                </div>
                                <!--Product Frame-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="frame-type-list" class="col-md-6" style="text-align:right;">Frame</label>
                                        <div class="col-md-3">
                                            <select name="frame_type" id="frame-type-list" class="form-control" onchange="getFrameName(this.value);">
                                                <option value disabled selected>Select Frame Type</option> 
                                                <?php
                                                foreach($resultFT as $frameType){
                                                    ?>
                                                    <option value="<?php echo $frameType["spec_type"]; ?>"><?php echo $frameType["spec_type"]; ?></option>
                                                    <?php
                                                }
                                                ?>                                           
                                            </select>
                                        </div>
                                        <label for="frame-name-list" class="col-md-3" style="text-align:right;">Frame Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <select name="frame_name" id="frame-name-list" class="form-control">
                                                <option value disabled selected>Select Frame Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Product Motor-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="motor-type-list" class="col-md-6" style="text-align:right;">Motor</label>
                                        <div class="col-md-3">
                                            <select name="motor_type" id="motor-type-list" class="form-control" onchange="getMotorName(this.value);">
                                                <option value disabled selected>Select Motor Type</option> 
                                                <?php
                                                foreach($resultMT as $motorType){
                                                    ?>
                                                    <option value="<?php echo $motorType["spec_type"]; ?>"><?php echo $motorType["spec_type"]; ?></option>
                                                    <?php
                                                }
                                                ?>                                           
                                            </select>
                                        </div>
                                        <label for="motor-name-list" class="col-md-3" style="text-align:right;">Motor Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <select name="motor_name" id="motor-name-list" class="form-control">
                                                <option value disabled selected>Select Motor Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Product Rims-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="rims-type-list" class="col-md-6" style="text-align:right;">Rims</label>
                                        <div class="col-md-3">
                                            <select name="rims_type" id="rims-type-list" class="form-control" onchange="getRimsName(this.value);">
                                                <option value disabled selected>Select Rims Type</option> 
                                                <?php
                                                foreach($resultRT as $rimsType){
                                                    ?>
                                                    <option value="<?php echo $rimsType["spec_type"]; ?>"><?php echo $rimsType["spec_type"]; ?></option>
                                                    <?php
                                                }
                                                ?>                                           
                                            </select>
                                        </div>
                                        <label for="rims-name-list" class="col-md-3" style="text-align:right;">Rims Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <select name="rims_name" id="rims-name-list" class="form-control">
                                                <option value disabled selected>Select Rims Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Product Fork-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Fork</label>
                                    <div class="col-md-6">
                                        <select name="fork" class="form-control">
                                            <option>Select Fork</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec_type='Fork'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Tyre Size-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Tyre Size</label>
                                    <div class="col-md-6">
                                        <select name="tyre_size" class="form-control">
                                            <option>Select Tyre Size</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec_type='Tyre'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Suspension-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Suspension</label>
                                    <div class="col-md-6">
                                        <select name="suspension" class="form-control">
                                            <option>Select Suspension</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec_type='Suspension'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Gear-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Gear</label>
                                    <div class="col-md-6">
                                        <select name="gear" class="form-control">
                                            <option value="NA">Select No. of Gears</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec='Gear'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Mileage Pedal-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Mileage Pedal</label>
                                    <div class="col-md-6">
                                        <select name="mileage_pedal" class="form-control">
                                            <option>Select Mileage Pedal</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec='Mileage Pedal'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Mileage Throttle-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Mileage Throttle</label>
                                    <div class="col-md-6">
                                        <select name="mileage_throttle" class="form-control">
                                            <option>Select Mileage Throttle</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec='Mileage Throttle'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Max-Speed-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Max-Speed<br><span>(in Kmph)</span></label>
                                    <div class="col-md-6">
                                        <input name="max_speed" type="number" class="form-control" required placeholder="Product Max-Speed">
                                    </div>
                                </div>
                                <!--Product Display-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Display</label>
                                    <div class="col-md-6">
                                        <select name="display" class="form-control">
                                            <option>Select Display</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec='Display'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Brakes-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Brakes</label>
                                    <div class="col-md-6">
                                        <select name="brakes" class="form-control">
                                            <option>Select Brakes</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec='Brakes'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Distance-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Distance</label>
                                    <div class="col-md-6">
                                        <select name="distance" class="form-control">
                                            <option>Select Distance</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec='Distance'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Distance-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Battery</label>
                                    <div class="col-md-6">
                                        <select name="battery" class="form-control">
                                            <option>Select Battery</option>
                                            <?php
                                            $get_p_cats="select * from spec where spec='Battery'";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                $pedal_id=$row_p_cats['spec_id'];
                                                $pedal_name=$row_p_cats['spec_name'];
                                                echo "
                                                <option value='$pedal_name' style='font-size: 20px;'>$pedal_name</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--Product Battery Life-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Battery Life<span><br>(in Years)</span></label>
                                    <div class="col-md-6">
                                        <input name="battery_life" type="number" class="form-control" required placeholder="Battery Life">
                                    </div>
                                </div>
                                <!--Product Charge Time-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Charge Time<span><br>(in Hrs)</span></label>
                                    <div class="col-md-6">
                                        <input name="charge_time" type="number" class="form-control" required placeholder="Charge Time">
                                    </div>
                                </div>
                                <!--Product Keywords-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Keywords</label>
                                    <div class="col-md-6">
                                        <input name="keywords" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--Product Description-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Description</label>
                                    <div class="col-md-6">
                                        <textarea name="desc" cols="19" rows="15" class="form-control"></textarea>
                                    </div>
                                </div>
                                <!--Product Inert Button-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="submit" value="Insert Bike" type="submit" class="btn btn-success form-control" required>
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

    $title=$_POST['title'];
    $brand=$_POST['brand'];
    $category=$_POST['category'];
    $color=$_POST['color'];
    $cost_price=$_POST['cost_price'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $frame_type=$_POST['frame_type'];
    $frame_name=$_POST['frame_name'];
    $motor_type=$_POST['motor_type'];
    $motor_name=$_POST['motor_name'];
    $fork=$_POST['fork'];
    $suspension=$_POST['suspension'];
    $gear=$_POST['gear'];
    $mileage_pedal=$_POST['mileage_pedal'];
    $mileage_throttle=$_POST['mileage_throttle'];
    $rims_type=$_POST['rims_type'];
    $rims_name=$_POST['rims_name'];
    $tyre_size=$_POST['tyre_size'];
    $max_speed=$_POST['max_speed'];
    $display=$_POST['display'];
    $brakes=$_POST['brakes'];
    $distance=$_POST['distance'];
    $battery=$_POST['battery'];
    $battery_life=$_POST['battery_life'];
    $charge_time=$_POST['charge_time'];
    $keywords=$_POST['keywords'];
    $desc=$_POST['desc'];
    $product_model=$_POST['title'];

    $image1= $_FILES['image1']['name'];
    $image2= $_FILES['image2']['name'];
    $image3= $_FILES['image3']['name'];
    $image4= $_FILES['image4']['name'];

    $temp_name1= $_FILES['image1']['tmp_name'];
    $temp_name2= $_FILES['image2']['tmp_name'];
    $temp_name3= $_FILES['image3']['tmp_name'];
    $temp_name4= $_FILES['image4']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$image1");
    move_uploaded_file($temp_name2,"product_images/$image2");
    move_uploaded_file($temp_name3,"product_images/$image3");
    move_uploaded_file($temp_name4,"product_images/$image4");

    $check_product="SELECT * FROM products WHERE p_cat_id='$category' AND brand_id='$brand' AND product_color='$color' AND frame_type='$frame_type' AND frame_name='$frame_name' AND motor_type='$motor_type' AND motor_name='$motor_name' AND fork='$fork' AND suspension='$suspension' AND gear='$gear' AND mileage_pedal='$mileage_pedal' AND mileage_throttle='$mileage_throttle' AND rims_type='$rims_type' AND rims_name='$rims_name' AND tyre_size='$tyre_size' AND max_speed='$max_speed' AND display='$display' AND distance='$distance' AND brakes='$brakes' AND battery='$battery' AND battery_life='$battery_life' AND charge_time='$charge_time'";
    $run_check=mysqli_query($conn,$check_product);
    $product_count=mysqli_num_rows($run_check);
    if($product_count>0){
        echo "<script>alert('Product Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_product','_self')</script>";
    }
    else{
        if($price>=$cost_price){
            $insert_product="insert into products(product_title,date,brand_id,p_cat_id,product_color,product_img1,product_img2,product_img3,product_img4,product_price,cost_price,frame_type,frame_name,motor_type,motor_name,fork,suspension,gear,mileage_pedal,mileage_throttle,rims_type,rims_name,tyre_size,max_speed,display,distance,brakes,battery,battery_life,charge_time,product_model,product_desc,product_keywords,stock,count) 
            values('$title',NOW(),'$brand','$category','$color','$image1','$image2','$image3','$image4','$price',$cost_price,'$frame_type','$frame_name','$motor_type','$motor_name','$fork','$suspension','$gear','$mileage_pedal','$mileage_throttle','$rims_type','$rims_name','$tyre_size','$max_speed','$display','$distance','$brakes','$battery','$battery_life','$charge_time','$product_model','$desc','$keywords','$stock','0')";
    
            $run_product= mysqli_query($conn,$insert_product);
    
            if($run_product){
                echo "<script>alert('Successfully inserted New E-cylce')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";
            }
            else{
                echo "<script>alert('Oops! Something went wrong....')</script>";
                echo "<script>window.open('index.php?insert_product','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Selling price is Less than Cost price')</script>";
            echo "<script>window.open('index.php?insert_product','_self')</script>";
        }
    }    
}

?>
<?php } ?>
