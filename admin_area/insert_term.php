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
                <h1 class="page-header" style="color: #155567;">Insert Term or Policy</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-gavel"> Terms & Policys / Insert Term or Policy</i>
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
                                    <label for="" class="col-md-3 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input name="term_title" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Paragraph <span>(max 6000 characters)</span></label>
                                    <div class="col-md-6">
                                        <textarea name="term_para" class="form-control" maxlength="6000"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="submit" value="Insert Term" type="submit" class="btn btn-success form-control" required>
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

    $term_title= $_POST['term_title'];
    $term_para= $_POST['term_para'];

    $insert= "insert into terms(term_title,term_para) 
    values('$term_title','$term_para')";

    $run= mysqli_query($conn,$insert);

    if($run){
        echo "<script>alert('Successfully Inserted New Terms or Policy')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";
    }
}

?>
<?php } ?>

