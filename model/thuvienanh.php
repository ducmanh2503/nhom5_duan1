<?php
    function insert_gallery_images($product_id, $gallery_image) {
        $sql = "INSERT INTO `gallery`(`product_id`, `images`) VALUES (?, ?)";
        pdo_execute($sql, $product_id, $gallery_image);
    }

    function update_gallery_images($product_id, $new_images) {
    $sql = "DELETE FROM `gallery` WHERE `product_id` = ?";
    pdo_execute($sql, $product_id);

    foreach ($new_images as $image) {
        insert_gallery_images($product_id, $image);
    }
}


    function load_one_gallery_product($product_id) {
        $sql = "SELECT * FROM gallery WHERE product_id = $product_id";
        $gallery_img = pdo_query($sql);
        return $gallery_img;
    }
?>