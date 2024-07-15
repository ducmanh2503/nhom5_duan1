
<?php

    if (!isset($_GET['act']) || $_GET['act'] != 'dangky' && $_GET['act'] != 'dangnhap'){
        include "header.php";
    }
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/thuonghieu.php";
    include "../model/sanpham.php";
    include "../model/mausac.php";

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
                if (isset($_POST['btn_addpro']) && ($_POST['btn_addpro'])) {

                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $product_describe = $_POST['product_describe'];
                    $category_id = $_POST['category_id'];
                    $brand_id = $_POST['brand_id'];
                    $color_id = $_POST['color_id'];

                    $product_image = $_FILES['product_image']['name'];
                    $target_dir = 'upload/';
                    $target_file = $target_dir . basename($_FILES['product_image']['name']);
                    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
                        // code here
                    } else {
                        echo "Có lỗi xảy ra";
                    }
                    insert_product($product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id);
                }
                $list_category = load_all_category();
                $list_brand = load_all_brand();
                $list_color = load_all_color();
                
                include "sanpham/add.php";
                break;

            case "list_sanpham":
                $list_product = load_all_product();
                include "sanpham/list.php";
                break;

            case "edit_sanpham":
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $product = load_one_product($_GET['id']);
                }
                $list_category = load_all_category();
                $list_brand = load_all_brand();
                $list_color = load_all_color();
                include "sanpham/update.php";
                break;

            case "update_sanpham":
                if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                    $id = $_POST['id'];
                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $product_describe = $_POST['product_describe'];
                    $color_id = $_POST['color_id'];
                    $category_id = $_POST['category_id'];
                    $brand_id = $_POST['brand_id'];

                    $product_image = "";
                    if ($_FILES['product_image']['name']) {
                        $product_image = $_FILES['product_image']['name'];
                        $target_dir = "upload/";
                        $target_file = $target_dir . basename($_FILES['product_image']['name']);
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                    } else {
                        // $product_image = $product['product_image'];
                        // var_dump($product_image);
                    }
                    update_product($id, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id); 
                }
                $list_product = load_all_product();
                $list_product = load_all_product();
                include "sanpham/list.php";
                break;

            case "dangky":
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