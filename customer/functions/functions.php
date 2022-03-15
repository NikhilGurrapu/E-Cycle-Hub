<?php

$db= mysqli_connect("localhost","root","","ecyclehub");

function getRealIpUser(){
    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])); return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENTL_IP'])); return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])); return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default : return $_SERVER['REMOTE_ADDR'];
    }
}

function items(){
    global $db;

    $ip_add= getRealIpUser();

    $get_items= "select * from cart where ip_add='$ip_add'";
    $run_items= mysqli_query($db, $get_items);
    $count_items= mysqli_num_rows($run_items);
    echo $count_items;
}

function total_price(){
    global $db;

    $ip_add= getRealIpUser();
    $total=0;

    $select_cart= "select * from cart where ip_add='$ip_add'";
    $run_cart= mysqli_query($db, $select_cart);

    while($record=mysqli_fetch_array($run_cart)){
        $pro_id= $record['p_id'];
        $pro_qty=$record['qty'];
        $get_price= "select * from products where product_id='$pro_id'";
        $run_price=mysqli_query($db, $get_price);
        while($row_price=mysqli_fetch_array($run_price)){
            $sub_total=$row_price['product_price']*$pro_qty;
            $total+=$sub_total;
        }
    }
    echo $total. "&nbsp; &#8377;";
}
?>