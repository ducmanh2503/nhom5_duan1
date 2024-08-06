<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tồn Kho</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tồn Kho</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="card" style="width: 100%;">
                <form action="index.php?act=update_soluongsanpham" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Thêm Số Lượng Sản Phẩm</h4>
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
                    </div>
                    <div class="border-top" style="text-align: center;">
                        <div class="card-body">
                            <input type="hidden" name="product_id" value="<?php echo $quantity_product['product_id'] ?>">
                            <input type="submit" value="Cập Nhật" class="btn btn-success" id="btn_addquantity"
                                name="btn_addquantity">
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