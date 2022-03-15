<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>

<?php

if(isset($_GET['edit_cat'])){
    $edit_p_cat_id=$_GET['edit_cat'];
    $edit_p_cat="select * from series where series_id='$edit_p_cat_id'";
    $run_edit=mysqli_query($conn,$edit_p_cat);
    $row_edit=mysqli_fetch_array($run_edit);

    $p_cat_id=$row_edit['series_id'];
    $p_cat_title=$row_edit['series_title'];
    $p_cat_desc=$row_edit['series_desc'];

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
                <h1 class="page-header" style="color: #155567;">Edit Category</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list-alt"> Categories / Edit Category</i>
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
                                    <label for="" class="col-md-3 control-label">Category ID</label>
                                    <div class="col-md-6">
                                        <input name="product_c_id" type="text" class="form-control" value="<?php echo $p_cat_id ?>" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Category Title</label>
                                    <div class="col-md-6">
                                        <input name="product_c_title" type="text" class="form-control" value="<?php echo $p_cat_title ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Category Description</label>
                                    <div class="col-md-6">
                                        <textarea name="product_c_desc" class="form-control">
                                            <?php echo $p_cat_desc ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="update" value="Insert Category" type="submit" class="btn btn-success form-control" required>
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

    $product_c_title= $_POST['product_c_title'];
    $product_c_desc= $_POST['product_c_desc'];

    $update_p_cat= "update series set series_title='$product_c_title',series_desc='$product_c_desc' where series_id='$p_cat_id'";

    $run_update=mysqli_query($conn,$update_p_cat);

    if($run_update){
        echo "<script>alert('Successfully Updated Category')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}

?>
<?php } ?>