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
                <h1 class="page-header" style="color: #155567;">Insert FAQs</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-question_circle"> FAQs / Insert FAQs</i>
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
                                    <label for="" class="col-md-3 control-label">Question</label>
                                    <div class="col-md-6">
                                        <input name="faq_question" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Answer <span>(max 6000 characters)</span></label>
                                    <div class="col-md-6">
                                        <textarea name="faq_answer" class="form-control" maxlength="6000"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input name="submit" value="Insert FAQ" type="submit" class="btn btn-success form-control" required>
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
                <h1 class="page-header" style="color: #155567;">View FAQs</h1>

                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-question_circle"> FAQs / View FAQs</i>
                    </li>
                </ol>            

            </div><!--col-lg-12 end-->
        </div><!--row end-->
        <style>
            /*FAQ styles*/
.faq-section{
    width: 100%;
    height: 90vh;
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.faq-container{
    width: 100%;
    max-width: 80rem;
    margin: 0 auto;
    padding: 0 1.5rem;
}
.accordion-item{
    background-color: #283042;
    border-radius: .4rem;
    margin-bottom: 1rem;
    padding: 1rem;
    box-shadow: .5rem 2px .5rem rgba(0,0,0,0.1);
}
.accordion-link{
    font-size: 1.6ren;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    background-color: #283042;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 0;
}
.accordion-link i{
    color: #e7d5ff;
    padding: .5rem;
}
.accordion-link .ion-md-remove{
    display: none;
}
.answer{
    max-height: 0;
    overflow: hidden;
    position: relative;
    background-color: #212838;
    transition: max-height 650ms;
}
.answer::before{
    content: "";
    position: absolute;
    width: .6rem;
    height: 90%;
    background-color: #8fc460;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}
.answer p{
    color: rgba(255, 255, 255, 0.6);
    font-size: 1.4rem;
    padding: 2rem;
}
.accordion-item:target .answer{
    max-height: 20rem;
}
.accordion-item:target .accordion-link .ion-md-add{
    display: none;
}
.accordion-item:target .accordion-link .ion-md-remove{
    display: block;
}
        </style>
        <section class="faq-section">
            <div class="container-fluid faq-container">
            <h2 style="font-weight:700;">Frequently Asked Questions (FAQs)</h2>
                <div class="row">
                
                    <div class="col-md-6">
                        <div class="accordion">
                            <?php
                                $get_faq_test="SELECT * FROM faq";
                                $run_faq_test=mysqli_query($conn,$get_faq_test);
                                $count_faq=mysqli_num_rows($run_faq_test);
                                $avg_faq=round($count_faq/2);

                                $get_faq="SELECT * FROM faq order by faq_id ASC LIMIT $avg_faq";
                                $run_faq=mysqli_query($conn,$get_faq);
                                while($row_faq=mysqli_fetch_array($run_faq)){
                                    $faq_id=$row_faq['faq_id'];
                                    $faq_question=$row_faq['faq_question'];
                                    $faq_answer=$row_faq['faq_answer'];
                            ?>
                                <div class="accordion-item" id="question<?php echo $faq_id; ?>">
                                    <a class="accordion-link" href="#question<?php echo $faq_id; ?>" style="text-decoration: none;">
                                        <?php echo $faq_question; ?>
                                        <i class="icon ion-md-add"></i>
                                        <i class="icon ion-md-remove"></i>
                                    </a>
                                    <a href="index.php?delete_faq=<?php echo $faq_id; ?>" style="color: white;">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                    <div class="answer">
                                        <?php echo $faq_answer; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="accordion">
                            <?php
                                $get_faq="SELECT * FROM faq order by faq_id DESC LIMIT $avg_faq";
                                $run_faq=mysqli_query($conn,$get_faq);
                                while($row_faq=mysqli_fetch_array($run_faq)){
                                    $faq_id=$row_faq['faq_id'];
                                    $faq_question=$row_faq['faq_question'];
                                    $faq_answer=$row_faq['faq_answer'];
                            ?>
                                <div class="accordion-item" id="question<?php echo $faq_id; ?>">
                                    <a class="accordion-link" href="#question<?php echo $faq_id; ?>" style="text-decoration: none;">
                                        <?php echo $faq_question; ?>
                                        <i class="icon ion-md-add"></i>
                                        <i class="icon ion-md-remove"></i>
                                    </a>
                                    <a href="index.php?delete_faq=<?php echo $faq_id; ?>" style="color: white;">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                    <div class="answer">
                                        <span><?php echo $faq_answer; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>


<?php

if(isset($_POST['submit'])){

    $faq_question= $_POST['faq_question'];
    $faq_answer= $_POST['faq_answer'];

    $insert= "insert into faq(faq_question,faq_answer) values('$faq_question','$faq_answer')";

    $run= mysqli_query($conn,$insert);

    if($run){
        echo "<script>alert('Successfully Inserted New FAQ')</script>";
        echo "<script>window.open('index.php?insert_faq','_self')</script>";
    }
}

?>
<?php } ?>

