<?php
session_start();

// Bắt đầu output buffering
ob_start(); 

if (!isset($_SESSION['account'])) {
    
    // Chuyển hướng tới trang đăng nhập nếu chưa đăng nhập
    header('Location: ../index.php?act=dangnhap');
    exit();
}

include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../model/taikhoan.php";

$product_id = $_REQUEST ['product_id'];
$list_comment = load_all_comment($product_id);

$account_id=$_SESSION['account']['account_id'];
$avatar_account = load_avatar_account_bl($account_id);



if (isset($_POST['gui']) && ($_POST['gui'])) {
    $account_id = $_SESSION['account']['account_id'];
    $content = $_POST['content'];
    $product_id = $_POST['product_id'];
    $time = date('d/m/Y');
    insert_comment($content, $time, $account_id, $product_id);
    // Chuyển hướng sau khi gửi bình luận 
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}


// Kết thúc output buffering và gửi toàn bộ đầu ra
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./client/binhluan/stl.css">
</head>

<body>

    <div class="container mt-5 mb-5 ">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">

                <div class="coment-bottom bg-white p-2 px-4">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                            <img class="img-fluid img-responsive rounded-circle mr-2"
                                src="<?php echo $avatar_account[0]['avatar'] ?>" width="38">
                            <input type="hidden" name="product_id" value="<?= $product_id ?>">
                            <input type="text" class="form-control mr-3" name="content" placeholder="Thêm Bình Luận">
                            <input class="btn btn-primary" name="gui" value="Gửi" type="submit">
                        </div>
                    </form>

                    <?php foreach ($list_comment as $comment) 
                 
                    {  ?>

                    <div class="commented-section mt-2">
                        <div class="d-flex flex-row align-items-center commented-user">
                            <div class="d-flex flex-row add-comment-section mt-4 mb-1">
                                <img class="img-fluid img-responsive rounded-circle"
                                    src="<?php echo $comment['avatar'] ?>" width="40" height="40" style="border-radius: 50%; object-fit: cover;">
                            </div>
                            <h5 class="ml-2 mr-3 mt-4"> <?= $comment['user'] ?></h5>
                            <span class="mb-1 ml-5 mt-3 "><?= $comment['time'] ?></span>
                        </div>
                        <div class="ml-5 mt-4 comment-text-sm"><span> <?= $comment['content'] ?></span></div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</body>

</html>