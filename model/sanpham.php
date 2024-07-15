<?php
    function load_all_product() {
        $sql = "SELECT * FROM product WHERE id DESC";
        $list_product = pdo_query($sql);
        return $list_product;
    }

    function add_product() {
        $sql = "INSERT INTO product (product_name, product_price, product_image, product_describe, product_status, inventory_id, category_id, color_id ) VALUES ('$product_name', '$product_price', '$product_image', '$product_describe', '$product_status', '$inventory_id', '$category_id', '$color_id')";
        pdo_excute($sql);
    }
?>

<!-- function loadall_sanpham($kyw, $ma_danhmuc) {
        $sql = "SELECT * FROM sanpham WHERE 1";
        if ($kyw != "") {
            $sql.=" and ten_sanpham like '%".$kyw."%'";
        }
        if ($ma_danhmuc > 0) {
            $sql.=" and ma_danhmuc like '%".$ma_danhmuc."%'";
        }
        $sql.=" ORDER BY ma_sanpham DESC";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    } -->