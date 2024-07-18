<?php
    function insert_gallery_images($product_id, $gallery_image) {
        $sql = "INSERT INTO `gallery`(`product_id`, `images`) VALUES (?, ?)";
        pdo_execute($sql, $product_id, $gallery_image);
    }
?>