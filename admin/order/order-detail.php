<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Đơn Hàng</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body printableArea">
                        <h3><b> Mã Đơn hàng : <?php echo $order['order_id'] ?></b> <span class="pull-right"></span></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left text-left">
                                    <address>
                                        <h3></h3>
                                        <h4 class="font-bold">Tên khách hàng: <?php if (!isset($order['customer_name'])) {
                                                echo $order['user'];
                                            } else {
                                                echo $order['customer_name'];
                                            }?></h4>
                                        <p class="text-muted m-l-30 font-bold">Số điện thoại: +84
                                            <?php echo $order['customer_phone'] ?>
                                            <br /> Email: <?php if (!isset($order['customer_email'])) {
                                            echo $order['email'];
                                            } else {
                                                echo $order['customer_email'];
                                            }?>
                                            <br /> Địa chỉ nhận hàng: <?php echo $order['customer_address'] ?>
                                            <br /> Trạng thái đơn hàng: <?php if($order['order_status'] == 0) { ?> Chưa
                                            xử lý
                                            <?php } elseif($order['order_status'] == 1) { ?> Đã xử lý
                                            <?php } elseif($order['order_status'] == 2) { ?> Đang giao Hàng
                                            <?php } elseif($order['order_status'] == 3) { ?> Chưa thanh toán
                                            <?php } elseif($order['order_status'] == 4) { ?> Đã thanh toán
                                            <?php } elseif($order['order_status'] == 5) { ?> Giao hàng thành công
                                            <?php } else{ ?> Hủy đơn
                                            <?php } ?>
                                        </p>
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive m-t-40" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th class="text-center">Ảnh</th>
                                                <th class="text-center">Màu sắc</th>
                                                <th class="text-center">Số Lượng</th>
                                                <th class="text-center">Giá</th>
                                                <th class="text-center">Thành tiền(đã bao gồm khuyến mãi)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once '../global.php';
                                            foreach($list_order_details as $key => $order_details) {
                                                // var_dump($order_details);
                                                ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key + 1 ?></td>
                                                <td><?php echo $order_details['product_name'] ?></td>
                                                <td class="text-center"><img
                                                        src="upload/<?php echo $order_details['product_image']?>" alt=""
                                                        width="50px"></td>
                                                <td><?php echo $order_details['color_name'] ?></td>
                                                <td class="text-center"><?php echo $order_details['quantity'] ?></td>
                                                <td class="text-center">
                                                    <?php echo number_format($order_details['product_price'], 0, ',', '.')?>
                                                    đ</td>
                                                <td class="text-center">
                                                    <?php echo number_format($order_details['product_price'] * $order_details['quantity'], 0, ',', '.') ?>
                                                    đ </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right m-t-30 text-right">
                                    <h3><b>Tổng :
                                            <?php echo number_format($order_details['total_money'], 0, ',', '.') ?>đ</b>
                                    </h3>
                                    <div class="note_price">
                                        <em>Giá đã bao gồm VAT + Ship</em>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <form action="index.php?act=update_order" method="post">
                                <select class="select2 form-control custom-select" id="" name="order_status"
                                    required="required">
                                    <?php if ($order['order_status'] == 0) {
                                        echo '<option value="0" selected hidden >Chưa xử lý</option>';
                                    } else if ($order['order_status'] == 1) {
                                        echo '<option value="1" selected hidden >Đã xử lý</option>';
                                    } else if ($order['order_status'] == 2) {
                                        echo '<option value="2" selected hidden >Đang giao hàng</option>';
                                    } else if ($order['order_status'] == 3) {
                                        echo '<option value="4" selected hidden >Giao thất bại</option>';
                                    } else if ($order['order_status'] == 4) {
                                        echo '<option value="5" selected hidden >Giao hàng thành công</option>';
                                    } else {
                                        echo '<option value="6" selected hidden >Hủy</option>';
                                    }
                                    ?>
                                    <?php
                                        if ($order['order_status'] == 0) {
                                    ?>
                                        <option value="0">Chưa xử lý</option>
                                        <option value="1">Đã xử lý</option>
                                        <!-- <option value="2" disabled >Đang giao hàng</option>
                                        <option value="3" disabled >Chưa thanh toán</option>
                                        <option value="4" disabled >Đã thanh toán</option>
                                        <option value="5" disabled >Giao hàng thành công</option> -->
                                        <option value="6">Hủy</option>
                                    <?php } 
                                    
                                    else if ($order['order_status'] == 1){    
                                    ?>
                                    <option value="2">Đang giao hàng</option>
                                    <?php } else if ($order['order_status'] == 2) {?>
                                    <option value="3">Giao hàng thất bại</option>
                                    <option value="4">Giao hàng thành công</option>
                                    <?php } else if ($order['order_status'] == 4 || ($order['order_status'] == 5)) {
                                        echo '';
                                        ?>
                                    <?php } ?>
                                </select>
                                <input type="hidden" value="<?php echo $order['order_id'] ?>" name="order_id">
                                <input type="submit" class="btn btn-success" value="Cập nhật" name="btn-update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>