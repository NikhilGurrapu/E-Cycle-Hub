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

<?php

    if(isset($_GET['edit_product'])){
        $product_id=$_GET['edit_product'];
        $get_p= "select * from products where product_id='$product_id'";
        $run_p=mysqli_query($conn, $get_p);
        $row_p=mysqli_fetch_array($run_p);

        $p_id=$row_p['product_id'];
        $p_cat_id=$row_p['p_cat_id'];
        $brand_id=$row_p['brand_id'];
        $p_title=$row_p['product_title'];
        $p_color=$row_p['product_color'];
        $p_img1=$row_p['product_img1'];
        $p_img2=$row_p['product_img2'];
        $p_img3=$row_p['product_img3'];
        $p_img4=$row_p['product_img4'];
        $p_cost_price=$row_p['cost_price'];
        $p_price=$row_p['product_price'];
        $frame_type=$row_p['frame_type'];
        $frame_name=$row_p['frame_name'];
        $motor_type=$row_p['motor_type'];
        $motor_name=$row_p['motor_name'];
        $fork=$row_p['fork'];
        $suspension=$row_p['suspension'];
        $gear=$row_p['gear'];
        $mileage_pedal=$row_p['mileage_pedal'];
        $mileage_throttle=$row_p['mileage_throttle'];
        $rims_type=$row_p['rims_name'];
        $tyre_size=$row_p['tyre_size'];
        $max_speed=$row_p['max_speed'];
        $display=$row_p['display'];
        $distance=$row_p['distance'];
        $brakes=$row_p['brakes'];
        $battery=$row_p['battery'];
        $battery_life=$row_p['battery_life'];
        $charge_time=$row_p['charge_time'];
        $p_model=$row_p['product_model'];
        $p_desc=$row_p['product_desc'];
        $p_keywords=$row_p['product_keywords'];
        $p_stock=$row_p['stock'];
    }
    $get_p_cat= "select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat= mysqli_query($conn, $get_p_cat);
    $row_p_cat= mysqli_fetch_array($run_p_cat);
    $p_cat_title=$row_p_cat['p_cat_title'];

    $get_brand="select * from brands where brand_id='$brand_id'";
    $run_brand=mysqli_query($conn,$get_brand);
    $row_brand=mysqli_fetch_array($run_brand);

    $brand_name=$row_brand['brand_name'];
    


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Insert Products</title>
        
    </head>
    <body>
    <script src="js/jquery-331.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function getFrameNameE(val){
                $.ajax({
                    type: "POST",
                    url: "getFrameNameE.php",
                    data: 'spec_type='+val,
                    success:function(data){
                        $("#frame-name-list").html(data);
                    }
                });
            }
        </script>
        <script type="text/javascript">
            function getMotorNameE(val){
                $.ajax({
                    type: "POST",
                    url: "getMotorNameE.php",
                    data: 'spec_type='+val,
                    success:function(data){
                        $("#motor-name-list").html(data);
                    }
                });
            }
        </script>
        <script type="text/javascript">
            function getRimsNameE(val){
                $.ajax({
                    type: "POST",
                    url: "getRimsNameE.php",
                    data: 'spec_type='+val,
                    success:function(data){
                        $("#rims-name-list").html(data);
                    }
                });
            }
        </script>
        <div class="row"><!--row start-->
            <div class="col-lg-12"><!--col-lg-12 start-->
                <h1 class="page-header" style="color: #155567;">Edit Product</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-bicycle"> Products / Edit Product</i>
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
                                    <label class="col-md-3 control-label">Product ID</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $p_id; ?>" name="product_id" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Title</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $p_title; ?>" name="product_title" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--Product Brand-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Brand</label>
                                    <div class="col-md-6">
                                        <select name="brand" class="form-control">
                                            <option value="<?php echo $brand_id; ?>" selected><?php echo $brand_name; ?></option>
                                            <?php
                                            $get_p_cats="select * from brands";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                                $b_id= $row_p_cats['brand_id'];
                                                $b_title= $row_p_cats['brand_name'];

                                                echo "
                                                <option value='$b_id' style='font-size: 20px;'>$b_title</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Product Category</label>
                                    <div class="col-md-6">
                                        <select name="category" class="form-control">
                                            <option value="<?php echo $p_cat_id; ?>" selected><?php echo $p_cat_title; ?></option>
                                            <?php
                                            $get_p_cats="select * from product_categories";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                                $p_cat_id1= $row_p_cats['p_cat_id'];
                                                $p_cat_title1= $row_p_cats['p_cat_title'];

                                                echo "
                                                <option value='$p_cat_id1' style='font-size: 20px;'>$p_cat_title1</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Product Color</label>
                                    <div class="col-md-6">
                                        <select name="color" class="form-control">
                                            <option value="<?php echo $p_color; ?>" selected><?php echo $p_color; ?></option>
                                            <?php
                                            $get_p_cats="select * from colors";
                                            $run_p_cats=mysqli_query($conn,$get_p_cats);

                                            while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                                                $color_id1= $row_p_cats['color_id'];
                                                $color_title1= $row_p_cats['color_name'];

                                                echo "
                                                <option value='$color_title1' style='font-size: 20px;'>$color_title1</option>
                                                ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image 1</label>
                                    <div class="col-md-6">
                                        <input name="product_image1" type="file" class="form-control" required>
                                        <br>
                                        <img width="100" height="60" src="product_images/<?php echo $p_img1; ?>" alt="<?php echo $p_img1; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image 2</label>
                                    <div class="col-md-6">
                                        <input name="product_image2" type="file" class="form-control">
                                        <br>
                                        <img width="100" height="60" src="product_images/<?php echo $p_img2; ?>" alt="<?php echo $p_img2; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image 3</label>
                                    <div class="col-md-6">
                                        <input name="product_image3" type="file" class="form-control">
                                        <br>
                                        <img width="100" height="60" src="product_images/<?php echo $p_img3; ?>" alt="<?php echo $p_img3; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image 4</label>
                                    <div class="col-md-6">
                                        <input name="product_image4" type="file" class="form-control">
                                        <br>
                                        <img width="100" height="60" src="product_images/<?php echo $p_img4; ?>" alt="<?php echo $p_img4; ?>">
                                    </div>
                                </div>
                                <!--Product Cost Prices-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Cost Price</label>
                                    <div class="col-md-6">
                                        <input name="cost_price" value="<?php echo $p_cost_price; ?>" type="number" oninvalid="alert('Cost Price should be greater than 0');" class="form-control" required placeholder="Cost Price" min="1" pattern="[1-9]{1}[0-9]+">
                                    </div>
                                </div>
                                <!--Product Selling Prices-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Selling Price</label>
                                    <div class="col-md-6">
                                        <input name="price" value="<?php echo $p_price; ?>" type="number" oninvalid="alert('Selling Price should be greater than 0');" class="form-control" required placeholder="Selling Price" min="1" pattern="[1-9]{1}[0-9]+">
                                    </div>
                                </div>
                                <!--Product Stock-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Stock</label>
                                    <div class="col-md-6">
                                        <input name="stock" value="<?php echo $p_stock; ?>" type="number" oninvalid="alert('Stock should be Greater than 0');" class="form-control" required placeholder="Product Stock" min="1" pattern="[1-9]{1}[0-9]+">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Keywords</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $p_keywords; ?>" name="product_keywords" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <!--Product Frame-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="frame-type-list" class="col-md-6" style="text-align:right;">Frame</label>
                                        <div class="col-md-3">
                                            <select name="frame_type" id="frame-type-list" class="form-control" onchange="getFrameNameE(this.value);" required>
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
                                            <select name="frame_name" id="frame-name-list" class="form-control" required>
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
                                            <select name="motor_type" id="motor-type-list" class="form-control" onchange="getMotorNameE(this.value);" required>
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
                                            <select name="motor_name" id="motor-name-list" class="form-control" required>
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
                                            <select name="rims_type" id="rims-type-list" class="form-control" onchange="getRimsNameE(this.value);" required>
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
                                            <select name="rims_name" id="rims-name-list" class="form-control" required>
                                                <option value disabled selected>Select Rims Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Product Fork-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Fork</label>
                                    <div class="col-md-6">
                                        <select name="fork" class="form-control" required>
                                            <option value="<?php echo $fork; ?>"><?php echo $fork; ?></option>
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
                                            <option value="<?php echo $tyre_size; ?>"><?php echo $tyre_size; ?></option>
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
                                            <option value="<?php echo $suspension; ?>"><?php echo $suspension; ?></option>
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
                                            <option value="<?php echo $gear; ?>"><?php echo $gear; ?></option>
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
                                            <option value="<?php echo $mileage_pedal; ?>"><?php echo $mileage_pedal; ?></option>
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
                                            <option value="<?php echo $mileage_throttle; ?>"><?php echo $mileage_throttle; ?></option>
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
                                        <input name="max_speed" value="<?php echo $max_speed; ?>" type="number" class="form-control" required placeholder="Product Max-Speed">
                                    </div>
                                </div>
                                <!--Product Display-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Display</label>
                                    <div class="col-md-6">
                                        <select name="display" class="form-control">
                                            <option value="<?php echo $display; ?>"><?php echo $display; ?></option>
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
                                            <option value="<?php echo $brakes; ?>"><?php echo $brakes; ?></option>
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
                                            <option value="<?php echo $distance; ?>"><?php echo $distance; ?></option>
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
                                            <option value="<?php echo $battery; ?>"><?php echo $battery; ?></option>
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
                                        <input name="battery_life" value="<?php echo $battery_life; ?>" type="number" class="form-control" required placeholder="Battery Life">
                                    </div>
                                </div>
                                <!--Product Charge Time-->
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Charge Time<span><br>(in Hrs)</span></label>
                                    <div class="col-md-6">
                                        <input name="charge_time" value="<?php echo $charge_time; ?>" type="number" class="form-control" required placeholder="Charge Time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Description</label>
                                    <div class="col-md-6">
                                        <textarea name="product_desc" cols="19" rows="15" class="form-control">
                                            <?php echo $p_desc; ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="update" value="Update Bike" type="submit" class="btn btn-success form-control" required>
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

    $product_title= $_POST['product_title'];
    $brand=$_POST['brand'];
    $category=$_POST['category'];
    $color=$_POST['color'];
    $cost_price=$_POST['cost_price'];
    $product_price= $_POST['price'];
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
    $product_keywords= $_POST['product_keywords'];
    $product_desc= $_POST['product_desc'];
    $product_model= $_POST['product_title'];
    $stock=$_POST['stock'];

    $product_image1= $_FILES['product_image1']['name'];
    $product_image2= $_FILES['product_image2']['name'];
    $product_image3= $_FILES['product_image3']['name'];
    $product_image4= $_FILES['product_image4']['name'];

    $temp_name1= $_FILES['product_image1']['tmp_name'];
    $temp_name2= $_FILES['product_image2']['tmp_name'];
    $temp_name3= $_FILES['product_image3']['tmp_name'];
    $temp_name4= $_FILES['product_image4']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$product_image1");
    move_uploaded_file($temp_name2,"product_images/$product_image2");
    move_uploaded_file($temp_name3,"product_images/$product_image3");
    move_uploaded_file($temp_name4,"product_images/$product_image4");

    if($product_price>=$cost_price){
        $update_product="update products set p_cat_id='$category',brand_id='$brand',date=NOW(),product_title='$product_title',product_color='$color',product_img1='$product_image1',product_img2='$product_image2',product_img3='$product_image3',
        product_img4='$product_image4',product_price='$product_price',cost_price='$cost_price',frame_type='$frame_type',frame_name='$frame_name',motor_type='$motor_type',motor_name='$motor_name',fork='$fork',suspension='$suspension',gear='$gear',mileage_pedal='$mileage_pedal',mileage_throttle='$mileage_throttle',
        rims_type='$rims_type',rims_name='$rims_name',tyre_size='$tyre_size',max_speed='$max_speed',display='$display',distance='$distance',brakes='$brakes',battery='$battery',battery_life='$battery_life',charge_time='$charge_time',product_model='$product_model',product_desc='$product_desc',product_keywords='$product_keywords',stock='$stock' where product_id='$p_id'";

        $run_product=mysqli_query($conn, $update_product);
        if($run_product){
            echo "<script>alert('Product Updated Successfully ! !')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
        else{
            echo "<script>alert('Oops! Something went wrong')</script>";
            echo "<script>window.open('index.php?edit_product=$product_id','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Selling price is Less than Cost price')</script>";
        echo "<script>window.open('index.php?edit_product=$product_id','_self')</script>";
    }
}

?>
<?php } ?>
