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
function load_one_comment($product_id) {
    $sql = "SELECT * FROM comment INNER JOIN account on comment.account_id = account.account_id INNER JOIN product on comment.product_id = product.product_id ORDER BY comment_id DESC";
    $cm = pdo_query_one($sql);
    return $cm;
}
function delete_comment($comment_id)
{
    $sql = "DELETE FROM comment WHERE comment_id=".$comment_id;
    pdo_execute($sql);
}
?>