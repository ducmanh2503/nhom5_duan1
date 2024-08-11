<?php
// Kiểm tra các act để không bao gồm header
session_start();
if (!isset($_GET['act']) || !in_array($_GET['act'], ['dangky', 'dangnhap', 'cart', 'add_cart', 'update_cart', 'delete_cart', 'thanhtoan'])) {
    include "client/header.php";
}
include_once "model/pdo.php";
include_once "model/sanpham.php";
include_once "model/danhmuc.php";
include_once "model/thuvienanh.php";
include_once "model/mausac.php";
include_once "model/cart.php";
include_once "model/thanhtoan.php";
include_once "global.php";
include_once "model/tonkho.php";
include_once "model/taikhoan.php";
include_once "model/role.php";
include_once "model/voucher.php";
include_once "model/total.php";

$list_products = load_all_product_client();
$list_categories = load_all_category();


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            $list_categories = load_all_category();
            include 'client/shop.php';
            break;

        case 'saving':
            include 'client/saving.php';
            break;

        case 'why':
            include 'client/danhmuc.php';
            break;

        case 'gift':
            include 'client/gift.php';
            break;

        case 'contact':
            include 'client/contact.php';
            break;

        case 'cart':
            include 'client/cart.php';
            break;

        case 'danhmuc':
            $list_category = load_all_category();
            include "client/danhmuc.php";
            break;

//Danh mục---------------------------------------------------------------------------------------------

        case 'tracuu':
            $order_like = [];
            if (isset($_SESSION['account'])) {
                $customer_name = $_SESSION['account']['user'];
                $order_like_name = load_order_like_name($customer_name);
            }
            if (isset($_POST['tracuu']) && ($_POST['tracuu'])) {
                $order_id = $_POST['tracuu'];
                if ($order_id != '') {
                    $order_like = load_order_like($order_id);
                    // Đưa đơn hàng tìm thấy lên đầu danh sách
                    if (isset($_SESSION['account'])) {
                        $order_like_name = array_merge($order_like, $order_like_name);
                    } else {
                        $order_like_name = $order_like;
                    }
                }
            }
            // var_dump($order_like);
            // die();
            include 'client/tracuu.php';
            break;

        case "chitietdonhang":
            if (isset($_GET['order_id'])) {
                $order_id = $_GET['order_id'];
                $order = load_one_order($order_id);
                $acc_id = $order['user_id'];
                // $acc = load_one_acc($acc_id);
                $list_order_details = order_details($_GET['order_id']);
            }
            include "client/chitietdonhang.php";
            break;

            case "update_status_client":
            if (isset($_POST['btn_cancel']) && ($_POST['btn_cancel'])) {
                $order_id = $_POST['order_id'];
                $order_status = $_POST['order_status'];
                // var_dump($order_status);
                // die();

                update_order($order_id, $order_status);
            }
            $order = load_one_order($order_id);
            $list_order_details = order_details($order_id);
            include "client/chitietdonhang.php";
            break;

        case "chitietsanpham":
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                $product = load_one_product($product_id);
                $gallery_img = load_one_gallery_product($product_id);
                $listProduct_sameType = load_all_product_same_type($product_id);
                $list_colors = load_all_color();
                include "client/chitietsanpham.php";
            } else {
                include "client/home.php";
            }
            break;

        case 'sanpham':
            $list_products = load_all_product_client();
            include 'client/shop.php';
            break;

        case 'cart':
            include 'client/cart.php';
            break;

        case "add_cart":
            if (isset($_POST['btn_add'])) {
                $color_id = $_POST['color_id'];
                $quantity = $_POST['quantity'];
                $price_sale = $_POST['price_sale'];
                $product_id = $_POST['product_id'];
                $product = add_cart($product_id);
                    $item = [
                        'product_id' => $product['product_id'],
                        'product_name' => $product['product_name'],
                        'product_image' => $product['product_image'],
                        'product_price' => $product['product_price'],
                        'price_sale' => $price_sale,
                        'color_id' => $color_id,
                        'quantity' => $quantity
                    ];

                    if (isset($_SESSION['cart'][$product_id])) {
                        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
                    } else {
                        $_SESSION['cart'][$product_id] = $item;
                    }  
                    // var_dump($item);
                }
            include "client/cart.php";
            break;

        case 'update_cart':
            if (isset($_POST['update_quantity']) && ($_POST['update_quantity'])) {
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['quantity'] = $quantity;
                }
            }
            include "client/cart.php";
            break;

        case 'delete_cart':
            if (isset($_POST['btn_delete']) && ($_POST['btn_delete'])) {
                $product_id = $_POST['product_id'];
                if (isset($_SESSION['cart'][$product_id])) {
                    unset($_SESSION['cart'][$product_id]);
                }
            }
            include "client/cart.php";
            break;
            
                
            case 'thanhtoan':
                $list_vouchers = show_vouchers();
                if (isset($_POST['btn-thanhtoan']) && $_POST['btn-thanhtoan']) {
                    $customer_name = $_POST['customer_name'];
                    $customer_address = $_POST['customer_address'];
                    $customer_phone = $_POST['customer_phone'];
                    $customer_email = $_POST['customer_email'];
                    $code_cart = rand(1, 1000);
                    $_SESSION['code_cart'] = $code_cart;           
                    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                    $price_ship = 0;           
                     // Thanh toán bằng tiền mặt
                        // Lấy dữ liệu giỏ hàng từ session, nếu không có thì khởi tạo mảng rỗng
                        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                        // Lấy giá trị sale từ session
                        $sale = isset($_SESSION['sale']) ? $_SESSION['sale'] : 0;
                        // Chèn đơn hàng vào cơ sở dữ liệu và lấy mã đơn hàng vừa tạo
                        $order_id = insert_order($customer_name, $customer_address, $customer_phone, $customer_email, $code_cart);
                        if ($order_id) {
                            $price_total = 0;
                            foreach ($cart as $item) {
                                $product_id = $item['product_id'];
                                $color_id = $item['color_id'];
                                $product_price = $item['product_price'];
                                $item['price_sale'] = $sale;
                                $quantity = $item['quantity'];
                                $price_total += $product_price * $quantity;
                                $price_ship = 30000;
                                $total_money = $price_total + $sale + $price_ship;
                                // var_dump($cart);

                                // Chèn chi tiết đơn hàng vào cơ sở dữ liệu          
                                insert_order_details($order_id, $product_id, $color_id, $quantity, $product_price, $total_money);
                                update_quantity_buy($quantity, $product_id);
                            }
                            unset($_SESSION['cart']);
                            $order_details_now = order_details($order_id);
                            echo '<div class="alert-success" style="text-align: center; max-width: 300px; margin: 0 auto; padding: 10px; border: 1px solid #d4edda; background-color: #d4edda; color: #155724; border-radius: 5px;">
                                    <span>Đặt hàng thành công! Vui lòng theo dõi tiến trình đơn hàng.</span><br />
                                    <span>Mã đơn hàng của bạn là: ' . $order_id . '</span>
                                </div>';
                            echo '
                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="index.php" class="text-body d-flex justify-content-center">Tiếp tục mua sắm</a></h6>
                                </div>';
                        }
                }
                include "client/thanhtoan.php";
                break;        

        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $user = $_POST['user'];
                $password = $_POST['pass'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $check_username = check_username($user);
                if (!$user == $check_username) {
                    insert_account($user, $password, $phone, $email, $address);
                    $thongbao = ' <span style="color:red; margin-right: 10px;">Đăng ký thành công</span>
                                            <a style="color:white; margin-left: 10px;" href="index.php?act=dangnhap">Nhấn để đăng nhập</a>';
                } else {
                    $thongbao = '<span style="color:red; margin-right: 10px;">Tên tài khoản đã tồn tại!</span>';
                }
            }
            include "client/user/dangky.php";
            break;

        case "edit_taikhoan":
            if (isset($_GET['account_id']) && ($_GET['account_id']) > 0) {
                $account = load_one_account($_GET['account_id']);
            }
            $listrole = loadall_role();
            include "client/user/edit_taikhoan.php";
            break;

        case "update_taikhoan":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $phone_number = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $account_id = $_POST['account_id'];
                // $role_id = $_POST['role_id'];

                $target_dir = 'images/';
                $avatar = "";
                if ($_FILES['avatar']['name']) {
                    $avatar = $_FILES['avatar']['name'];
                    $target_file = $target_dir . basename($_FILES['avatar']['name']);
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                } else {

                }
                $avatar = $target_dir . $avatar;
                update_account_client($account_id, $avatar, $user, $pass, $phone_number, $email, $address);
                $_SESSION['account'] = checkuser($user, $pass);
                $thongbao = '<span style="color: #28b779; text-align: center; font-size: 24px; font-weight: 700;">Cập nhật thành công!</span>';
            }
            include "client/user/edit_taikhoan.php";
            break;

            case "dangnhap":
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $checkuser = checkuser($user, $pass);

            
                    if (is_array($checkuser)) {
                        $_SESSION['account'] = $checkuser;
                        if ($_SESSION['account']['role_id'] == 1) {
                            header("Location: ./admin/index.php");
                        } else if($_SESSION['account']['status'] != 'Active') {
                            $thongbao = "Tài khoản của bạn bị vô hiệu hóa.";
                        } else {
                            header("Location: index.php");
                        }
                    } else {
                        $thongbao = "Tài khoản hoặc mật khẩu không chính xác. Vui lòng thử lại.";
                    }
                }
                include "client/user/dangnhap.php";
                break;
  
        case 'laylaimk':
            if (isset($_POST['gui']) && ($_POST['gui'])) {

                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật Khẩu Của Bạn Là:  " . $checkemail['password'];
                } else {
                    $thongbao = "Email Này Không Tồn Tại";
                }
            }
            include "client/user/quenmk.php";
            break;

        case 'tim_kiem':
            if (isset($_POST['tim_kiem'])) {
                $tim_kiem = search($_POST['tim_kiem']);
                // var_dump($tim_kiem);
            }
            include "client/timkiem.php";
            break;

        case 'category_as_product':
            if (isset($_GET['category_id'])) {
                $show = category_as_product($_GET['category_id']);
            }
            include "./client/category_as_product.php";
            break;

        case 'thoat':
            include "client/user/logout.php";
            break;

        default:
            include "client/home.php";
            break;
    }
} else {
    include "client/home.php";
}

// Kiểm tra các act để không bao gồm footer
if (!isset($_GET['act']) || !in_array($_GET['act'], ['dangky', 'dangnhap', 'cart', 'add_cart', 'update_cart', 'delete_cart', 'thanhtoan'])) {
    include "client/footer.php";
}
