<div id="main-wrapper">
    <div class="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body printableArea">


                        <h3><b> Mã Đơn hàng :
                                <?php echo $order['order_id'] ?>
                            </b> <span class="pull-right"></span></h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="pull-left text-left">
                                    <address>
                                        <h3></h3>
                                        <h4 class="font-bold">Tên khách hàng: <?php if (!isset($_SESSION['account'])) {
                                            echo $order['customer_name'];
                                        } else {
                                            echo $_SESSION['account']['user'];
                                        } ?></h4>
                                        <p class="text-muted m-l-30 font-bold">Số điện thoại: +84
                                            <?php echo $order['customer_phone'] ?>
                                            <br /> Email:
                                            <?php echo $order['customer_email'] ?>
                                            <br /> Địa chỉ nhận hàng:
                                            <?php echo $order['customer_address'] ?>
                                            <br /> Trạng thái đơn hàng:
                                            <?php if($order['order_status'] == 0) { ?> Chưa xử lý
                                            <?php } elseif($order['order_status'] == 1) { ?> Đã xử lý
                                            <?php } elseif($order['order_status'] == 2) { ?> Đang giao Hàng
                                            <?php } elseif($order['order_status'] == 3) { ?> Chưa thanh toán
                                            <?php } elseif($order['order_status'] == 4) { ?> Đã thanh toán
                                            <?php } elseif($order['order_status'] == 5) { ?> Giao hàng thành công
                                            <?php } else{ ?> Hủy đơn
                                            <?php } ?>



                                        </p>

                                        <!-- <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan
                                            2018</p>
                                        <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2018</p> -->
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
                                                <th class="text-center">Số Lượng</th>
                                                <th class="text-center">Giá</th>
                                                <th class="text-center">Thành tiền(đã khuyến mãi)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($list_order_details as $key => $order_details) {
                                                $img_ctdh = $img_path . $order_details['product_image'];
                                                // var_dump($order_details);
                                                ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $key + 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo $order_details['product_name'] ?>
                                                </td>
                                                <td class="text-center"><img src="<?php echo $img_ctdh?>" alt=""
                                                        width="50px"></td>
                                                <td class="text-center">
                                                    <?php echo $order_details['quantity'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo number_format($order_details['product_price'], 0, ',', '.')?>
                                                    đ
                                                </td>
                                                <td class="text-center">
                                                    <?php echo number_format($order_details['product_price'] * $order_details['quantity'], 0, ',', '.')?>
                                                    đ
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pull-right m-t-30 text-right">

                                    <h3><b>Tổng :
                                            <?php echo number_format($order_details['total_money'], 0, ',', '.') ?>đ
                                        </b></h3>
                                    <div class="note_price">
                                        <em>Giá đã bao gồm VAT + Ship</em>
                                    </div>

                                </div>

                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <?php
                                if ($order['order_status'] == 0) {
                            ?>
                            <form action="index.php?act=update_status_client" method="post">
                                <select class="select2 form-control custom-select" id="" name="order_status"
                                    required="required">
                                    <?php if ($order['order_status'] == 0) {
                                        echo '<option value="6" selected hidden >Hủy</option>';
                                    }
                                    ?>
                                </select>
                                <input type="hidden" value="<?php echo $order['order_id'] ?>" name="order_id">
                                <input type="submit" class="btn btn-success" value="Cập nhật" name="btn_cancel">
                            </form>
                            <?php } else { ?>
                                
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>