<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Terms & Policy</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-gavel"> Terms & Policy</i>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <?php

    $i=0;
    $get_pro="select * from terms";
    $run_pro=mysqli_query($conn, $get_pro);
    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_c_id=$row_pro['term_id'];
        $pro_c_title=$row_pro['term_title'];
        $pro_c_desc=$row_pro['term_para'];
        $i++;

    ?>
    <div class="col-lg-6 col-md-6"><!--products details card start-->
        <div class="panel panel-carddark">

            <div class="panel-heading">
                <div class="panel-title" align="center" style="text-transform: uppercase;">
                    <?php echo $pro_c_title; ?>
                </div>
            </div>
            <div class="panel-body">
                <p><?php echo $pro_c_desc; ?></p>
            </div>

            <div class="panel-footer">
                <center>
                    <a href="index.php?delete_term=<?php echo $pro_c_id; ?>">
                        <span class="pull-right">
                            <i class="fa fa-trash"></i> Delete
                        </span>
                    </a>
                    <a href="index.php?edit_term=<?php echo $pro_c_id; ?>">
                        <span class="pull-left">
                            <i class="fa fa-edit"></i> Edit
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </center>
            </div>

        </div>
    </div><!--products details card end-->
    <?php } ?>
</div>

<?php } ?>
