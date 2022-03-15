<?php
$active='Shop';
include("includes/header.php");
?>

        <div id="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="rent.php">Rent Bike</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                        include("includes/sidebar.php");
                    ?>
                </div>

                <div class="col-md-9">
                    <?php
                        if(!isset($_GET['p_cat_id'])){
                            if(!isset($_GET['series_id'])){
                                if(!isset($_GET['color_name'])){
                                    echo "
                                    <div class='box'>
                                        <h1 style='color: rgba(0, 0, 0, 0.5); font-weight: bolder;'>Rent Bike</h1>
                                    </div>
                                ";
                                }                                
                            }
                        }
                    ?>

                    <div class="row"><!--row start-->
                        
                        <?php

                            if(!isset($_GET['p_cat_id'])){
                                if(!isset($_GET['series_id'])){
                                    if(!isset($_GET['color_name'])){

                                
                                $per_page=9;
                                if(isset($_GET['page'])){

                                    $page= $_GET['page'];
                                }
                                else{

                                    $page=1;
                                }
                                    $start_from= ($page-1) * $per_page;
                                    $get_products= "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                                    $run_products=mysqli_query($conn, $get_products);

                                    while($row_products= mysqli_fetch_array($run_products)){

                                        $pro_id= $row_products['product_id'];
                                        $pro_title= $row_products['product_title'];
                                        $pro_price= $row_products['product_price'];
                                        $pro_img1= $row_products['product_img1'];

                                        echo "
                                            <div class='col-md-4 col-sm-6 center-responsive'>
                                                <div class='product'>
                                                    <a href='details.php?pro_id=$pro_id'>
                                                        <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Product image'>
                                                    </a>

                                                    <div class='text'>
                                                        <h4>
                                                            <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                                                        </h4>

                                                        <p class='price'>&#8377; $pro_price</p>

                                                        <p class='button'>
                                                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                                                View Details
                                                            </a>
                                                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                                                <i class='fa fa-shopping-cart'></i> Add to Cart
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                ?>
                        
                    </div>

                    <center>
                        <ul class="pagination">
                            <?php

                                $query= "select * from products";
                                $result= mysqli_query($conn, $query);
                                $total_records= mysqli_num_rows($result);
                                $total_pages= ceil($total_records / $per_page);

                                echo "
                                    <li>
                                        <a href='shop.php?page=1'>".'First Page'."</a>
                                    </li>
                                    
                                ";

                                for($i=1; $i<=$total_pages; $i++){
                                    echo "
                                        <li>
                                            <a href='shop.php?page=".$i."'>".$i."</a>
                                        </li>
                                    "; 
                                };

                                echo "
                                    <li>
                                        <a href='shop.php?page=$total_pages'>".'Last Page'."</a>
                                    </li>
                                    
                                ";

                            }
                                }}

                            ?>
                        </ul>
                    </center>
                    <?php
                        get_p_cat_pro();
                        get_series_pro();
                        get_colors_pro();
                    ?>
                    
                </div>
            </div>
        </div>

        <?php
            include("includes/footer.php")
        ?>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
        <script>
            $(document).ready(function(){
                //Hide & Show function//
                $('.nav-toggle').click(function(){
                    $('.toggle-collapse,.collapse-data').slideToggle(1000,function(){
                        if($(this).css('display')=='none'){
                            $(".hide-show").html('Show');
                        }else{
                            $(".hide-show").html('Hide');
                        }
                    });
                });
                //Hide & Show function//

                //Search filter function//
                $(function(){
                    $.fn.extend({
                        fliterTable: function(){
                            return this.each(function(){
                                $(this).on('keyup',function(){
                                    var $this=$(this),
                                    search=$this.val().toLowerCase(),
                                    target=$this.attr('data-filters'),
                                    handle=$(target),
                                    rows=handle.find('li a');
                                    if(search==''){
                                        rows.show();
                                    }else{
                                        rows.each(function(){
                                            var $this=$(this);
                                            $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                                            $this.show();
                                        });
                                    }
                                });
                            });
                        }
                    });

                    $('[data-action="filter"][id="table-filter"]').fliterTable();
                });
                //Search filter function//
            });
        </script>
        
    </body>
</html>