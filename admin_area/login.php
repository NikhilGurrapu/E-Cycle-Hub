<?php

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap-337.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/login.css">
        <title>Admin Panel</title>
    </head>
    <body>

        <div class="container">
            <form action="" method="POST" class="form-login">
                <h2 class="form-login-heading"> Admin Login</h2>

                <input type="email" class="form-control" placeholder="Email" name="admin_email" required>
                <input type="password" class="form-control" placeholder="Password" name="admin_pass" required>

                <button class="btn btn-lg btn-block" name="admin_login">
                    Login
                </button>
            </form>
        </div>

    </body>
</html>
<?php

    if(isset($_POST['admin_login'])){

        $admin_email=mysqli_real_escape_string($conn, $_POST['admin_email']);
        $admin_pass=mysqli_real_escape_string($conn, $_POST['admin_pass']);

        $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass' AND admin_role='Admin'";
        $run_admin= mysqli_query($conn,$get_admin);
        $count=mysqli_num_rows($run_admin);

        if($count==1){
            $_SESSION['admin_email']=$admin_email;
            echo "<script>alert('Welcome back')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
        else{
            echo "<script>alert('Incorrect Email / Password')</script>";
        }

    }

?>