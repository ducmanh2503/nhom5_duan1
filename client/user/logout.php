<?php
session_start();
unset($_SESSION["account"]);  //xoa session user
session_destroy();
header("Location: ../../index.php?act=dangnhap");
exit(); 
?>