<?php
    function load_all_brand(){
        $sql="SELECT * FROM brand";
        $list_brand = pdo_query($sql);
        return $list_brand;
    }
?>