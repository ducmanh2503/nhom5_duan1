<?php
    function load_all_product_inventory() {
        $sql =  "SELECT * FROM inventory INNER JOIN product ON inventory.product_id = product.product_id ORDER BY inventory_id DESC";
        $list_product_inventory = pdo_query($sql);
        return $list_product_inventory;
    }
?>