<?php

    function insert_product($product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id) {
            $sql = "INSERT INTO `product`(`product_name`, `product_price`, `product_image`, `product_describe`, `category_id`, `brand_id`, `color_id`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            pdo_execute($sql, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id);
    }

    function load_all_product() {
        $sql =  "SELECT * FROM product INNER JOIN color on product.color_id = color.color_id INNER JOIN brand on product.brand_id = brand.brand_id ORDER BY id DESC";
        $list_product = pdo_query($sql);
        return $list_product;
    }

    function load_one_product($id) {
        $sql = "SELECT * FROM product WHERE id = $id";
        $product = pdo_query_one($sql);
        return $product;
    }

    function update_product($id, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id) {
        $sql = "UPDATE `product` SET `product_name`=?,`product_price`=?,`product_image`=?,`product_describe`=?,`category_id`=?,`brand_id`=?,`color_id`=? WHERE id = ?";
        pdo_execute($sql, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id, $id);
    }
?>

