<?php
session_start(); 
if(!isset($_SESSION['account'])) {
    // Chuyển hướng tới trang đăng nhập nếu chưa đăng nhập
    header('Location: ../index.php?act=dangnhap');
    exit();
    }
include "../../model/pdo.php";
include "../../model/binhluan.php";
$product_id = $_REQUEST['product_id'];
$list_comment = load_all_comment();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-6 py-4 bg-white shadow">

            <div>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên tài khoản</th>
                            <th>Nội dung</th>
                            <th>Sản phẩm được bình luận</th>
                            <th>Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_comment as $comment) { ?>
                        <tr>
                            <td><?php echo $comment['user'] ?></td>
                            <td><?php echo $comment['content'] ?></td>
                            <td><?php echo $comment['product_name'] ?></td>
                            <td><?php echo $comment['time'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product_id ?>">
                    <div class="form-group mb-3">
                        <label for="content">Nội dung bình luận</label>
                        <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="gui" class="btn btn-primary">Gửi Bình Luận</button>
                </form>
            </div>

            <?php
        if (isset($_POST['gui']) && ($_POST['gui'])) {
            $account_id = $_SESSION['account']['account_id'];
            $content = $_POST['content'];
            $product_id = $_POST['product_id'];
            $time = date('d/m/Y');
            insert_comment($account_id, $content, $product_id, $time);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>
        </div>
    </div>
</body>

</html>