<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Slides</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-sliders"> Slides / View Slides</i>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <?php

    $i=0;
    $get_pro="select * from slider";
    $run_pro=mysqli_query($conn, $get_pro);
    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_c_id=$row_pro['slide_id'];
        $pro_c_title=$row_pro['slide_name'];
        $pro_c_desc=$row_pro['slide_image'];
        $i++;

    ?>
    <div class="row">
    <div class="col-lg-12 col-md-6"><!--products details card start-->
        <div class="panel panel-carddark">

            <div class="panel-heading">
                <div class="panel-title" align="center" style="text-transform: uppercase;">
                    <?php echo $pro_c_title; ?>
                </div>
            </div>
            <div class="panel-body">
                <img src="slides_images/<?php echo $pro_c_desc; ?>" alt="<?php echo $pro_c_title; ?>" class="img-responsive">
            </div>

            <div class="panel-footer">
                <center>
                    <a href="index.php?delete_slide=<?php echo $pro_c_id; ?>">
                        <span class="pull-right">
                            <i class="fa fa-trash"></i> Delete
                        </span>
                    </a>
                    <a href="index.php?edit_slide=<?php echo $pro_c_id; ?>">
                        <span class="pull-left">
                            <i class="fa fa-edit"></i> Edit
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </center>
            </div>

        </div>
    </div><!--products details card end-->
    </div>
    <?php } ?>
</div>

<?php } ?>