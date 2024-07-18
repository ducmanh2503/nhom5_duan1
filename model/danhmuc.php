<?php

    
    function insert_category($category_name){
        $sql = "insert into category(category_name) values('$category_name')";
        pdo_execute($sql);
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
?>
