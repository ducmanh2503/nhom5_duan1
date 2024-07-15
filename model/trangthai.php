<?php
    function load_all_status(){
        $sql="SELECT * FROM status";
        $list_status=pdo_query($sql);
        return $list_status;
    }
?>
