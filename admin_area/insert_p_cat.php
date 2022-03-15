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
                <h1 class="page-header" style="color: #155567;">Insert Product Category</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-book"> Products Categories / Insert Product Category</i>
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
                                    <label for="" class="col-md-3 control-label">Product Category Title</label>
                                    <div class="col-md-6">
                                        <input name="product_c_title" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Product Category Description</label>
                                    <div class="col-md-6">
                                        <textarea name="product_c_desc" cols="19" rows="15" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="submit" value="Insert Category" type="submit" class="btn btn-success form-control" required>
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

    $product_c_title= $_POST['product_c_title'];
    $product_c_desc= $_POST['product_c_desc'];

    $check_p_cat="SELECT * FROM product_categories WHERE p_cat_title='$product_c_title'";
    $run_check=mysqli_query($conn,$check_p_cat);
    $p_cat_count=mysqli_num_rows($run_check);
    if($p_cat_count>0){
        echo "<script>alert('Product Category Already Found in Database..')</script>";
        echo "<script>window.open('index.php?insert_p_cat','_self')</script>";
    }
    else{
        $insert_product= "insert into product_categories(p_cat_title,p_cat_desc) values('$product_c_title','$product_c_desc')";
        $run_product= mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('Successfully Inserted New Category')</script>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        }
    }
}
?>
<?php } ?>