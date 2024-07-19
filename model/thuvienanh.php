<?php
    function insert_gallery_images($product_id, $gallery_image) {
        $sql = "INSERT INTO `gallery`(`product_id`, `images`) VALUES (?, ?)";
        pdo_execute($sql, $product_id, $gallery_image);
    }

    function load_one_gallery_product($product_id) {
        $sql = "SELECT * FROM gallery WHERE product_id = $product_id";
        $gallery_img = pdo_query($sql);
        return $gallery_img;
    }
?>