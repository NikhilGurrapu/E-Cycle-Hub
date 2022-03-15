<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

        $admin_email=$_SESSION['admin_email'];
        $get_admin="select * from admins where admin_email='$admin_email'";
        $run_admin=mysqli_query($conn,$get_admin);
        $row_admin=mysqli_fetch_array($run_admin);

        $admin_id=$row_admin['admin_id'];

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">Users</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"> User / View Users</i>
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
                                <th>Admin ID</th>
                                <th>Admin Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_c="select * from admins where admin_id NOT LIKE '%$admin_id%'";
                                $run_c=mysqli_query($conn, $get_c);
                                while($row_c=mysqli_fetch_array($run_c))
                                {
                                    $admin_id=$row_c['admin_id'];
                                    $admin_name=$row_c['admin_name'];
                                    $admin_email=$row_c['admin_email'];
                                    $admin_contact=$row_c['admin_contact'];
                                    $admin_role=$row_c['admin_role'];
                                    $i++;

                            ?>
                            <tr align="left">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $admin_id; ?></td>
                                <td><?php echo $admin_name; ?></td>
                                <td><?php echo $admin_email; ?></td>
                                <td><?php echo $admin_contact; ?></td>
                                <td><?php echo $admin_role; ?></td>
                                <td>
                                    <a href="index.php?edit_user=<?php echo $admin_id; ?>">
                                        <i class="fa fa-edit" style="font-size: 25px;"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?delete_user=<?php echo $admin_id; ?>">
                                        <i class="fa fa-trash" style="font-size: 25px;"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<?php } ?>