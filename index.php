<?php

    if (!isset($_GET['act']) || $_GET['act'] != 'dangky' && $_GET['act'] != 'dangnhap'){
        include "client/header.php";
    }
    include "model/pdo.php";
    

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){      
            default:
                include "client/home.php";
                break;
        }
    }
    else{
        include "client/home.php";
    }
    
     include "client/footer.php";
?>