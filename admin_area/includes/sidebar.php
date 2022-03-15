<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
        $admin_email=$_SESSION['admin_email'];

?>

<nav class="navbar navbar-light navbar-fixed-top" style="background-color: #155567; color: #ffffff;">
    <div class="navbar-hedaer">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar" style="background-color: #ffffff;"></span>
            <span class="icon-bar" style="background-color: #ffffff;"></span>
            <span class="icon-bar" style="background-color: #ffffff;"></span>
        </button>

        <a href="index.php?dashboard" class="navbar-brand" style="color: #ffffff;">Admin Panel</a>

    </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php echo $admin_name; ?> <b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw fa-user"></i> Proflie
                    </a>
                </li>
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-bicycle"></i> Products
                        <span class="badge" style="width: 30px; height: 20px;font-size: 15px;">
                            <?php echo $count_products; ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-users"></i> Customers
                        <span class="badge" style="width: 30px; height: 20px;font-size: 15px;">
                            <?php echo $count_customers; ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_category">
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        <span class="badge" style="width: 30px; height: 20px;font-size: 15px;">
                            <?php echo $count_p_categories; ?>
                        </span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-bicycle"></i> Products
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">Insert Products</a>
                    </li>
                    <li>
                        <a href="index.php?view_products">View Products</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    <i class="fa fa-fw fa-book"></i> Product Categories
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat">Insert Product Category</a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats">View Product Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                    <i class="fa fa-fw fa-list-alt"></i> Categories
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat">Insert Category</a>
                    </li>
                    <li>
                        <a href="index.php?view_cats">View Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#terms">
                    <i class="fa fa-fw fa-gavel"></i> Terms & Policy
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="terms" class="collapse">
                    <li>
                        <a href="index.php?insert_term">Insert Term or Policy</a>
                    </li>
                    <li>
                        <a href="index.php?view_terms">View Term & Policys</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    <i class="fa fa-fw fa-sliders"></i> Slides
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide">Insert Slides</a>
                    </li>
                    <li>
                        <a href="index.php?view_slides">View Slides</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?insert_faq">
                    <i class="fa fa-question-circle"></i>&nbsp;FAQs
                </a>
            </li>
            
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a>
            </li>
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-first-order"></i> View Orders
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a>
            </li>

            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-users"></i> Users
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user">Insert User</a>
                    </li>
                    <li>
                        <a href="index.php?view_users">View Users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#profile">
                    <i class="fa fa-fw fa-user"></i> Profile
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="profile" class="collapse">
                    <li>
                        <a href="index.php?view_profile=<?php echo $admin_email; ?>">Edit Profile</a>
                    </li>
                    <li>
                        <a href="index.php?change_password=<?php echo $admin_email; ?>">Change Password</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php

    }

?>