<?php
     function add_cart($product_id) {
        $sql =  "SELECT * FROM product where product_id = $product_id";
        if($sql){
            $product = pdo_query_one($sql);
        }
        return $product;
    }

    /* cart admin*/

    function load_all_order() {
        $sql = "SELECT * FROM `order` WHERE 1";
        $list_order = pdo_query($sql);
        return $list_order;
    }

    function load_one_order($order_id){
        $sql = "SELECT * FROM `order` where order_id =$order_id";
        $order = pdo_query_one($sql);     
        return $order;
    }

    function load_one_acc($account_id){
        $sql = "SELECT * FROM account where account_id = $account_id";
        $acc_id = pdo_query_one($sql); 
        return $acc_id;
    }

    function order_details($order_id){
        $sql = "SELECT order_details.order_id,order_details.product_price,order_details.quantity,product.product_image,product.product_name FROM order_details JOIN product ON order_details.product_id = product.product_id WHERE order_details.order_id = $order_id";
        $list_order_details = pdo_query($sql);
        return $list_order_details;
    }

    function update_order($order_id,$order_status){
        $sql = "UPDATE order set order_status = '$order_status' where order_id = $order_id";
        pdo_execute($sql,$order_id,$order_status);
        
    }

    


    
    
?>