<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Product Cateory</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-book"> Products Categories / View Product Cateory</i>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Category ID</th>
                                <th>Category Title</th>
                                <th>Category Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from product_categories";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $pro_c_id=$row_pro['p_cat_id'];
                                    $pro_c_title=$row_pro['p_cat_title'];
                                    $pro_c_desc=$row_pro['p_cat_desc'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $pro_c_id; ?></td>
                                <td><?php echo $pro_c_title; ?></td>
                                <td align="left" width="600"><?php echo $pro_c_desc; ?></td>
                                <td>
                                    <a href="index.php?edit_p_cat=<?php echo $pro_c_id; ?>">
                                        <i class="fa fa-edit" style="font-size: 25px;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?delete_p_cat=<?php echo $pro_c_id; ?>">
                                        <i class="fa fa-trash" style="font-size: 25px;"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<?php } ?>