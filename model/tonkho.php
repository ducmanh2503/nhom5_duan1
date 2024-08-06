<?php

function insert_quantity_product($product_id, $quantity)
{
    $sql = "INSERT INTO `inventory`(`product_id`, `quantity`) VALUES (?, ?)";
    pdo_execute($sql, $product_id, $quantity);
}

function load_all_inventory()
{
    $sql =  "SELECT * FROM inventory INNER JOIN product ON inventory.product_id = product.product_id ORDER BY inventory_id DESC";
    $list_product_inventory = pdo_query($sql);
    return $list_product_inventory;
}

function update_quantity_inventory($quantity, $product_id)
{
    $sql = "UPDATE `inventory` SET `quantity`='$quantity' WHERE product_id = $product_id";
    pdo_execute($sql);
}

function update_quantity_buy($quantity, $product_id)
{
    $sql = "UPDATE `inventory` SET `quantity`= `quantity` - '$quantity' WHERE product_id = $product_id";
    pdo_execute($sql);
}

function load_one_quantity_product($product_id)
{
    $sql = "SELECT * FROM inventory WHERE product_id = $product_id";
    $quantity_product = pdo_query_one($sql);
    return $quantity_product;
}
