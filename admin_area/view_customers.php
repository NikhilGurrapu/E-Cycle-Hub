<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">Customers</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"> Customers</i>
            </li>
        </ol>
    </div>
</div>
<style>

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

</style>

<div class="row">
    <div class="col-lg-12">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Customer ID...." title="Type in a name"><br><br>
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover"  id="myTable">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_c="select * from customers";
                                $run_c=mysqli_query($conn, $get_c);
                                while($row_c=mysqli_fetch_array($run_c))
                                {
                                    $c_id=$row_c['customer_id'];
                                    $c_name=$row_c['customer_name'];
                                    $c_lname=$row_c['customer_lname'];
                                    $c_email=$row_c['customer_email'];
                                    $c_state=$row_c['customer_state'];
                                    $c_city=$row_c['customer_city'];
                                    $c_contact=$row_c['customer_contact'];
                                    $c_address=$row_c['customer_address'];
                                    $i++;

                            ?>
                            <tr align="left">
                                <td><?php echo $c_id; ?></td>
                                <td><?php echo $c_name; ?>&nbsp;<?php echo $c_lname; ?></td>
                                <td><?php echo $c_email; ?></td>
                                <td><?php echo $c_state; ?></td>
                                <td><?php echo $c_city; ?></td>
                                <td><?php echo $c_contact; ?></td>
                                <td width="300"><?php echo $c_address; ?></td>
                                <td>
                                    <a href="index.php?delete_customer=<?php echo $c_id; ?>">
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


<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>