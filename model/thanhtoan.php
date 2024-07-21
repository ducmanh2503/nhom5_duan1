<?php
    function insert_order($customer_name, $customer_address, $customer_phone, $customer_email) {
    $sql = "INSERT INTO `order`(`customer_name`, `customer_address`, `customer_phone`, `customer_email`) VALUES (?, ?, ?, ?)";
    $last_id = pdo_execute_last_id($sql, $customer_name, $customer_address, $customer_phone, $customer_email);
    return $last_id;
    }

    function insert_order_details($order_id, $product_id, $quantity, $product_price, $total_money) {
        $sql = "INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `product_price`, `total_money`) VALUES ('$order_id','$product_id','$quantity','$product_price', $total_money)";
        pdo_execute($sql);
    }
?>