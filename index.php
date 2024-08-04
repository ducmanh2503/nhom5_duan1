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
    include_once "model/cart.php";
    include_once "model/thanhtoan.php";
    include_once "global.php";
    include_once "model/tonkho.php";
    include_once "model/taikhoan.php";
    include_once "model/role.php";
    include_once "model/total.php";


    $list_products = load_all_product_client();
    $list_categories = load_all_category();
    

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'sanpham':
                $list_category = load_all_category();
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

            case 'testimonial':
                include 'client/testimonial.php';
                break;

            case 'cart':
                include 'client/cart.php';
                break;

            case 'danhmuc':
                $list_category = load_all_category();
                include "client/danhmuc.php";
                break;

//Danh mục-------------------------------------------------------------------------------
            
            case 'tracuu':
                $order_like = [];
                if (isset($_POST['tracuu']) && ($_POST['tracuu'])) {
                    $order_id = $_POST['tracuu'];
                    if ($order_id != '') {
                        $order_like = load_order_like($order_id);
                    }
                }
                // var_dump($order_like);
                // die();
                include 'client/tracuu.php';
                break;

            case "chitietdonhang":
                if(isset($_GET['order_id'])){
                    $order_id = $_GET['order_id'];
                    $order = load_one_order($order_id) ;    
                    $acc_id = $order['user_id'];
                    // $acc = load_one_acc($acc_id);
                    $list_order_details=order_details($_GET['order_id']);
            }
                
                include "client/chitietdonhang.php";
                break;

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

            case 'sanpham':
                $list_products = load_all_product_client();              
                include 'client/shop.php';
                break;

            case 'cart':
                include 'client/cart.php';
                break;
            
            case "add_cart":
            if(isset($_POST['btn_add'])){
                $quantity = $_POST['quantity'];
                $product_id = $_POST['product_id'];
                $product = add_cart($product_id);
                $item = [
                    'product_id'=>$product['product_id'],
                    'product_name'=>$product['product_name'],
                    'product_image'=>$product['product_image'],
                    'product_price'=>$product['product_price'],
                    'quantity'=> $quantity
                    
                ];
                if(isset($_SESSION['cart'][$product_id])){
                    $_SESSION['cart'][$product_id]['quantity'] += $quantity;
                }
                else{
                    $_SESSION['cart'][$product_id] = $item;
                }
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
                if (isset($_POST['btn_order']) && ($_POST['btn_order'])) {
                    $customer_name = $_POST['customer_name'];
                    $customer_address = $_POST['customer_address'];
                    $customer_phone = $_POST['customer_phone'];
                    $customer_email = $_POST['customer_email'];

                    // Lấy dữ liệu giỏ hàng từ session, nếu không có thì khởi tạo mảng rỗng
                    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

                    $order_id = insert_order($customer_name, $customer_address, $customer_phone, $customer_email);

                    if($order_id) {
                        foreach ($cart as $item) {
                            $product_id = $item['product_id'];
                            $quantity = $item['quantity'];
                            $product_price = $item['product_price'] * $item['quantity'];
                            $price_total += $product_price;
                            $total_money = $price_total + $price_ship;

                            insert_order_details($order_id, $product_id, $quantity, $product_price, $total_money);
                            update_quantity_buy($quantity, $product_id);
                        }
                        unset($_SESSION['cart']);
                        echo '<div class="alert-success" style="text-align: center; max-width: 300px; margin: 0 auto; padding: 10px; border: 1px solid #d4edda; background-color: #d4edda; color: #155724; border-radius: 5px;">
                        <span>Đặt hàng thành công! Vui lòng theo dõi tiến trình đơn hàng.</span><br />
                        <span>Mã đơn hàng của bạn là: ' . $order_id . '</span>
                        </div>';
                        echo '
                        <div class="pt-5">
                        <h6 class="mb-0""><a href="index.php"class="text-body d-flex justify-content-center">Tiếp tục mua sắm</a></h6>
                        </div>
                        ';
                        
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
                        $role_id = $_POST['role_id'];
                        
                        insert_account($user, $password, $phone,$email,$address,$role_id);
                        $thongbao = "Thêm Thành Công";
                   }
                   $listrole =loadall_role();
                    include "client/user/dangky.php";
                    break;
    
                    // case "list_taikhoan":
                    //     $list_taikhoan = load_all_account();
                    //     include "client/user/list.php";
                    //     break;
    
                    case "edit_taikhoan":
                        if (isset($_GET['account_id']) && ($_GET['account_id']) > 0) {
                          $account=load_one_account($_GET['account_id']);
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
                                   
                            update_account($account_id, $user, $pass,$phone_number, $email, $address);  
                            $_SESSION['account']=checkuser($user,$pass);
                
                          
                        }
                      
                        include "client/user/edit_taikhoan.php";
                        break;
    
                        case "dangnhap":
                            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                                $user = $_POST['user'];
                                $pass = $_POST['pass'];
                                $checkuser = checkuser($user, $pass);
                    
                                if (is_array($checkuser)) {
                                    // Lưu thông tin người dùng vào session
                                    $_SESSION['account'] = $checkuser;
                                    // Chuyển hướng đến trang chủ hoặc trang quản trị
                                    header('Location: index.php');
                                    exit(); // Đảm bảo không thực thi thêm mã sau chuyển hướng
                                } else {
                                    // Thông báo lỗi nếu thông tin đăng nhập không hợp lệ
                                    $thongbao = "Tài Khoản Không Tồn Tại. Vui Lòng Kiểm Tra Lại Hoặc Đăng ký";
                                }
                            }
                            // Bao gồm tệp giao diện đăng nhập
                            include "./client/user/dangnhap.php";
                            break;
    
                        case 'laylaimk':
                            if (isset($_POST['gui']) && ($_POST['gui'])) {
                                
                                $email = $_POST['email'];
                              
                                $checkemail=checkemail($email);
                                if(is_array($checkemail)){
                                        $thongbao = "Mật Khẩu Của Bạn Là:  " .$checkemail['password'];
                                }else{
                                    $thongbao = "Email Này Không Tồn Tại";
                                }
                               
                            }
                            include "client/user/quenmk.php";
                            break;

                        case 'tim_kiem':
                            if(isset($_POST['tim_kiem'])){
                                $tim_kiem = search($_POST['tim_kiem']);
                                // var_dump($tim_kiem);
                            }
                            include "client/timkiem.php";
                            break;
                       
                        case 'category_as_product':
                            if(isset($_GET['category_id'])){
                                $show = category_as_product($_GET['category_id']);
                            }
                            include "./client/category_as_product.php";
                            break;

                        case 'thoat':
                            include "logout.php";
                            
                            break;


            default:
                include "client/home.php";
                break;
        }
    }
    else{
        include "client/home.php";
    }
    
    // Kiểm tra các act để không bao gồm footer
    if (!isset($_GET['act']) || !in_array($_GET['act'], ['dangky', 'dangnhap', 'cart', 'add_cart', 'update_cart', 'delete_cart', 'thanhtoan'])) {
        include "client/footer.php";
    }
?>