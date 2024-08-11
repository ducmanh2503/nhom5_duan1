<?php
function add_cart($product_id)
{
    $sql = "SELECT * FROM product where product_id = $product_id";
    if ($sql) {
        $product = pdo_query_one($sql);
    }
    return $product;
}

/* cart admin*/

function load_all_order()
{
    $sql = "SELECT * FROM `order` LEFT JOIN account ON `order`.user_id = account.account_id ORDER BY `order_id`";
    $list_order = pdo_query($sql);
    return $list_order;
}

function load_order_like($order_id)
{
    $sql = "SELECT * FROM `order` LEFT JOIN account ON `order`.user_id = account.account_id WHERE `order_id` LIKE '%$order_id%' ORDER BY `order_id`";
    $order_like = pdo_query($sql);
    return $order_like;
}

function load_order_like_name($customer_name)
{
    $sql = "SELECT * FROM `order` LEFT JOIN account ON `order`.user_id = account.account_id WHERE `customer_name` LIKE '%$customer_name%' ORDER BY `order_id`";
    $order_like = pdo_query($sql);
    return $order_like;
}


function load_one_order($order_id)
{
    $sql = "SELECT * FROM `order` where order_id =$order_id";
    $order = pdo_query_one($sql);
    return $order;
}

function load_one_acc($account_id)
{
    $sql = "SELECT * FROM account where account_id = $account_id";
    $acc_id = pdo_query_one($sql);
    return $acc_id;
}

function order_details($order_id)
{
    $sql = "SELECT * FROM order_details inner JOIN product ON order_details.product_id = product.product_id inner JOIN color ON order_details.color_id = color.color_id WHERE order_id = $order_id";
    $list_order_details = pdo_query($sql);
    return $list_order_details;
}

function update_order($order_id, $order_status)
{
    $sql = "UPDATE `order` set order_status = '$order_status' where order_id = $order_id";
    pdo_execute($sql);
}

function count_status_orders_chuaXuLy()
{
    $sql = "SELECT COUNT(*) FROM `order` WHERE `order_status` = 0";
    $list_status_orders_chuaXuLy = pdo_query($sql);
    return $list_status_orders_chuaXuLy;
}

function count_status_orders_daXuLy()
{
    $sql = "SELECT COUNT(*) FROM `order` WHERE `order_status` = 1";
    $list_status_orders_daXuLy = pdo_query($sql);
    return $list_status_orders_daXuLy;
}

function count_status_orders_dangGiaoHang()
{
    $sql = "SELECT COUNT(*) FROM `order` WHERE `order_status` = 2";
    $list_status_orders_dangGiaoHang = pdo_query($sql);
    return $list_status_orders_dangGiaoHang;
}

function count_status_orders_giaoThatBai()
{
    $sql = "SELECT COUNT(*) FROM `order` WHERE `order_status` = 3";
    $list_status_orders_giaoThatBai = pdo_query($sql);
    return $list_status_orders_giaoThatBai;
}

function count_status_orders_giaoThanhCong()
{
    $sql = "SELECT COUNT(*) FROM `order` WHERE `order_status` = 4";
    $list_status_orders_giaoThanhCong = pdo_query($sql);
    return $list_status_orders_giaoThanhCong;
}

function count_status_orders_daHuy()
{
    $sql = "SELECT COUNT(*) FROM `order` WHERE `order_status` = 5";
    $list_status_orders_daHuy = pdo_query($sql);
    return $list_status_orders_daHuy;
}