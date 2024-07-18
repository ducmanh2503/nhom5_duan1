<?php 
    function load_all_comment() {
        $sql =  "SELECT * FROM comment INNER JOIN account on comment.account_id = account.account_id INNER JOIN product on comment.product_id = product.product_id ORDER BY comment_id DESC";
        $list_comment = pdo_query($sql);
        return $list_comment;
    }
    function insert_comment($account_id, $content, $product_id, $time) {
        $sql = "INSERT INTO `comment`(`account_id`, `content`, `product_id`, `time`) VALUES (?, ?, ?, ?)";
        pdo_execute($sql, $account_id, $content, $product_id, $time);
}
?>