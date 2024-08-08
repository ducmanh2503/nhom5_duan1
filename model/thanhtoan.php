<?php
function insert_order($customer_name, $customer_address, $customer_phone, $customer_email, $order_id)
{
    $sql = "INSERT INTO `order`(`customer_name`, `customer_address`, `customer_phone`, `customer_email`, `order_id`) VALUES (?, ?, ?, ?, ?)";
    $last_id = pdo_execute_last_id($sql, $customer_name, $customer_address, $customer_phone, $customer_email, $order_id);
    return $last_id;
}

function insert_vnpay($vnp_amount, $vnp_bankcode, $vnp_banktranno, $vnp_cardtype, $vnp_orderinfo, $vnp_paydate, $vnp_tmncode, $vnp_transactionno, $code_cart) {
    $sql = "INSERT INTO `vnpay` (`vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `code_cart`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $last_id = pdo_execute_last_id($sql, $vnp_amount, $vnp_bankcode, $vnp_banktranno, $vnp_cardtype, $vnp_orderinfo, $vnp_paydate, $vnp_tmncode, $vnp_transactionno, $code_cart);
    return $last_id;
}

function insert_order_details($order_id, $product_id, $color_id, $quantity, $product_price, $total_money)
{
    $sql = "INSERT INTO `order_details`(`order_id`, `product_id`, `color_id`, `quantity`, `product_price`, `total_money`) VALUES ('$order_id','$product_id', '$color_id', '$quantity','$product_price', $total_money)";
    pdo_execute($sql);
}
