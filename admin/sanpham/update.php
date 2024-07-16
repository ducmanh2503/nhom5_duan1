<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Sản Phẩm</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
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
                <form action="index.php?act=update_sanpham" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Cập Nhật Sản Phẩm</h4>
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-3 text-right control-label col-form-label">Tên
                                Sản Phẩm</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product['product_name']?>"
                                    placeholder="Ví dụ: Laptop, case, màn hình, ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-sm-3 text-right control-label col-form-label">Giá
                                Sản Phẩm</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product['product_price']?>"
                                        placeholder="Ví dụ: 100.000" aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Tải file</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="product_image" name="product_image">
                                    <img src="upload/<?php echo $product['product_image']?>" alt="" style="max-width: 100px; max-height: 100px;">
                                    <label class="custom-file-label" for="validatedCustomFile">Chọn tải file
                                        ở đây...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Mô
                                tả</label>
                            <div class="col-sm-9">
                                <textarea
                                    placeholder="Ví dụ: Laptop asus tuf F15 gaming là sản phẩm hot nhất trên thị trường thời điểm hiện tại ..."
                                    class="form-control" id="product_describe" name="product_describe" value="<?php echo $product['product_describe']?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Màu Sắc</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" id="color_id" name="color_id"
                                    style="width: 100%; height:36px;" required>
                                    <option value="" disabled selected>Chọn màu</option>
                                    <?php foreach ($list_color as $color) { ?>
                                        <?php if ($color['color_id'] == $product['color_id']) { ?>
                                            <option value="<?php echo $color['color_id']?>" selected><?php echo $color['color_name']?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $color['color_id']?>"><?php echo $color['color_name']?></option>
                                            <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Danh Mục</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" id="category_id" name="category_id"
                                    style="width: 100%; height:36px;" required>
                                    <option value="" disabled selected>Chọn loại sản phẩm</option>
                                    <?php foreach ($list_category as $category) { ?>
                                        <?php if ($category['category_id'] == $product['category_id']) {?>
                                            <option value="<?php echo $category['category_id']?>" selected><?php echo $category['category_name']?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Thương Hiệu</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" id="brand_id" name="brand_id"
                                    style="width: 100%; height:36px;" required>
                                    <option value="" disabled selected>Chọn thương hiệu</option>
                                    <?php foreach ($list_brand as $brand) { ?>
                                        <?php if ($brand['brand_id'] == $product['brand_id']) {?>
                                            <option value="<?php echo $brand['brand_id']?>" selected><?php echo $brand['brand_name']?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $brand['brand_id']?>"><?php echo $brand['brand_name']?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top" style="text-align: center;">
                        <div class="card-body">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                            <input type="submit" class="btn btn-warning" value="Cập Nhật" id="btn_update" name="btn_update">
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