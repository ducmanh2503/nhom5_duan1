<?php

    
    function insert_category($category_name){
        $sql = "insert into category(category_name) values('$category_name')";
        pdo_execute($sql);
    }

    function get_category_by_name($category_name) {
    $sql = "SELECT * FROM category WHERE category_name = '$category_name'";
    return pdo_query_one($sql);
    }

   
    // function delete_category($id){
    //     $sql="DELETE FROM category where id=".$id;
    //     pdo_execute($sql);
    // }

    function load_all_category(){
        $sql="SELECT * FROM category order by category_id";
        $list_category=pdo_query($sql);
        return $list_category;
    }

    function load_one_category($category_id){
        $sql="SELECT * FROM category where category_id= $category_id";
        $category=pdo_query_one($sql);
        return $category;
    }

    function update_category($category_id,$category_name,$status){
        $sql="update category set category_name='$category_name', status='$status' where category_id='$category_id'";
        pdo_execute($sql);
    }

    function category_as_product($category_id){
        $sql = "SELECT * FROM product JOIN category ON product.category_id = category.category_id WHERE product.category_id = $category_id";
        $show = pdo_query($sql);
        return $show;
    }
?>
