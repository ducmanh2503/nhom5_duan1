<?php

function insert_product($product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id)
{
    $sql = "INSERT INTO `product`(`product_name`, `product_price`, `product_image`, `product_describe`, `category_id`, `brand_id`, `color_id`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $last_id = pdo_execute_last_id($sql, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id);
    return $last_id;
}

function get_product_by_name($product_name)
{
    $sql = "SELECT * FROM `product` WHERE `product_name` = '$product_name'";
    return pdo_query_one($sql);
}

function get_product_by_color($color_id)
{
    $sql = "SELECT * FROM `color` WHERE `color_id` = '$color_id'";
    return pdo_query_one($sql);
}


function load_all_product()
{
    $sql =  "SELECT * FROM product INNER JOIN inventory on product.product_id = inventory.product_id ORDER BY product.product_id DESC";
    $list_product = pdo_query($sql);
    return $list_product;
}

function load_all_product_client()
{
    $sql =  "SELECT * FROM product ORDER BY product_id DESC";
    $list_product = pdo_query($sql);
    return $list_product;
}

function load_one_product($product_id)
{
    $sql = "SELECT * FROM `product` INNER JOIN `color` on product.color_id= color.color_id INNER JOIN `inventory` on inventory.product_id = product.product_id INNER JOIN `brand` on product.brand_id = brand.brand_id WHERE product.product_id = $product_id";
    $product = pdo_query_one($sql);
    return $product;
}

function load_all_product_same_type($product_id)
{
    // Lấy category_id của sản phẩm hiện tại
    $sql_get_category = "SELECT category_id FROM product WHERE product_id = $product_id";
    $category = pdo_query_one($sql_get_category);
    $category_id = $category['category_id'];

    // Lấy các sản phẩm cùng danh mục và khác product_id hiện tại
    $sql =  "SELECT * FROM product WHERE category_id = $category_id AND product_id <> $product_id";
    $listProduct_sameType = pdo_query($sql);
    return $listProduct_sameType;
}

function update_product($product_id, $product_name, $product_price, $product_image, $product_describe, $status, $category_id, $brand_id, $color_id) {
        $sql = "UPDATE `product` SET `product_name`=?,`product_price`=?,`product_image`=?,`product_describe`=?,`status`=?,`category_id`=?,`brand_id`=?,`color_id`=? WHERE product_id = ?";
        pdo_execute($sql, $product_name, $product_price, $product_image, $product_describe, $status, $category_id, $brand_id, $color_id, $product_id);
    }

function show_pro()
{
    $sql = "SELECT * FROM product join category on product.category_id=category_id where category.status = 'Inactive'";
    $show = pdo_query($sql);
    return $show;
}

function search($seach)
{
    $sql = "SELECT * FROM product where product_name like '%$seach%'";
    $tim_kiem = pdo_query($sql);
    return $tim_kiem;
}
