<?php

    if (!isset($_GET['act']) || $_GET['act'] != 'dangky' && $_GET['act'] != 'dangnhap'){
        include "client/header.php";
    }
    include_once "model/pdo.php";
    include_once "model/sanpham.php";
    include_once "model/danhmuc.php";
    include_once "model/thuvienanh.php";
    include_once "model/cart.php";
    include_once "global.php";

    $list_products = load_all_product_client();
    $list_categories = load_all_category();
    

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case "chitietsanpham":
                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    $product_id = $_GET['product_id'];
                    $product = load_one_product($product_id);
                    $gallery_img = load_one_gallery_product($product_id);
                    $listProduct_sameType = load_all_product_same_type($product_id);
                    include "client/chitietsanpham.php";
                } else {
                    include "client/home.php";
                }
                break;
            
            case "add_cart";
            if(isset($_GET['product_id'])){
                $product_id = $_GET['product_id'];
                $product= add_cart($product_id);
                $item = [
                    'product_id'=>$product['product_id'],
                    'product_name'=>$product['product_name'],
                    'product_image'=>$product['product_image'],
                    'product_price'=>$product['product_price'],
                    'quantity'=>1
                    
                ];
                if(isset($_SESSION['cart'][$product_id])){
                    $_SESSION['cart'][$product_id]['quantity'] +=1 ;
                }
                else{
                    $_SESSION['cart'][$product_id] = $item;
                }
            }
            header("Location: index.php?act=cart");
            
            include "client/cart.php";
            break;
            case "cart";
            include "client/cart.php";
            break;

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