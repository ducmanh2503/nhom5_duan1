<div class="container-fluid">

    <?php
    if (isset($_SESSION['account'])) {
        $account = $_SESSION['account'];
        // var_dump($account);

    }
    ?>
    <div class="row justify-content-center align-items-center mb-5 mt-5">
        <div class="card" style="width: 50%;">
            <form action="index.php?act=update_taikhoan" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-body ">
                    <h4 class="card-title text-center">Thông Tin Tài Khoản</h4>
                    <?php if (is_array($_SESSION['account'])): ?>
                    <div class="form-group row">
                        <label for="user" class="col-sm-3 text-right control-label col-form-label">Tên Tài Khoản</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="user" name="user"
                                value="<?php echo $account['user'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-3 text-right control-label col-form-label">Mật Khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pass" name="pass"
                                value="<?php echo $account['password'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Tải ảnh đại diện</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                    <img src="<?php echo $account['avatar']?>" alt="" style="max-width: 100px; max-height: 100px;">
                                    <label class="custom-file-label" for="validatedCustomFile">Chọn tải ảnh đại diện
                                        ở đây...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-right control-label col-form-label">Số điện
                            thoại</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="<?php echo $account['phone_number'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?php echo $account['email'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 text-right control-label col-form-label">Địa chỉ</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address"
                                value="<?php echo $account['address'] ?>">
                        </div>
                    </div>

                    <?php else: ?>
                    <div class="alert alert-danger">Không tìm thấy thông tin tài khoản</div>
                    <?php endif; ?>
                </div>
                <div class="border-top" style="text-align: center;">
                    <div class="card-body">
                        <?php if (is_array($_SESSION['account'])): ?>
                        <input type="hidden" name="account_id" value="<?php echo $account['account_id'] ?>">
                        <input type="submit" class="btn btn-warning" value="Cập Nhật" id="capnhat" name="capnhat">
                        <?php endif; ?>
                    </div>
                </div>
            </form>
            <?php
                if (isset($thongbao) && $thongbao) {
                    echo $thongbao;
                } else {
                    echo '';
                }
            ?>
        </div>
    </div>


</div>