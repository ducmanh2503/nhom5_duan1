<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(!isset($_SESSION['account'])) {
// Chuyển hướng tới trang đăng nhập nếu chưa đăng nhập
header('Location: ../index.php?act=dangnhap');
exit();
}

$account = $_SESSION['account'];

    include "header.php";
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/thuonghieu.php";
    include "../model/sanpham.php";
    include "../model/mausac.php";
    include "../model/thuvienanh.php";
    include "../model/binhluan.php";
    include "../model/taikhoan.php";
    include "../model/role.php";
    include "../model/cart.php";
    include "../model/total.php";
    include "../model/tonkho.php";


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
                $existing_category = get_category_by_name($category_name);
                if($existing_category) {
                    $thongbao = '<span style="color: #ff0000; text-align: center; font-size: 24px; font-weight: 700;">Danh mục đã tồn tại!</span>';
                } else {
                    insert_category($category_name);
                    $thongbao = "Thêm thành công";
                }
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
                    $quantity = $_POST['quantity'];

                    $existing_product = get_product_by_name($product_name);
                    if ($existing_product) {
                        $thongbao = '<span style="color: #ff0000; text-align: center; font-size: 24px; font-weight: 700;">Sản phẩm đã tồn tại!</span>';
                    } else {
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
                    insert_quantity_product($product_id, $quantity);
                    $thongbao = '<span style="color: #28b779; text-align: center; font-size: 24px; font-weight: 700;">Thành công!</span>';
                }
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
                    $status = $_POST['status'];
                    $color_id = $_POST['color_id'];
                    $category_id = $_POST['category_id'];
                    $brand_id = $_POST['brand_id'];

                    $target_dir = 'upload/';

                    $product_image = "";
                    if ($_FILES['product_image']['name']) {
                        $product_image = $_FILES['product_image']['name'];
                        $target_file = $target_dir . basename($_FILES['product_image']['name']);
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                    } else {
                        $product = load_one_product($product_id);
                        $product_image = $product['product_image'];
                    }
                    update_product($product_id, $product_name, $product_price, $product_image, $product_describe, $status, $category_id, $brand_id, $color_id); 

                    if (!empty(array_filter($_FILES['images']['name']))) {
                        $new_images = [];
                        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                            $gallery_image = basename($_FILES['images']['name'][$key]);
                            $target_gallery_file = $target_dir . $gallery_image;
                            if (move_uploaded_file($tmp_name, $target_gallery_file)) {
                                $new_images[] = $gallery_image;
                            } else {
                                echo "Có lỗi xảy ra khi tải ảnh $gallery_image";
                            }
                        }
                        update_gallery_images($product_id, $new_images);
                    }

                    $thongbao = '<span style="color: #28b779; text-align: center; font-size: 24px; font-weight: 700;">Cập nhật thành công!</span>';
                }
                $list_product = load_all_product();
                include "sanpham/list.php";
                break;

          //Bình Luận--------------------------------------------------------------------------------------------------------------------  
          case "list_binhluan":
            $list_comment = load_all_comment();
            include "binhluan/list.php";
            break;
            
            case 'xoa_binhluan':
                if (isset($_GET['comment_id'])) {
                    $comment_id = intval($_GET['comment_id']);
                
                    delete_comment($comment_id);
                   
                }
                $list_comment = load_all_comment();
            include "binhluan/list.php";
            break;


//Tài Khoản--------------------------------------------------------------------------------------------------------------------  

        case "profile":
            if (isset($_POST['btnUpdateacc']) && ($_POST['btnUpdateacc'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $phone_number = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $account_id = $_POST['account_id']; 
                        
                update_account_admin($phone_number, $email, $address, $account_id);  
                $_SESSION['account']=checkuser($user,$pass);
            }
            include "account/profile.php";
            break;

        case "list_taikhoan":
            $list_taikhoan = load_all_account();
            include "user/list.php";
            break;

            /*---------------------------------------------Cart--------------------------------------------------*/

            case "list_cart":
                $order = load_all_order();
                include "order/order.php";
                break;

            case "order_detail":
                if(isset($_GET['order_id'])){
                    $order_id = $_GET['order_id'];
                    $order = load_one_order($order_id) ;    
                    $acc_id = $order['user_id'];
                    // $acc = load_one_acc($acc_id);
                    $list_order_details=order_details($_GET['order_id']);
            }
                
                include "order/order-detail.php";
                break;
            
            case "update_order":
                if(isset($_POST['btn-update'])){
                    $order_id = $_POST['order_id'];
                    $order_status = $_POST['order_status'];
                    update_order($order_id,$order_status);
                }
                $order = load_all_order();
                include "order/order.php";  
                break;
/*---------------------------------------------Inventory--------------------------------------------------*/
            case "tonkho":
                $list_product_inventory = load_all_product();
            include "tonkho/list.php";
            break;

            case "edit_soluongsanpham":
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $quantity_product = load_one_quantity_product($_GET['id']);
                } 
            include "tonkho/update.php";
            break;

            case "update_soluongsanpham":
                if (isset($_POST['btn_addquantity']) && ($_POST['btn_addquantity'])) {
                    $product_id = $_POST['product_id'];
                    $quantity = $_POST['quantity'];
                    update_quantity_inventory($quantity, $product_id);
                }
                $list_product_inventory = load_all_product();
            include "tonkho/list.php";
            break;

            case "thongke":
                $status = '';
                $list_accounts = load_all_account();
                $list_products = load_all_product();
                $list_orders = load_all_order();
                $list_categories = load_all_category();
                $list_brands = load_all_brand();
                $list_status_orders_chuaXuLy = count_status_orders_chuaXuLy();
                $list_status_orders_daXuLy = count_status_orders_daXuLy();
                $list_status_orders_dangGiaoHang = count_status_orders_dangGiaoHang();
                $list_status_orders_giaoThanhCong = count_status_orders_giaoThanhCong();
                $list_status_orders_daHuy = count_status_orders_daHuy();
            include "thongke/thongke.php";
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