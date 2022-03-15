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
                            <a href="shop.php">Products</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                        include("includes/sidebar.php");
                    ?>
                </div>

                <div class="col-md-9">
                    <div id="products" class="row"><!--row start-->
                    <?php
                        if(!isset($_GET['brand_id'])){
                            if(!isset($_GET['color_name'])){
                                if(!isset($_GET['gear_spec_name'])){
                                    if(!isset($_GET['frame_spec_type'])){
                                        if(!isset($_GET['tyre_spec_name'])){
                                            if(!isset($_GET['distance_spec_name'])){
                                                if(!isset($_GET['p_cat_id'])){
                                                    if(!isset($_GET['outofstock'])){

                                            $per_page=9;

                                            if(isset($_GET['page'])){
                                                $page=$_GET['page'];
                                            }
                                            else
                                            {
                                                $page=1;
                                            }
                                                
                                                $start_from= ($page-1) * $per_page;
                                                $get_products="select * from products where stock>0 order by 1 ASC LIMIT $start_from,$per_page";
                                                $run_products=mysqli_query($conn,$get_products);
                                                while($row_products=mysqli_fetch_array($run_products)){
                                                    $pro_id=$row_products['product_id'];
                                                    $pro_title=$row_products['product_title'];
                                                    $pro_price=$row_products['product_price'];
                                                    $pro_img1=$row_products['product_img1'];
                                                    $stock=$row_products['stock'];

                                                    if($stock==0){
                                                        echo "
                                                            <div class='col-md-4 col-sm-6 center-responsive'>
                                                                <div class='product'>
                                                                    <span class='thumb-product-type-stock' style='color: #fff;
                                                                    background-color: red;
                                                                    display: inline-block;
                                                                    border-radius: 2px;
                                                                    float: left;
                                                                    font-size: 13px;
                                                                    font-weight: 400;
                                                                    letter-spacing: 1px;
                                                                    margin: 10px 9px -15px -10px;
                                                                    padding-left: 5px;
                                                                    padding-top: 10px;
                                                                    padding-bottom: 10px;
                                                                    padding-right: 10px;
                                                                    text-transform: none;'>Out of Stock</span>
                                                        ";
                                                    }
                                                    if($stock>0){
                                                        echo "
                                                            <div class='col-md-4 col-sm-6 center-responsive'>
                                                                <div class='product'>
                                                        ";
                                                    }
                                                    echo "
                                                        
                                                            
                                                                <a href='details.php?pro_id=$pro_id'>
                                                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                                                </a>
                                                                <div class='text'>
                                                                    <h3 align='center'>
                                                                        <a href='details.php?pro_id=$pro_id' style='text-decoration:none;color:black;'>$pro_title</a>
                                                                    </h3>
                                                                    <p class='price'>$pro_price</p>
                                                                    <p class='button'>
                                                                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>
                                                                            View Details
                                                                        </a>
                                                                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                                                            <i class='fa fa-shopping-cart'></i> Add to cart
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

                            $query="select * from products";
                            $result=mysqli_query($conn,$query);
                            $total_records=mysqli_num_rows($result);
                            $total_pages=ceil($total_records / $per_page);

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
                                            }
                                        }
                                    }
                                        }
                                    }
                                }
                            }
                            ?>

                        </ul>
                    </center>
                        <?php
                            get_brand_pro();
                            get_color_pro();
                            get_gear_pro();
                            get_frame_pro();
                            get_tyre_pro();
                            get_distance_pro();
                            get_p_cat_pro();
                            get_outofstock();
                        ?>
                                        
                </div>
                
            </div>
        </div>

        <?php
            include("includes/footer.php");
        ?>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
        <script>
            $(document).ready(function(){
                //Hide & Show function//
                $('.nav-toggle').click(function(){
                    $('.toggle-collapse,.collapse-data').slideToggle(700,function(){
                        if($(this).css('display')=='none'){
                            $(".hide-show").html('<i class="fa fa-chevron-down"></i>');
                        }else{
                            $(".hide-show").html('<i class="fa fa-chevron-up"></i>');
                        }
                    });
                });
                //Hide & Show function//

                //Search filter function//
                $(function(){
                    $.fn.extend({
                        filterTable: function(){
                            return this.each(function(){
                                $(this).on('keyup',function(){
                                    var $this=$(this),
                                    search=$this.val().toLowerCase(),
                                    target=$this.attr('data-filters'),
                                    handle=$(target),
                                    rows=handle.find('li a');
                                    if(search == ''){
                                        rows.show();
                                    }else{
                                        rows.each(function(){
                                            var $this=$(this);
                                            $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : 
                                            $this.show();
                                        });
                                    }
                                });
                            });
                        }
                    });

                    $('[data-action="filter"][id="dev-table-filter"]').filterTable();
                });
                //Search filter function//
            });
        </script>
        
        <script>
            $(document).ready(function(){
                function getProducts(){

                    
                    var sPath='';
                    var aInputs=$('li').find('.get_brand');
                    var aKeys= Array();
                    var aValues= Array();

                    iKey=0;

                    $.each(aInputs, function(key, oInput){
                        if(oInput.checked){
                            aKeys[iKey]=oInput.value
                        };
                        iKey++;
                    });
                    if(aKeys.length>0){
                        var sPath='';
                        for(var i=0; i<aKeys.length; i++){
                            sPath=sPath+'brand[]='+aKeys[i]+'&';
                        }
                    }


                    var aInputs=Array();
                    var aInputs=$('li').find('.get_color');
                    var aKeys= Array();
                    var aValues= Array();

                    iKey=0;

                    $.each(aInputs, function(key, oInput){
                        if(oInput.checked){
                            aKeys[iKey]=oInput.value
                        };
                        iKey++;
                    });
                    if(aKeys.length>0){
                        var sPath='';
                        for(var i=0; i<aKeys.length; i++){
                            sPath=sPath+'color[]='+aKeys[i]+'&';
                        }
                    }

                    $('#wait').html('<img src="images/load.gif"');

                    $.ajax({
                        url="load.php",
                        method="POST",
                        data: sPath+'sAction=getProducts',
                        success:function(data){
                            $('#products').html('');
                            $('#products').html(data);
                            $('#wait').empty();

                        }
                    });

                    $.ajax({
                        url="load.php",
                        method="POST",
                        data: sPath+'sAction=getPaginator',
                        success:function(data){
                            $('.pagination').html('');
                            $('.pagination').html(data);
                        }
                    });
                }

                $('.get_brand').click(function(){
                    getProducts();
                });

                $('.get_color').click(function(){
                    getProducts();
                });
            });
        </script>
    </body>
</html>