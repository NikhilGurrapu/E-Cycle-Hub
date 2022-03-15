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
                <h1 class="page-header" style="color: #155567;">Insert Slide</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-sliders"> Slides / Insert Slide</i>
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
                                    <label for="" class="col-md-3 control-label">Slide Title</label>
                                    <div class="col-md-6">
                                        <input name="slide_title" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label">Slide Image</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="slide_image">
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

    $slide_name= $_POST['slide_title'];
    $slide_image= $_FILES['slide_image']['name'];
    $tmp_slide_image= $_FILES['slide_image']['tmp_name'];

    $view_slides="select * from slider";
    $run_slides=mysqli_query($conn,$view_slides);
    $count=mysqli_num_rows($run_slides);
    if($count<4){
        move_uploaded_file($tmp_slide_image,"slides_images/$slide_image");
        $insert_slide="insert into slider(slide_name,slide_image) values('$slide_name','$slide_image')";
        $run_slide=mysqli_query($conn,$insert_slide);
        echo "<script>alert('New Slide Image Inserted Successfully ! !')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
    else{
        echo "<script>alert('You have already inserted 4 slides ! !')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
}
?>
<?php } ?>