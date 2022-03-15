<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">Orders</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-first-order"> Orders</i>
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
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Invoice no...." title="Type in a name"><br><br>
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover"  id="myTable">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th width="50px;">Order ID</th>
                                <th width="60px;">Product ID</th>
                                <th width="60px;">Customer ID</th>
                                <th width="60px;">Customer Name</th>
                                <th width="115px;">Customer Contact</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Amount</th>
                                <th width="90px;">Order Date</th>
                                <th width="60px;">Payment Status</th>
                                <th width="60px;">Payment Method</th>
                                <th>Order Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $i=0;
                                $get_o="select * from customer_orders where order_status NOT LIKE '%canceled%'";
                                $run_o=mysqli_query($conn, $get_o);
                                while($row_o=mysqli_fetch_array($run_o)){
                                    $o_id=$row_o['order_id'];
                                    $customer_id=$row_o['customer_id'];
                                    $get_c="select * from customers where customer_id='$customer_id'";
                                    $run_c=mysqli_query($conn,$get_c);
                                    $row_c=mysqli_fetch_array($run_c);

                                    $customer_name=$row_c['customer_name'];
                                    $customer_lname=$row_c['customer_lname'];
                                    $customer_contact= $row_c['customer_contact'];

                                    $product_id=$row_o['product_id'];
                                    $product_title=$row_o['product_title'];
                                    $product_image=$row_o['product_image'];
                                    $due_amount=$row_o['due_amount'];
                                    $invoice_no=$row_o['invoice_no'];
                                    $order_date=$row_o['order_date'];
                                    $payment_method=$row_o['payment_method'];
                                    $payment_status=$row_o['payment_status'];
                                    $order_status=$row_o['order_status'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $o_id; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $customer_id; ?></td>
                                <td><?php echo $customer_name." ".$customer_lname; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><img src="product_images/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="100" height="60"></td>
                                <td><?php echo $due_amount; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $payment_status; ?></td>
                                <td><?php echo $payment_method ?></td>
                                <?php
                                if($order_status=='Canceled'){
                                    echo "
                                        <td style='color: red;font-weight:bold;'><i class='fa fa-circle'></i> $order_status</td>
                                    ";
                                }else{
                                    echo "
                                        <td style='color: green;font-weight:bold;'>$order_status<br><br>
                                            <a href='index.php?update_order_status=$o_id'>
                                                <i class='fa fa-edit' style='font-size: 25px;'></i>
                                            </a>
                                        </td>
                                    ";
                                }
                                ?>
                                <td>
                                    <a href="index.php?delete_order=<?php echo $o_id; ?>">
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
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">Canceled Orders</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-first-order"> Canceled Orders</i>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="tabel-responsive">
                    <table class="table table-striped table-bordered table-hover"  id="myTable">
                        <thead>
                            <tr>
                                <th>Invoice No</th>
                                <th width="50px;">Order ID</th>
                                <th width="60px;">Product ID</th>
                                <th width="60px;">Customer ID</th>
                                <th width="60px;">Customer Name</th>
                                <th width="115px;">Customer Contact</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Amount</th>
                                <th width="90px;">Order Date</th>
                                <th width="60px;">Payment Status</th>
                                <th width="60px;">Payment Method</th>
                                <th>Order Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $i=0;
                                $get_o="select * from customer_orders where order_status LIKE '%canceled%'";
                                $run_o=mysqli_query($conn, $get_o);
                                while($row_o=mysqli_fetch_array($run_o)){
                                    $o_id=$row_o['order_id'];
                                    $customer_id=$row_o['customer_id'];
                                    $get_c="select * from customers where customer_id='$customer_id'";
                                    $run_c=mysqli_query($conn,$get_c);
                                    $row_c=mysqli_fetch_array($run_c);

                                    $customer_name=$row_c['customer_name'];
                                    $customer_lname=$row_c['customer_lname'];
                                    $customer_contact= $row_c['customer_contact'];

                                    $product_id=$row_o['product_id'];
                                    $product_title=$row_o['product_title'];
                                    $product_image=$row_o['product_image'];
                                    $due_amount=$row_o['due_amount'];
                                    $invoice_no=$row_o['invoice_no'];
                                    $order_date=$row_o['order_date'];
                                    $payment_method=$row_o['payment_method'];
                                    $payment_status=$row_o['payment_status'];
                                    $order_status=$row_o['order_status'];
                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $o_id; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $customer_id; ?></td>
                                <td><?php echo $customer_name." ".$customer_lname; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><img src="product_images/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="100" height="60"></td>
                                <td><?php echo $due_amount; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $payment_status; ?></td>
                                <td><?php echo $payment_method ?></td>
                                <?php
                                if($order_status=='Canceled'){
                                    echo "
                                        <td style='color: red;font-weight:bold;'><i class='fa fa-circle'></i> $order_status</td>
                                    ";
                                }else{
                                    echo "
                                        <td style='color: green;font-weight:bold;'>$order_status<br><br>
                                            <a href='index.php?update_order_status=$o_id'>
                                                <i class='fa fa-edit' style='font-size: 25px;'></i>
                                            </a>
                                        </td>
                                    ";
                                }
                                ?>
                                <td>
                                    <a href="index.php?delete_order=<?php echo $o_id; ?>">
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