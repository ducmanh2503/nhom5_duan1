<?php

    if (!isset($_GET['act']) || $_GET['act'] != 'dangky' && $_GET['act'] != 'dangnhap'){
        include "header.php";
    }
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/thuonghieu.php";
    include "../model/sanpham.php";
    include "../model/mausac.php";
    include "../model/thuvienanh.php";
    include "../model/binhluan.php";
    include "../model/taikhoan.php";
    include "../model/role.php";

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){

//Danh mục--------------------------------------------------------------------------------------------------------------------
            
            case "list_danhmuc":
                $list_category=load_all_category();
                include "danhmuc/list.php";
                break;

            case "add_danhmuc":
               if(isset($_POST['add_cate'])&& ($_POST['add_cate'])){
                $category_name = $_POST['category_name'];
                insert_category($category_name);
                $thongbao = "Thêm thành công";
               }
                include "danhmuc/add.php";
                break;

            case "edit_danhmuc":
                if(isset($_GET['category_id']) && ($_GET['category_id']>0)){
                    $category=load_one_category($_GET['category_id']);
                }
                include "danhmuc/update.php";
                break;

            case "update_danhmuc":
                if(isset($_POST['btn-update']) && ($_POST['btn-update'])){
                    $category_id = $_POST['category_id'];
                    $category_name = $_POST['category_name'];
                    $status = $_POST['status'];
                    update_category($category_id,$category_name,$status);
                    $thongbao="Cập nhật thành công";
                }
                $list_category=load_all_category();
                include "danhmuc/list.php";
                break;


//Sản phẩm--------------------------------------------------------------------------------------------------------------------            
            
            case "add_sanpham":
                if (isset($_POST['btn_addpro']) && ($_POST['btn_addpro'])) {

                    // Xử lý dữ liệu sản phẩm
                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $product_describe = $_POST['product_describe'];
                    $category_id = $_POST['category_id'];
                    $brand_id = $_POST['brand_id'];
                    $color_id = $_POST['color_id'];

                    // Xử lý ảnh đại diện sản phẩm
                    $product_image = $_FILES['product_image']['name'];
                    $target_dir = 'upload/';
                    $target_file = $target_dir . basename($_FILES['product_image']['name']);
                    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
                        // Upload thành công
                    } else {
                        echo "Có lỗi xảy ra khi tải ảnh đại diện";
                    }
                    // Lấy product_id vừa chèn
                    $product_id = insert_product($product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id);

                    // Xử lý tải lên nhiều ảnh cho thư viện ảnh
                    if (!empty(array_filter($_FILES['images']['name']))) {
                        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                            $gallery_image = basename($_FILES['images']['name'][$key]);
                            $target_gallery_file = $target_dir . $gallery_image;
                            if (move_uploaded_file($tmp_name, $target_gallery_file)) {
                                // Lưu thông tin ảnh vào bảng gallery
                                insert_gallery_images($product_id, $gallery_image);
                            } else {
                                echo "Có lỗi xảy ra khi tải ảnh $gallery_image";
                            }
                        }
                    }
                    $thongbao = '<span style="color: #28b779; text-align: center; font-size: 24px; font-weight: 700;">Thành công!</span>';
                }
                // Load lại danh sách và thông tin cần thiết cho trang thêm sản phẩm
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
                    $product_id = $_POST['product_id'];
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
                    update_product($product_id, $product_name, $product_price, $product_image, $product_describe, $category_id, $brand_id, $color_id); 
                }
                $list_product = load_all_product();
                include "sanpham/list.php";
                break;

            case "list_binhluan":
                    $list_comment = load_all_comment();
                    include "binhluan/list.php";
                    break;

            case "dangky":
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    
                    $user = $_POST['user'];
                    $password = $_POST['pass'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $role_id = $_POST['role_id'];
                    
                    insert_account($user, $password, $phone,$email,$address,$role_id);
                    $thongbao = "Thêm Thành Công";
               }
               $listrole =loadall_role();
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