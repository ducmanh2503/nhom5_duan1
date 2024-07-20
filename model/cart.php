<?php
     function add_cart($product_id) {
        $sql =  "SELECT * FROM product where product_id = $product_id";
        if($sql){
            $product = pdo_query_one($sql);
        }
        return $product;
    }
?>