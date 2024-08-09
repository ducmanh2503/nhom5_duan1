<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Bình Luận</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bình Luận</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh Sách Bình Luận</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên tài khoản</th>
                                        <th>Nội dung</th>
                                        <th>Sản phẩm được bình luận</th>
                                        <th>Chức Năng</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($list_comment as $comment) {                                          
                                    ?>
                                    <tr>
                                        <td><?php echo $comment['user']?></td>
                                        <td><?php echo $comment['content']?></td>
                                        <td><?php echo $comment['product_name']?></td>
                                        <td>
                                            <a href="index.php?act=xoa_binhluan&comment_id=<?php echo $comment['comment_id']; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">Xóa</a>
                                        </td>
                                        <td><?php echo $comment['time']?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>