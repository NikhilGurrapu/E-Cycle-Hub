<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Products</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-bicycle"> Products / View Products</i>
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
                                <th>Brand</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Keywords</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from products";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $pro_id=$row_pro['product_id'];
                                    $date=$row_pro['date'];
                                    $title=$row_pro['product_title'];
                                    $brand=$row_pro['brand_id'];
                                    $category=$row_pro['p_cat_id'];
                                    $color=$row_pro['product_color'];
                                    $price=$row_pro['product_price'];
                                    $keywords=$row_pro['product_keywords'];
                                    $desc=$row_pro['product_desc'];
                                    $image1=$row_pro['product_img1'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $brand; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><img src="product_images/<?php echo $image1; ?>" width="120" height="80" alt="<?php echo $title; ?>"></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $desc; ?></td>
                                <td><?php echo $keywords; ?></td>
                                <td>
                                    <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-edit" style="font-size: 25px;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?delete_product=<?php echo $pro_id; ?>">
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