<?php
session_start();
if (!isset($_SESSION['account'])) {
    // Chuyển hướng tới trang đăng nhập nếu chưa đăng nhập
    header('Location: ../index.php?act=dangnhap');
    exit();
}
include "../../model/pdo.php";
include "../../model/binhluan.php";
$product_id = $_REQUEST['product_id'];
$list_comment = load_all_comment();

?>
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
            <?php
                            foreach ($list_comment as $comment) {


                                ?>
            <tr>
                <td>
                    <?php echo $comment['user'] ?>
                </td>

                <td>
                    <?php echo $comment['content'] ?>
                </td>

                <td>
                    <?php echo $comment['product_name'] ?>
                </td>

                <td>
                    <?php echo $comment['time'] ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="mt-4">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="product_id" value="<?= $product_id ?>">

        <input class="form-control rounded" type="text" name="content" required>
        <input class="btn btn-info ms-3 mt-3 mb-3" type="submit" name="gui" value="Gửi Bình Luận">
    </form>
</div>
<?php

                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $account_id = $_SESSION['account']['account_id'];
                    $content = $_POST['content'];
                    $product_id = $_POST['product_id'];

                    $time = date('   d/m/Y');
                    insert_comment($content, $time, $account_id, $product_id);
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }




                ?>