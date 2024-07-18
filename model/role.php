<?php 
function loadall_role(){
    $sql = "SELECT * FROM role ORDER BY role_id DESC";
    $listrole = pdo_query($sql);
    return $listrole;
}
?>