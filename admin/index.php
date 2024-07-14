<?php
    include "header.php";

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case "list_danhmuc":
                include "danhmuc/list.php";
                break;

            case "add_danhmuc":
                include "danhmuc/add.php";
                break;

            case "update_danhmuc":
                include "danhmuc/update.php";
                break;
                
            case "add_sanpham":
                include "sanpham/add.php";
                break;

            case "list_sanpham":
                include "sanpham/list.php";
                break;

            default:
                include "home.php";
                break;
        }
    }
    else{
        include "home.php";
    }
    
    include "footer.php";
?>