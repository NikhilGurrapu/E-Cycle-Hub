<?php

$db= mysqli_connect("localhost","root","","ecyclehub");

function getRealIpUser(){
    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])); return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENTL_IP'])); return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])); return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default : return $_SERVER['REMOTE_ADDR'];
    }
}

function add_cart(){
    global $db;

    if(isset($_GET['add_cart'])){
        $ip_add= getRealIpUser();

        $p_id= $_GET['add_cart'];
        $check_stock="select stock from products where product_id='$p_id'";
        $run_check_stock=mysqli_query($db, $check_stock);
        $row_check_stock=mysqli_fetch_array($run_check_stock);
        $p_stock=$row_check_stock['stock'];

        $product_qty=$_POST['product_qty'];
        if($product_qty==0){
            echo "<script>alert('Please select Quantity ! !')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
        else{
            if($p_stock>=$product_qty){
                $check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
                $run_check=mysqli_query($db, $check_product);
                if(mysqli_num_rows($run_check)>0){
                    echo "<script>alert('This product has already added in cart')</script>";
                    echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                }
                else{
                    $query="insert into cart(p_id,ip_add,qty) values('$p_id','$ip_add','$product_qty')";
                    $run_query=mysqli_query($db, $query);
                    echo "<script>alert('Added to Cart')</script>";
                    echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                }
            }
            else{
                echo "<script>alert('Not Enough Quantity Available')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }
        }
    }
}

function getPro(){
    global $db;
    $get_products= "select * from products order by 1 DESC LIMIT 0,8";

    $result= mysqli_query($db, $get_products);
    while($row_products=mysqli_fetch_array($result)){

        $pro_id= $row_products['product_id'];
        $pro_title= $row_products['product_title'];
        $pro_price= $row_products['product_price'];
        $pro_img1= $row_products['product_img1'];

        echo "
            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id' class='image'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                    </a>
                    <div class='text'>
                        <h4>
                            <a href='details.php?pro_id=$pro_id'>
                                $pro_title
                            </a>
                        </h4>
                        <p class='price'>
                            $pro_price Rs
                        </p>
                        <p class='button'>
                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                View Details
                            </a>
                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                <i class='fa fa-shopping-cart'></i> Add to cart
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        ";
    }
}

function get_outofstock(){
    global $db;

    if(isset($_GET['outofstock'])){
        
        $get_products="SELECT * from products where stock=0";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <span class='thumb-product-type-stock' style='color: #fff;
                        background-color: red;
                        display: inline-block;
                        border-radius: 2px;
                        float: left;
                        font-size: 14px;
                        font-weight: 500;
                        letter-spacing: 1px;
                        margin: 10px 9px -15px -10px;
                        padding-left: 5px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 10px;
                        text-transform: none;'>Out of stock</span>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                            <h4>
                                <a href='details.php?pro_id=$pro_id'>
                                    $pro_title
                                </a>
                            </h4>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function get_brand(){
    global $db;

    $get_series= "select * from brands";
    $run_series= mysqli_query($db, $get_series);

    while($row_series=mysqli_fetch_array($run_series)){
        $brand_id= $row_series['brand_id'];
        $brand_title= $row_series['brand_name'];
        $get_brand_count="select * from products where brand_id='$brand_id'";
        $run_count=mysqli_query($db,$get_brand_count);
        $count_run=mysqli_num_rows($run_count);

        if($count_run>0){

        
        echo "
        <li>
            <a href='shop.php?brand_id=$brand_id'>
                <div class='row'>
                    <div class='col-md-6'>
                    $brand_title ($count_run)
                    </div>
                </div>
            </a>
        </li>
        ";
        }
    }
}
function get_brand_pro(){
    global $db;

    if(isset($_GET['brand_id'])){
        $brand_id=$_GET['brand_id'];
        
        $get_products="select * from products where brand_id='$brand_id'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                            <h3 align='center'>
                                <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                            </h3>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function get_colors(){
    global $db;

    $get_series= "select * from colors";
    $run_series= mysqli_query($db, $get_series);

    while($row_series=mysqli_fetch_array($run_series)){
        $color_id= $row_series['color_id'];
        $color_title= $row_series['color_name'];

        echo "
        <li>
            <a href='shop.php?color_name=$color_title'>
                <div class='row'>
                    <div class='col-md-6 circle' style='background-color: $color_title;'>
                    </div>
                    <div class='col-md-6'>
                        $color_title
                    </div>
                </div>
            </a>
        </li>
        ";
    }
}
function get_color_pro(){
    global $db;

    if(isset($_GET['color_name'])){
        $color_name=$_GET['color_name'];
        
        $get_products="select * from products where product_color='$color_name'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                        <h3 align='center'>
                        <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                    </h3>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function get_gear(){
    global $db;

    $get_series= "select * from spec where spec='Gear'";
    $run_series= mysqli_query($db, $get_series);

    while($row_series=mysqli_fetch_array($run_series)){
        $spec_id= $row_series['spec_id'];
        $spec_name= $row_series['spec_name'];

        echo "
        <li>
            <a href='shop.php?gear_spec_name=$spec_name'>
                <div class='row'>
                    <div class='col-md-6'>
                        $spec_name
                    </div>
                </div>
            </a>
        </li>
        ";
    }
}
function get_gear_pro(){
    global $db;

    if(isset($_GET['gear_spec_name'])){
        $color_name=$_GET['gear_spec_name'];
        
        $get_products="select * from products where gear='$color_name'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                        <h3 align='center'>
                        <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                    </h3>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function get_frame(){
    global $db;

    $get_series= "select distinct spec_type from spec where spec='Frame'";
    $run_series= mysqli_query($db, $get_series);

    while($row_series=mysqli_fetch_array($run_series)){
        $spec_type=$row_series['spec_type'];

        echo "
        <li>
            <a href='shop.php?frame_spec_type=$spec_type'>
                <div class='row'>
                    <div class='col-md-6'>
                        $spec_type
                    </div>
                </div>
            </a>
        </li>
        ";
    }
}
function get_frame_pro(){
    global $db;

    if(isset($_GET['frame_spec_type'])){
        $color_name=$_GET['frame_spec_type'];
        
        $get_products="select * from products where frame_type='$color_name'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                            <h3 align='center'>
                                <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>
                                    $pro_title
                                </a>
                            </h3>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function get_tyre(){
    global $db;

    $get_series= "select * from spec where spec='Tyre'";
    $run_series= mysqli_query($db, $get_series);

    while($row_series=mysqli_fetch_array($run_series)){
        $spec_id= $row_series['spec_id'];
        $spec_name= $row_series['spec_name'];

        echo "
        <li>
            <a href='shop.php?tyre_spec_name=$spec_name'>
                <div class='row'>
                    <div class='col-md-6'>
                        $spec_name
                    </div>
                </div>
            </a>
        </li>
        ";
    }
}
function get_tyre_pro(){
    global $db;

    if(isset($_GET['tyre_spec_name'])){
        $color_name=$_GET['tyre_spec_name'];
        
        $get_products="select * from products where tyre_size='$color_name'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                        <h3 align='center'>
                        <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                    </h3>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function get_distance(){
    global $db;

    $get_series= "select * from spec where spec='Distance'";
    $run_series= mysqli_query($db, $get_series);

    while($row_series=mysqli_fetch_array($run_series)){
        $spec_id= $row_series['spec_id'];
        $spec_name= $row_series['spec_name'];

        echo "
        <li>
            <a href='shop.php?distance_spec_name=$spec_name'>
                <div class='row'>
                    <div class='col-md-6'>
                        $spec_name
                    </div>
                </div>
            </a>
        </li>
        ";
    }
}
function get_distance_pro(){
    global $db;

    if(isset($_GET['distance_spec_name'])){
        $color_name=$_GET['distance_spec_name'];
        
        $get_products="select * from products where distance='$color_name'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                        <h3 align='center'>
                        <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                    </h3>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function get_p_cat(){
    global $db;

    $get_p_cats= "select * from product_categories";
    $run_p_cats=mysqli_query($db,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        $p_cat_id= $row_p_cats['p_cat_id'];
        $p_cat_title= $row_p_cats['p_cat_title'];

        $get_cat="select * from products where p_cat_id='$p_cat_id'";
        $run_cat=mysqli_query($db,$get_cat);
        $count_cat=mysqli_num_rows($run_cat);
        if($count_cat>0){

        
        
        echo "
        <li>
            <a href='shop.php?p_cat_id=$p_cat_id'>
                <b>$p_cat_title</b> ($count_cat)
            </a>
        </li>
        ";
        }
    }
}
function get_p_cat_pro(){
    global $db;

    if(isset($_GET['p_cat_id'])){
        $p_cat_id=$_GET['p_cat_id'];
        $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($db,$get_p_cat);
        $row_p_cat=mysqli_fetch_array($run_p_cat);
        $p_cat_title=$row_p_cat['p_cat_title'];
        
        $get_products="select * from products where p_cat_id='$p_cat_id'";
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0){
            echo "
                <div class='box'>
                    <h1>No Bicycles Found..</h1>
                </div>
            ";
        }
        while($row_products=mysqli_fetch_array($run_products)){
            $pro_id= $row_products['product_id'];
            $pro_title= $row_products['product_title'];
            $pro_price= $row_products['product_price'];
            $pro_img1= $row_products['product_img1'];

            echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id' class='image'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                        <h3 align='center'>
                        <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                    </h3>
                            <p class='price'>
                                $pro_price Rs
                            </p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }
}

function items(){
    global $db;

    $ip_add= getRealIpUser();

    $get_items= "select * from cart where ip_add='$ip_add'";
    $run_items= mysqli_query($db, $get_items);
    $count_items= mysqli_num_rows($run_items);
    echo $count_items;
}

function total_price(){
    global $db;

    $ip_add= getRealIpUser();
    $total=0;

    $select_cart= "select * from cart where ip_add='$ip_add'";
    $run_cart= mysqli_query($db, $select_cart);

    while($record=mysqli_fetch_array($run_cart)){

        $pro_id= $record['p_id'];
        $pro_qty=$record['qty'];

        $get_price= "select * from products where product_id='$pro_id'";
        $run_price=mysqli_query($db, $get_price);

        while($row_price=mysqli_fetch_array($run_price)){

            $sub_total=$row_price['product_price']*$pro_qty;
            $total+=$sub_total;
        }
    }
    echo $total. "&nbsp; &#8377;";
}

?>

