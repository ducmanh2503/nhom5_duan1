<?php

    function insert_product($product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id) {
    $sql = "INSERT INTO `product`(`product_name`, `product_price`, `product_image`, `product_describe`, `category_id`, `brand_id`, `color_id`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $last_id = pdo_execute_last_id($sql, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id);
    return $last_id;
    }


    function load_all_product() {
        $sql =  "SELECT * FROM product INNER JOIN color on product.color_id = color.color_id INNER JOIN brand on product.brand_id = brand.brand_id INNER JOIN category on product.category_id = category.category_id ORDER BY product_id DESC";
        $list_product = pdo_query($sql);
        return $list_product;
    }
    
    function load_all_product_client() {
        $sql =  "SELECT * FROM product INNER JOIN brand on product.brand_id = brand.brand_id ORDER BY product_id DESC LIMIT 3";
        $list_product = pdo_query($sql);
        return $list_product;
    }

    function load_one_product($product_id) {
        $sql = "SELECT * FROM product INNER JOIN color on product.color_id = color.color_id INNER JOIN brand on product.brand_id = brand.brand_id WHERE product_id = $product_id";
        $product = pdo_query_one($sql);
        return $product;
    }

    function load_all_product_same_type($product_id) {
        $sql =  "SELECT * FROM product WHERE category_id AND product_id <> $product_id";
        $list_product = pdo_query($sql);
        return $list_product;
    }

    function update_product($product_id, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id) {
        $sql = "UPDATE `product` SET `product_name`=?,`product_price`=?,`product_image`=?,`product_describe`=?,`category_id`=?,`brand_id`=?,`color_id`=? WHERE product_id = ?";
        pdo_execute($sql, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id, $product_id);
    }
?>

