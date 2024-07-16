<?php 
    function load_all_comment() {
        $sql =  "SELECT * FROM comment INNER JOIN account on comment.account_id = account.id INNER JOIN product on comment.product_id = product.id ORDER BY id DESC";
        $list_comment = pdo_query($sql);
        return $list_comment;
    }

?>