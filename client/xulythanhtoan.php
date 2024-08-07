<?php
session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');
include "./config.php"; 

$order_id = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : '';
$total_money = isset($_SESSION['total_money']) ? $_SESSION['total_money'] : 0;
$code_cart = isset($_SESSION['code_cart']) ? $_SESSION['code_cart'] : '';

$vnp_TxnRef = $code_cart; // Mã giao dịch thanh toán tham chiếu của merchant
$vnp_Amount = $total_money; // Sử dụng tổng tiền từ session
$vnp_Locale = 'vn'; // Ngôn ngữ chuyển hướng thanh toán
$vnp_BankCode = 'VNBANK'; // Mã phương thức thanh toán
$vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // IP Khách hàng thanh toán

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount * 100, // Chuyển đổi từ VND sang đồng
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => "Thanh toán GD: " . $vnp_TxnRef,
    "vnp_OrderType" => "other",
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate" => $expire
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);

$query = "";
$hashdata = "";

foreach ($inputData as $key => $value) {
    if ($hashdata !== "") {
        $hashdata .= '&';
    }
    $hashdata .= urlencode($key) . "=" . urlencode($value);
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}

header('Location: ' . $vnp_Url);
die();
?>
