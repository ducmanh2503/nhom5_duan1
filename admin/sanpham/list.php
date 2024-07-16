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
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh Sách Sản Phẩm</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Mô Tả</th>
                                        <th>Giá</th>
                                        <th>Màu Sắc</th>
                                        <th>Thương Hiệu</th>
                                        <th>Trạng Thái</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($list_product as $product) {
                                            // var_dump($product);
                                            $status_text = ($product['status'] == 'active') ? 'Hoạt Động' : 'Ngưng Hoạt Động';

                                    ?>
                                    <tr>
                                        <td><?php echo $product['product_name']?></td>
                                        <td><img src="upload/<?php echo $product['product_image']?>" alt="" style="max-width: 100px; max-height: 100px;"></td>
                                        <td><?php echo $product['product_describe']?></td>
                                        <td><?php echo $product['product_price']?></td>
                                        <td><?php echo $product['color_name']?></td>
                                        <td><?php echo $product['brand_name']?></td>
                                        <td><input type="submit" class="btn btn-success" value="<?php echo $status_text?>"></td>
                                        <td><a href="index.php?act=edit_sanpham&id=<?php echo $product['product_id']?>"><i class="fas fa-edit btn btn-info"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>