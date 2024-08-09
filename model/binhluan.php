<?php 
    function load_all_comment($product_id) {
        $sql = "SELECT * FROM comment INNER JOIN account ON comment.account_id = account.account_id WHERE comment.product_id = ? ORDER BY comment.comment_id DESC";
        $list_comment = pdo_query($sql, $product_id);
        return $list_comment;
    }

    function load_all_comment_admin() {
        $sql =  "SELECT * FROM comment INNER JOIN account on comment.account_id = account.account_id INNER JOIN product on comment.product_id = product.product_id ORDER BY comment_id DESC";
        $list_comment = pdo_query($sql);
        return $list_comment;
    } 

    
    
    function insert_comment($content,$time,$account_id, $product_id) {
        $sql = "INSERT INTO `comment`(`content`, `time`,`account_id`,  `product_id`) VALUES (?, ?, ?, ?)";
        pdo_execute($sql, $content,$time,$account_id, $product_id);
}
function load_one_comment($product_id) {
    $sql = "SELECT * FROM comment INNER JOIN account on comment.account_id = account.account_id INNER JOIN product on comment.product_id = product.product_id ORDER BY comment_id DESC";
    $cm = pdo_query_one($sql);
    return $cm;
}
function delete_comment($comment_id)
{
    $sql = "DELETE FROM comment WHERE `comment`.`comment_id` = $comment_id";
    pdo_execute($sql);
}
?>