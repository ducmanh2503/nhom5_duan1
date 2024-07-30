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


    $list_products = load_all_product_client();
    $list_categories = load_all_category();
    

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'sanpham':
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
                            $price_total = 0;
                            $price_ship = 30000;
                            $product_id = $item['product_id'];
                            $quantity = $item['quantity'];
                            $product_price = $item['product_price'] * $item['quantity'];
                            $price_total += $product_price;
                            $total_money = $price_total + $price_ship;

                            insert_order_details($order_id, $product_id, $quantity, $product_price, $total_money);
                            update_quantity_buy($quantity, $product_id);
                        }
                        unset($_SESSION['cart']);
                        echo '
                        <span class="success" style="text-align: center; font-size: 24px; font-weight: 700;">Đặt hàng thành công! Quý khách vui lòng theo dõi tình trạng đơn hàng!</span>
                        <div class="pt-5">
                        <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a></h6>
                        </div>
                        ';
                        
                    }
                }
                include "client/thanhtoan.php";
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