<?php
session_start();
unset($_SESSION["account"]);  //xoa session user
session_destroy();
header("Location: http://localhost/nhom5_duan1/");
exit();
?>