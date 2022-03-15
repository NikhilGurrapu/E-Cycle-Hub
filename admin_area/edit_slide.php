<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<?php

    if(isset($_GET['edit_slide'])){
        $product_id=$_GET['edit_slide'];
        $get_p= "select * from slider where slide_id='$product_id'";
        $run_p=mysqli_query($conn, $get_p);
        $row_p=mysqli_fetch_array($run_p);

        $p_id=$row_p['slide_id'];
        $p_title=$row_p['slide_name'];
        $p_img1=$row_p['slide_image'];
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
                <h1 class="page-header" style="color: #155567;">Edit Slide</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-slider"> Slides / Edit Slide</i>
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
                                    <label class="col-md-3 control-label">Slide ID</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $p_id; ?>" name="product_id" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Slide Name</label>
                                    <div class="col-md-6">
                                        <input value="<?php echo $p_title; ?>" name="product_title" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Slide Image</label>
                                    <div class="col-md-6">
                                        <input name="product_image1" type="file" class="form-control" required>
                                        <br>
                                        <img width="300" height="150" src="slides_images/<?php echo $p_img1; ?>" alt="<?php echo $p_img1; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="update" value="Upadet Slide" type="submit" class="btn btn-success form-control" required>
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
    $product_image1= $_FILES['product_image1']['name'];
    $temp_name1= $_FILES['product_image1']['tmp_name'];
    move_uploaded_file($temp_name1,"slides_images/$product_image1");

    $update_product="update slider set slide_name='$product_title',slide_image='$product_image1' where slide_id='$p_id'";

    $run_product=mysqli_query($conn, $update_product);
    if($run_product){
        echo "<script>alert('Slide Updated Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
    else{
        echo "<script>alert('Oops! Something went wrong')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }

}

?>
<?php } ?>
