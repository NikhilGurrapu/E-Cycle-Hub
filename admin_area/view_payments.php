<?php

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{

?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">Payments</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-money"> View Payments</i>
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
                                <th>Payment ID</th>
                                <th>Product ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $i=0;
                                $get_o="select * from payments order by 1 DESC";
                                $run_o=mysqli_query($conn, $get_o);
                                while($row_o=mysqli_fetch_array($run_o)){
                                    $payment_id=$row_o['payment_id'];
                                    $invoice_no=$row_o['invoice_no'];
                                    $product_id=$row_o['product_id'];
                                    $customer_id=$row_o['customer_id'];
                                    $product_title=$row_o['product_title'];
                                    $product_image=$row_o['product_image'];
                                    $amount=$row_o['amount'];
                                    $payment_date=$row_o['payment_date'];
                                    $payment_method=$row_o['payment_method'];
                                    $payment_status=$row_o['payment_status'];

                                    $get_customer="SELECT * FROM customers WHERE customer_id='$customer_id'";
                                    $run_customer=mysqli_query($conn,$get_customer);
                                    $row_customer=mysqli_fetch_array($run_customer);

                                    $customer_name=$row_customer['customer_name'];
                                    $customer_lname=$row_customer['customer_lname'];
                                    $customer_email=$row_customer['customer_email'];

                                    $i++;

                            ?>
                            <tr align="center">
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $payment_id; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $customer_name.' '.$customer_lname; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $product_title; ?></td>
                                <td><img src="product_images/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="100" height="60"></td>
                                <td><?php echo $amount; ?></td>
                                <td><?php echo $payment_date; ?></td>
                                <td><?php echo $payment_method; ?></td>
                                <td><?php echo $payment_status; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
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


<?php } ?>