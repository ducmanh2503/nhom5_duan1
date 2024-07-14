<?php

    
    function insert_category($tenloai){
        $sql = "insert into category(category_name) values('$tenloai')";
        pdo_execute($sql);
    }

    // function delete_category($id){
    //     $sql="DELETE FROM category where id=".$id;
    //     pdo_execute($sql);
    // }

    function load_all_category(){
        $sql="SELECT * FROM category order by id desc";
        $list_category=pdo_query($sql);
        return $list_category;
    }

    function load_one_category($id){
        $sql="SELECT * FROM category where id=".$id;
        $dm=pdo_query_one($sql);
        return $dm;
    }

    function update_category($id,$tenloai){
        $sql="update category set category_name='$tenloai' where id=$id";
        pdo_execute($sql);
    }
?>
