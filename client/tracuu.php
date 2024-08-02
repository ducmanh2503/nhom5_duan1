<nav class="navbar navbar-light bg-light justify-content-center">
  <a class="navbar-brand">Tra cứu đơn hàng!</a>
  <form action="index.php?act=tracuu" method="post" class="form-inline">
    <input class="form-control mr-sm-2" name="tracuu" type="search" placeholder="Nhập mã đơn hàng của bạn ..." aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" name="btn_tracuu" type="submit">Tra cứu</button>
  </form>
</nav>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Đơn Hàng của bạn</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">

                                <thead>
                                    <tr class="text-center">
                                        <th>Mã đơn hàng</th>
                                        <th>Họ và tên</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach ($order_like as $row) { ?>
                                        <tr>

                                            <td><?php echo $row['order_id']?></td>
                                            
                                            <td><?php
                                                if(isset($row['user_id']) && $row['user_id']!=""){
                                                    echo $row['user'];
                                                }
                                                else{
                                                    echo $row['customer_name'];
                                                }
                                            ?></td>
                                           
                                            <td><?php echo $row['customer_address'] ?></td>

                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <?php if ($row['order_status'] == 0) { ?>
                                                        <span class="btn btn-danger">Chưa xử lý</span>
                                                    <?php } elseif ($row['order_status'] == 1) { ?>
                                                        <span class="btn btn-info">Đã xử lý </span>
                                                    <?php } elseif ($row['order_status'] == 2) { ?>
                                                        <span class="btn btn-warning">Đang giao Hàng </span>
                                                    <?php } elseif ($row['order_status'] == 3) { ?>
                                                        <span class="btn btn-success">Giao hàng thành công </span>
                                                    <?php } else { ?><span class="btn btn-secondary">Hủy đơn</span>
                                                    <?php } ?>
                                                </div>
                                            </td>


                                            </>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="index.php?act=chitietdonhang&order_id=<?php echo $row['order_id'] ?>"
                                                        title="Xem chi tiết" class="fas fa-edit btn btn-info"></a>
                                                </div>

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