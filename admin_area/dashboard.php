<?php

include("includes/db.php");

    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else{
        
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #155567;">Dashboard</h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"> Dashboard</i>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6"><!--products details card start-->
        <div class="panel panel-card">

            <div class="panel-heading">
                <div class="row">

                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_products; ?></div>
                        <div>Products</div>
                    </div>
                </div>
            </div>

            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">
                        View details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div><!--products details card end-->

    <div class="col-lg-3 col-md-6"><!--customers details card start-->
        <div class="panel panel-card">

            <div class="panel-heading">
                <div class="row">

                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_customers; ?></div>
                        <div>Customers</div>
                    </div>
                </div>
            </div>

            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left">
                        View details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div><!--customers details card end-->

    <div class="col-lg-3 col-md-6"><!--product category details card start-->
        <div class="panel panel-carddark">

            <div class="panel-heading">
                <div class="row">

                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $profit_margin; ?>%</div>
                        <div>Overall Profit Margin</div>
                    </div>
                </div>
            </div>

            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">
                        View details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div><!--product cateory details card end-->

    <div class="col-lg-3 col-md-6"><!--product orders details card start-->
        <div class="panel panel-carddark">

            <div class="panel-heading">
                <div class="row">

                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_orders; ?></div>
                        <div>Total # of Orders</div>
                    </div>
                </div>
            </div>

            <a href="index.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left">
                        View details
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div><!--product oredrs details card end-->
</div>

<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Brand');
        data1.addColumn('number', 'Count');
        data1.addRows([
            <?php
                $get_count="SELECT * from brands order by brand_count DESC LIMIT 10";
                $run_count=mysqli_query($conn,$get_count);
                while($row_count=mysqli_fetch_array($run_count)){
                    $brand_name=$row_count['brand_name'];
                    $brand_count=$row_count['brand_count'];
            ?>
          ['<?php echo $brand_name; ?>', <?php echo $brand_count; ?>],
          <?php } ?>
        ]);

        var data2 = new google.visualization.arrayToDataTable([
            ['Title','Count'],
            <?php
                $get_count="SELECT * from products order by count DESC LIMIT 10";
                $run_count=mysqli_query($conn,$get_count);
                while($row_count=mysqli_fetch_array($run_count)){
                    $brand_name=$row_count['product_title'];
                    $brand_count=$row_count['count'];
            ?>
          ['<?php echo $brand_name; ?>', <?php echo $brand_count; ?>],
          <?php } ?>
        ]);


        var piechart_options = {
            title:'Top 10 E-cycles Brands Sold',
            titleTextStyle: {
                color: "black",
                fontSize: 25
            },
            width: 674,
            pieHole: 0.4,
            height:500};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data1, piechart_options);

        var barchart_options = {
            title:'Top 10 E-cycles Products Sold',
            titleTextStyle: {
                color: "black",
                fontSize: 25
            },
            width:674,
            height:500,
            legend: 'none'};
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data2, barchart_options);
      }
    </script>

    
        <div class="col-md-6">
            <div id="piechart_div" style="border: 1px solid #ccc"></div>
        </div>
        <div class="col-md-6">
            <div id="barchart_div" style="border: 1px solid #ccc"></div>
        </div>
        
</div>

<div class="row" style="margin-top: 15px; margin-bottom: 15px;">

      <?php
      $get_profit_check="SELECT DATE_FORMAT(order_date, '%Y-%m') AS month_year, SUM(profit) AS profit FROM customer_orders WHERE order_status NOT LIKE '%Canceled%' GROUP BY DATE_FORMAT(order_date, '%Y-%m') ORDER BY order_date DESC";
      $run_profit_check=mysqli_query($conn,$get_profit_check);
      $count_check=mysqli_num_rows($run_profit_check);
      if($count_check>0){
      ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Profit'],
          <?php
            $get_profit="SELECT DATE_FORMAT(order_date, '%Y-%m') AS month_year, SUM(profit) AS profit FROM customer_orders WHERE order_status NOT LIKE '%Canceled%' GROUP BY DATE_FORMAT(order_date, '%Y-%m') ORDER BY order_date DESC";
            $run_profit=mysqli_query($conn,$get_profit);
            while($row_profit=(mysqli_fetch_array($run_profit))){
                $order_date=$row_profit['month_year'];
                $profit=$row_profit['profit'];
          ?>
          ['<?php echo $order_date; ?>',<?php echo $profit; ?>],

          <?php } ?>
        ]);

        var options = {
          title: 'Last 6 Months Profit Based on Orders',
          titleTextStyle: {
                color: "black",
                fontSize: 20
            },
          width: 674,
          height: 500,
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
    </script>

    <div class="col-md-6">
        <div id="curve_chart" style="border: 1px solid #ccc"></div>
    </div>
    <?php } ?>

    <?php
    $query_check="SELECT DATE_FORMAT(order_date, '%Y-%m') AS month_year, SUM(final_cost_price) AS expenses, SUM(due_amount) AS income, SUM(profit) AS profit FROM customer_orders WHERE order_status NOT LIKE '%Canceled%' GROUP BY DATE_FORMAT(order_date, '%Y-%m') ORDER BY order_date DESC LIMIT 6";
    $run_check=mysqli_query($conn,$query_check);
    $count_run_check=mysqli_num_rows($run_check);
    if($count_run_check>0){

    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Expenses', 'Income', 'Profit'],
          <?php
            $query="SELECT DATE_FORMAT(order_date, '%Y-%m') AS month_year, SUM(final_cost_price) AS expenses, SUM(due_amount) AS income, SUM(profit) AS profit FROM customer_orders WHERE order_status NOT LIKE '%Canceled%' GROUP BY DATE_FORMAT(order_date, '%Y-%m') ORDER BY order_date DESC LIMIT 6";
            $run=mysqli_query($conn,$query);
            while($row=mysqli_fetch_array($run)){
                $month=$row['month_year'];
                $expenses=$row['expenses'];
                $income=$row['income'];
                $profit_xyz=$row['profit'];
          ?>
          ['<?php echo $month; ?>',<?php echo $expenses; ?>,<?php echo $income; ?>,<?php echo $profit_xyz; ?>],
          <?php } ?>
        ]);

        var options = {
          title : 'Last 6 Months Income and Expenses',
          titleTextStyle: {
                color: "black",
                fontSize: 20
            },
          vAxis: {title: 'Money'},
          hAxis: {title: 'Month'},
          colors: ['#3385ff','#00e6b8','red'],
          width: 674,
          height: 500,
          seriesType: 'bars',
          series: {2: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    
    <div class="col-md-6">
        <div id="chart_div" style="border: 1px solid #ccc"></div>
    </div>
    <?php } ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-carddark">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> New Orders
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product ID</th>
                                <th>Customer Email</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Amount</th>
                                <th>Invoice No</th>
                                <th>Order Date</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $i=0;
                                $get_orders= "select * from customer_orders where order_status='Ordered' order by order_id DESC LIMIT 5";
                                $run_orders= mysqli_query($conn, $get_orders);
                                while($row_orders=mysqli_fetch_array($run_orders)){

                                    $order_id= $row_orders['order_id'];
                                    $c_id= $row_orders['customer_id'];
                                    $product_id= $row_orders['product_id'];
                                    $product_title= $row_orders['product_title'];
                                    $product_image= $row_orders['product_image'];
                                    $due_amount= $row_orders['due_amount'];
                                    $invoice_no= $row_orders['invoice_no'];
                                    $order_date= $row_orders['order_date'];
                                    $order_status=$row_orders['order_status'];
                                    $payment_method= $row_orders['payment_method'];
                                    $payment_status= $row_orders['payment_status'];
                                    $i++;

                            ?>
                            <tr>
                                <td><?php echo $order_id; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td>
                                    <?php
                                        $get_customer= "select * from customers where customer_id='$c_id'";
                                        $run_customer= mysqli_query($conn,$get_customer);
                                        $row_customer= mysqli_fetch_array($run_customer);
                                        $customer_email= $row_customer['customer_email'];
                                        echo $customer_email;
                                    ?>
                                </td>
                                <td><?php echo $product_title; ?></td>
                                <td><img src="product_images/<?php echo $product_image; ?>" alt="<?php echo $product_title; ?>" width="100" height="60"></td>
                                <td><?php echo $due_amount; ?></td>
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $payment_method; ?></td>
                                <td><?php echo $payment_status; ?></td>
                                <?php
                                if($order_status=="Canceled"){
                                    echo "
                                        <td style='color: red;font-weight:bold;'><i class='fa fa-circle'></i> $order_status</td>
                                    ";
                                }else{
                                    echo "
                                        <td style='color: green;font-weight:bold;'>$order_status</td>
                                    ";
                                }
                                ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-right">
                    <a href="index.php?view_orders">
                        View all orders <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="mb-mb thumb-info">

                    <img src="kdd" alt="image" class="img-responsive">

                    <div class="thumb-info-title">

                        <span class="thumb-info-inner">Nikhil</span>
                        <span class="thumb-info-type">Web Developer</span>

                    </div>
                </div>

                <div class="md-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i> <span>Email: </span> example@gmail.com <br/>
                        <i class="fa fa-flag"></i> <span>Country: </span> example <br/>
                        <i class="fa fa-envelope"></i> <span>Contact:</span> 180-888-9898 <br/>
                    </div>

                    <hr class="dotted short" style="margin-top: 10px 0 10px 0;">
                    
                    <h5 class="text-muted">About Me</h5>
                    <p>
                        dbdjbsdbhdbdbdbsbbdsbdbjbbsdbdbbsbdsbdjbjs<br/>
                        <a href="#">NIKHIL.G</a>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa ipsam aliquam dolor voluptatibus sed aperiam delectus voluptatem.
                         Asperiores officia animi corrupti cum exercitationem quisquam, consectetur, esse necessitatibus cupiditate quae possimus?
                    </p>
                </div>

            </div>
        </div>
    </div>-->
</div>

<?php
    }
?>