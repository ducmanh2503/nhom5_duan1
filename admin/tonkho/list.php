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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh Sách Hàng Tồn Kho</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã Tồn Kho</th>
                                        <th>Mã Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th></th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($list_product_inventory as $inventory) {
                                    ?>
                                    <tr>
                                        <td><?php echo $inventory['inventory_id']?></td>
                                        <td><?php echo $inventory['product_id']?></td>
                                        <td><?php echo $inventory['product_name']?></td>
                                        <td><?php echo $inventory['quantity']?></td>
                                        <td><a href="index.php?act=edit_soluongsanpham&id=<?php echo $inventory['product_id']?>"><i class="fas fa-edit btn btn-info"></i></a></td>
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