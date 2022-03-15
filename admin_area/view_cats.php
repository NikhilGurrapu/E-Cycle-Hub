<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>

<div class="row">
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Brands</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Brands</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Brand Name</th>
                                <th>Brand Sold Count</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from brands";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $brand_id=$row_pro['brand_id'];
                                    $brand_name=$row_pro['brand_name'];
                                    $brand_desc=$row_pro['brand_count'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $brand_name ?></td>
                                <td><?php echo $brand_desc ?></td>
                                <td>
                                    <a href="index.php?delete_brand=<?php echo $brand_id; ?>">
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
</div><!--Brand-->
    </div>
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Colors</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Colors</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Color</th>
                                <th>Color Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from colors";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $color_id=$row_pro['color_id'];
                                    $color_name=$row_pro['color_name'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><button style="background:<?php echo $color_name; ?>;padding: 20px 50px;border: 1px solid <?php echo $color_name; ?>;"></button></td>
                                <td><?php echo $color_name; ?></td>
                                <td>
                                    <a href="index.php?delete_color=<?php echo $color_id; ?>">
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
</div><!--Color-->
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Frames</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Frames</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Frame Type</th>
                                <th>Frame Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Frame'";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_type; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_frame=<?php echo $spec_id; ?>">
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
</div><!--Frame-->
    </div>
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Battery</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Battery</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Frame Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Battery'";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_battery=<?php echo $spec_id; ?>">
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
</div><!--Battery-->
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Motor</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Motor</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Motor Type</th>
                                <th>Motor Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Motor'";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_type; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_motor=<?php echo $spec_id; ?>">
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
</div><!--Motor-->
    </div>
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Fork / Suspension</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / Fork / Suspension</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Fork / Suspension Type</th>
                                <th>Fork / Suspension Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Fork' order by spec_type";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_type; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_fork_suspension=<?php echo $spec_id; ?>">
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
</div><!--Fork / Suspension-->
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Gear</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Gear</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Gear Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Gear'";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_gear=<?php echo $spec_id; ?>">
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
</div><!--Gear-->
    </div>
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Rims</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Rims</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Rims Type</th>
                                <th>Rims Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Rims' order by spec_type";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_type; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_rims=<?php echo $spec_id; ?>">
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
</div><!--Rims-->
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Tyre Sizes</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Tyre Sizes</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Tyre Sizes</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Tyre'";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_tyre_size=<?php echo $spec_id; ?>">
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
</div><!--Tyre-->
    </div>
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Mileage Pedal</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Mileage Pedal</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>MIleage Pedal</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Mileage Pedal' order by spec_name";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_pedal=<?php echo $spec_id; ?>">
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
</div><!--Mileage Pedal-->
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Mileage Throttle</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Mileage Throttle</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>MIleage Throttle</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Mileage Throttle' order by spec_name";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_throttle=<?php echo $spec_id; ?>">
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
</div><!--Mileage Throttle-->
    </div>
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Brakes</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Brakes</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Brakes Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Brakes'";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_brakes=<?php echo $spec_id; ?>">
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
</div><!--Brakes-->
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">View Displays</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-list-alt"> Categories / View Displays</i>
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Display Name</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_pro="select * from spec where spec='Display'";
                                $run_pro=mysqli_query($conn, $get_pro);
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $spec_id=$row_pro['spec_id'];
                                    $spec_name=$row_pro['spec_name'];
                                    $spec_type=$row_pro['spec_type'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $spec_name; ?></td>
                                <td>
                                    <a href="index.php?delete_display=<?php echo $spec_id; ?>">
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
</div><!--Brakes-->
    </div>
</div>

















<?php } ?>