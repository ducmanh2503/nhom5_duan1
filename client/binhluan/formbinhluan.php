<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$product_id = $_REQUEST['product_id'];
$list_comment = load_all_comment();

?>
<div class="col-lg-8 mb-4">
    <div class="border rounded-2 px-3 py-2 bg-white">
        <div>

            <div>
                <table>
                    <?php

                foreach ($list_comment as $cm) {
                    extract($cm);
                    echo '<td>' . $user . '</td>';
                    echo '<tr><td>' . $content . '</td>';
                    echo '<td>' . $product_name . '</td>'; 
                    echo '<td>' . $time . '</td></tr>';
                }

                ?>

                </table>
            </div>
            <div>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product_id ?>">

                    <input type="text" name="content">
                    <input type="submit" name="gui" value="Gửi Bình Luận">
                </form>
            </div>

            <?php
           
           if (isset($_POST['gui']) && ($_POST['gui'])) {
            $user = $_SESSION['account']['account_id'];
            $content = $_POST['content'];
            $product_id = $_POST['product_id'];
           
            $time = date('   d/m/Y');
            insert_comment($account_id, $content, $product_id, $time);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } 

        //    if (isset($_POST['gui']) && ($_POST['gui'])) {
        //        // Kiểm tra xem người dùng đã đăng nhập chưa
        //        if (isset($_SESSION['account'])) {
        //            $user = $_SESSION['account']['account_id'];
        //            $content = $_POST['content'];
        //            $product_id = $_POST['product_id'];
        //            $time = date('d/m/Y');
                   
        //            // Gọi hàm để chèn bình luận
        //            insert_comment($user, $content, $product_id, $time);
                   
        //            // Chuyển hướng người dùng về trang trước đó
        //            header("Location: " . $_SERVER['HTTP_REFERER']);
        //            exit();
        //        } else {
        //            // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        //            header("Location: http://localhost/tam2/admin/index.php?act=dangnhap");
        //            exit();
        //        }
        //    }


        ?>
        </div>
    </div>
</div>