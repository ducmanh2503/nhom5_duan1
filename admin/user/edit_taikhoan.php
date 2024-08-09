<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tài Khoản</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tài Khoản</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="card" style="width: 100%;">
                <form action="index.php?act=update_taikhoan" method="POST" class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Thông Tin Tài Khoản</h4>

                        <div class="form-group row">
                            <label for="user" class="col-sm-3 text-right control-label col-form-label">Tên Tài
                                Khoản</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="user" name="user"
                                    value="<?php echo $account['user'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pass" class="col-sm-3 text-right control-label col-form-label">Mật Khẩu</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pass" name="pass"
                                    value="<?php echo $account['password'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 text-right control-label col-form-label">Số điện
                                thoại</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="<?php echo $account['phone_number'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?php echo $account['email'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-3 text-right control-label col-form-label">Địa
                                chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address"
                                    value="<?php echo $account['address'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 text-right control-label col-form-label">Trạng
                                thái</label>
                            <div class="col-sm-9">
                                <select id="status" name="status" class="form-control">
                                    <?php
                                    $status_options = array("Active" => "Hoạt động", "Inactive" => "Ngưng hoạt động");
                                    foreach ($status_options as $key => $value) {
                                        $selected = ($key == $account['status']) ? 'selected' : '';
                                        echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top" style="text-align: center;">
                        <div class="card-body">
                            <input type="hidden" name="account_id" value="<?php echo $account['account_id'] ?>">
                            <input type="submit" class="btn btn-warning" value="Cập Nhật" id="btn_update"
                                name="capnhat">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- editor -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
    </div>
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->