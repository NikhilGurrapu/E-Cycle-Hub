<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{

?>
<?php

if(isset($_GET['edit_term'])){
    $admin_id=$_GET['edit_term'];
    $get_p= "select * from terms where term_id='$admin_id'";
    $run_p=mysqli_query($conn, $get_p);
    $row_p=mysqli_fetch_array($run_p);

    $term_id=$row_p['term_id'];
    $term_name=$row_p['term_title'];
    $term_email=$row_p['term_para'];
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
                <h1 class="page-header" style="color: #155567;">Edit Term or Policy</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-gavel"> Terms & Policys / Edit Term or Policy</i>
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
                                        <input name="term_title" type="text" class="form-control" value="<?php echo $term_name ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Paragraph</label>
                                    <div class="col-md-6">
                                        <textarea name="term_para" class="form-control" maxlength="6000">
                                            <?php echo $term_email ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="submit" value="Update Term or Policy" type="submit" class="btn btn-success form-control" required>
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

    $insert= "update terms set term_title='$term_title',term_para='$term_para' where term_id=$term_id";

    $run= mysqli_query($conn,$insert);

    if($run){
        echo "<script>alert('Updated Terms or Policy')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";
    }
    

}

?>
<?php } ?>

