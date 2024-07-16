<?php


    if (!isset($_GET['act']) || $_GET['act'] != 'dangky' && $_GET['act'] != 'dangnhap'){
        include "header.php";
    }
    include "../model/pdo.php";
    include "../model/danhmuc.php";

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case "list_danhmuc":
                $list_category=load_all_category();
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

            case "update_sanpham":
                include "sanpham/update.php";
                break;

            
            case "list_binhluan":
                include "binhluan/list.php";
                break;
                
            case "dangky":
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $confirmpass = $_POST['confirmpass'];
                   
                    insert_account( $user,$email,$pass,$confirmpass);
                    $thongbao = "Đã Đăng Ký Thành Công Vui Lòng Đăng Nhập";
                }
                include "user/dangky.php";
                break;

            case "dangnhap":
                include "user/dangnhap.php";
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