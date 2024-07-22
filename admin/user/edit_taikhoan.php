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
                <form action="index.php?act=update_taikhoan" method="POST" class=" form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Thông Tin Tài Khoản</h4>



                        <div class="form-group row">
                            <label for="user" class="col-sm-3 text-right control-label col-form-label">Tên
                                Tài Khoản</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="user" name="user"
                                    value="<?php echo $account['user']?>">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="pass" class="col-sm-3 text-right control-label col-form-label">Mật
                                Khẩu</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="pass" name="pass"
                                        value="<?php echo $account['password']?>" aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 text-right control-label col-form-label">Số điện
                                thoại</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="<?php echo $account['phone_number']?>" aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="<?php echo $account['email']?>" aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-3 text-right control-label col-form-label">Địa
                                chỉ</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="<?php echo $account['address']?>" aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                        </div>






                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Vai trò</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" id="role_id" name="role_id"
                                    style="width: 100%; height:36px;" required>
                                    <option value="" disabled selected>Chọn vai trò</option>
                                    <?php foreach ($listrole as $role) { ?>
                                    <option value="<?php echo $role['role_id']?>"
                                        <?php if ($role['role_id'] == $account['role_id']) echo 'selected'; ?>>
                                        <?php echo $role['role_name']?> </option>
                                    <?php } ?>
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