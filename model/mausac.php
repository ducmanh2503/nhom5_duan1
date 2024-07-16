<?php
    function load_all_color() {
        $sql = "SELECT * FROM color";
        $list_color = pdo_query($sql);
        return $list_color;
    }
?>