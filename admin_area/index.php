<?php

    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
        $admin_email=$_SESSION['admin_email'];
        $get_admin="select * from admins where admin_email='$admin_email'";
        $run_admin=mysqli_query($conn, $get_admin);
        $row_admin=mysqli_fetch_array($run_admin);

        $admin_id=$row_admin['admin_id'];
        $admin_name=$row_admin['admin_name'];
        $admin_email=$row_admin['admin_email'];
        $admin_image=$row_admin['admin_image'];
        $admin_country=$row_admin['admin_country'];
        $admin_about=$row_admin['admin_about'];
        $admin_role=$row_admin['admin_role'];
        
        $get_products= "select * from products";
        $run_products= mysqli_query($conn, $get_products);
        $count_products=mysqli_num_rows($run_products);

        $get_customers= "select * from customers";
        $run_customers= mysqli_query($conn, $get_customers);
        $count_customers= mysqli_num_rows($run_customers);

        $get_p_categories= "select * from product_categories";
        $run_p_categories= mysqli_query($conn, $get_p_categories);
        $count_p_categories= mysqli_num_rows($run_p_categories);


        $get_profit_margin="SELECT SUM(final_cost_price) AS total_expenses,SUM(due_amount) AS total_revenue FROM `customer_orders` WHERE order_status NOT LIKE '%Canceled%'";
        $run_profit_margin=mysqli_query($conn,$get_profit_margin);
        $row_porfit_margin=mysqli_fetch_array($run_profit_margin);
        $total_expenses=$row_porfit_margin['total_expenses'];
        $total_revenue= $row_porfit_margin['total_revenue'];

        $profit_margin=(($total_revenue-$total_expenses)/$total_revenue)*100;
        $profit_margin=round($profit_margin,2);

        $get_orders="select * from customer_orders where order_status NOT LIKE '%Canceled%'";
        $run_orders=mysqli_query($conn,$get_orders);
        $count_orders=mysqli_num_rows($run_orders);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap-337.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <title>Admin Panel</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>

    <body>

    
        <div id="wrapper">

            <?php include("includes/sidebar.php"); ?>

            <div id="page-wrapper">
                <div class="container-fluid">

                    <?php

                        if(isset($_GET['dashboard'])){
                            include("dashboard.php");
                        }
                        if(isset($_GET['insert_product'])){
                            include("insert_product.php");
                        }
                        if(isset($_GET['view_products'])){
                            include("view_products.php");
                        }
                        if(isset($_GET['delete_product'])){
                            include("delete.php");
                        }
                        if(isset($_GET['edit_product'])){
                            include("edit_product.php");
                        }
                        if(isset($_GET['insert_p_cat'])){
                            include("insert_p_cat.php");
                        }
                        if(isset($_GET['view_p_cats'])){
                            include("view_p_cats.php");
                        }
                        if(isset($_GET['delete_p_cat'])){
                            include("delete.php");
                        }
                        if(isset($_GET['edit_p_cat'])){
                            include("edit_p_cat.php");
                        }
                        if(isset($_GET['insert_cat'])){
                            include("insert_cat.php");
                        }
                        if(isset($_GET['view_cats'])){
                            include("view_cats.php");
                        }
                        if(isset($_GET['delete_cat'])){
                            include("delete.php");
                        }
                        if(isset($_GET['edit_cat'])){
                            include("edit_cat.php");
                        }
                        if(isset($_GET['insert_slide'])){
                            include("insert_slide.php");
                        }
                        if(isset($_GET['view_slides'])){
                            include("view_slides.php");
                        }
                        if(isset($_GET['delete_slide'])){
                            include("delete.php");
                        }
                        if(isset($_GET['edit_slide'])){
                            include("edit_slide.php");
                        }
                        if(isset($_GET['view_customers'])){
                            include("view_customers.php");
                        }
                        if(isset($_GET['delete_customer'])){
                            include("delete.php");
                        }
                        if(isset($_GET['view_orders'])){
                            include("view_orders.php");
                        }
                        if(isset($_GET['delete_order'])){
                            include("delete.php");
                        }
                        if(isset($_GET['view_payments'])){
                            include("view_payments.php");
                        }
                        if(isset($_GET['delete_payment'])){
                            include("delete.php");
                        }
                        if(isset($_GET['insert_user'])){
                            include("insert_user.php");
                        }
                        if(isset($_GET['view_users'])){
                            include("view_users.php");
                        }
                        if(isset($_GET['delete_user'])){
                            include("delete.php");
                        }
                        if(isset($_GET['edit_user'])){
                            include("edit_user.php");
                        }
                        if(isset($_GET['view_profile'])){
                            include("view_profile.php");
                        }
                        if(isset($_GET['change_password'])){
                            include("change_password.php");
                        }
                        if(isset($_GET['insert_term'])){
                            include("insert_term.php");
                        }
                        if(isset($_GET['view_terms'])){
                            include("view_terms.php");
                        }
                        if(isset($_GET['delete_term'])){
                            include("delete.php");
                        }
                        if(isset($_GET['edit_term'])){
                            include("edit_term.php");
                        }
                        if(isset($_GET['delete_color'])){
                            include("delete.php");
                        }
                        if(isset($_GET['delete_frame'])){
                            include("delete.php");
                        }
                        if(isset($_GET['update_order_status'])){
                            include("update_order_status.php");
                        }
                        if(isset($_GET['insert_faq'])){
                            include("insert_faq.php");
                        }
                        if(isset($_GET['delete_faq'])){
                            include("delete.php");
                        }

                    ?>

                </div>
            </div>
        </div>


        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
    </body>
</html>
<?php

    }

?>