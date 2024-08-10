<div class="page-wrapper">
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

    <div class="container-fluid">
        <div class="row">
            <div class="card" style="width: 100%;">
                <form action="index.php?act=add_sanpham" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Thêm Mới Sản Phẩm</h4>
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-3 text-right control-label col-form-label">Tên Sản
                                Phẩm</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Ví dụ: Laptop, case, màn hình, ..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-sm-3 text-right control-label col-form-label">Giá Sản
                                Phẩm</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="product_price" name="product_price"
                                        placeholder="Ví dụ: 100.000" aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Tải ảnh đại diện</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="product_image" name="product_image"
                                        required>
                                    <label class="custom-file-label" for="product_image">Chọn tải ảnh đại diện ở
                                        đây...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Tải thư viện ảnh</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="images" name="images[]" multiple
                                        required>
                                    <label class="custom-file-label" for="images">Chọn tải thư viện ảnh ở
                                        đây...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea
                                    placeholder="Ví dụ: Laptop asus tuf F15 gaming là sản phẩm hot nhất trên thị trường thời điểm hiện tại ..."
                                    class="form-control" id="product_describe" name="product_describe"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-sm-3 text-right control-label col-form-label">Số Lượng</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="product_price" name="quantity"
                                        placeholder="Ví dụ: 999" aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Danh Mục</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" id="category_id" name="category_id"
                                    style="width: 100%; height:36px;" required>
                                    <option value="" disabled selected>Chọn loại sản phẩm</option>
                                    <?php foreach ($list_category as $category) { ?>
                                    <?php
                                        if ($category['status'] != 'Inactive') {   
                                    ?>
                                    <option value="<?php echo $category['category_id']?>">
                                        <?php echo $category['category_name']?>
                                    </option>
                                    <?php } else {
                                        echo '';
                                    } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Màu Sắc</label>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" id="color_id" name="color_id"
                                    style="width: 100%; height:36px;" required>
                                    <option value="" disabled selected>Chọn màu sắc</option>
                                    <?php foreach ($list_color as $color) { ?>
                                    <option value="<?php echo $color['color_id']?>">
                                        <?php echo $color['color_name']?>
                                    </option>
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
                                    <option value="<?php echo $brand['brand_id']?>">
                                        <?php echo $brand['brand_name']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <div class="border-top" style="text-align: center;">
                        <div class="card-body">
                            <input type="submit" value="Thêm sản phẩm" class="btn btn-success" id="btn_addpro"
                                name="btn_addpro">
                        </div>
                    </div>
                </div>
                </form>
                <?php
                    if (isset($thongbao) != "") {
                        echo $thongbao;
                    } else {
                        echo "";
                    }
                ?>
            </div>
        </div>
    </div>
</div>