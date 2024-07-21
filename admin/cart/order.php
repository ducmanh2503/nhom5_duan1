
<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Đơn hàng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng</li>
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
                        <h5 class="card-title">Danh Sách Đơn Hàng</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>User name</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                        
                                    </tr>
                                </thead>
                                
                                   
                                <tbody>
                                   <?php foreach($order as $cart) {?>
                                    <tr>
                                        <td><?php echo $cart['order_id'] ?></td>
                                        <td><?php echo $cart['customer_name'] ?></td>
                                        <td><?php echo $cart['name'] ?></td>
                                        <td><?php echo $cart['customer_address'] ?></td>
                                        <td><?php if($cart['order_status'] == 0){ ?>
                                            <span class="btn btn-danger" >Chưa xử lý</span>
                                            <?php }elseif($cart['order_status'] == 1){ ?>
                                            <span class="btn btn-success">Đang xử lý</span>
                                            <?php } ?>

                                        </td>
                                        <td>
                                            <a href="index.php?act=order_detail&order_id=<?php echo $cart['order_id'] ?>" title="Xem chi tiết" class="fas fa-edit btn btn-info"></a>
                                            <a href="" title="Xóa" class="fas fa-trash-alt btn btn-danger"></a>
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
   
    </div>
   
</div>
