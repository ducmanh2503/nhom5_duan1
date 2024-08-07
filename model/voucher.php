<?php
    function show_vouchers() {
        $sql = "SELECT * FROM `voucher` WHERE 1";
        $list_vouchers = pdo_query($sql);
        return $list_vouchers;
    }
?>