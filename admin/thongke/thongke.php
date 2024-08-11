<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-body">
          <div class="d-md-flex align-items-center">
            <div>
              <h4 class="card-title">Thống Kê</h4>
              <h5 class="card-subtitle">Tổng quan về tháng gần nhất</h5>
            </div>
          </div>
          <div class="row">
            <!-- column -->
            <div class="col-lg-9">
              <div class="flot-chart">
                <div class="flot-chart-content" id="flot-line-chart"></div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="row">
                <div class="col-6">
                  <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-user m-b-5 font-16"></i>
                    <h5 class="m-b-0 m-t-5">
                      <?php echo count($list_accounts)?>
                    </h5>
                    <small class="font-light">Tổng người dùng</small>
                  </div>
                </div>
                <div class="col-6">
                  <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-plus m-b-5 font-16"></i>
                    <h5 class="m-b-0 m-t-5">
                      <?php echo count($list_accounts)?>
                    </h5>
                    <small class="font-light">Người dùng mới gần đây</small>
                  </div>
                </div>
                <div class="col-6 m-t-15">
                  <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-cart-plus m-b-5 font-16"></i>
                    <h5 class="m-b-0 m-t-5">
                      <?php echo count($list_products)?>
                    </h5>
                    <small class="font-light">Tổng sản phẩm</small>
                  </div>
                </div>
                <div class="col-6 m-t-15">
                  <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-tag m-b-5 font-16"></i>
                    <h5 class="m-b-0 m-t-5">
                      <?php echo count($list_orders)?>
                    </h5>
                    <small class="font-light">Tổng đơn hàng</small>
                  </div>
                </div>
                <div class="col-6 m-t-15">
                  <div class="bg-dark p-10 text-white text-center">
                    <i class="fa fa-table m-b-5 font-16"></i>
                    <h5 class="m-b-0 m-t-5">
                      <?php echo count($list_categories)?>
                    </h5>
                    <small class="font-light">Tổng danh mục</small>
                  </div>
                </div>
                <div class="col-6 m-t-15">
                  <div class="bg-dark p-10 text-white text-center">
                    <i class="fas fa-trademark"></i>
                    <h5 class="m-b-0 m-t-5">
                      <?php echo count($list_brands)?>
                    </h5>
                    <small class="font-light">Thương hiệu</small>
                  </div>
                </div>
              </div>
            </div>
            <!-- column -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- thống kê đơn hàng -->
  <div class="row mt-4">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Số liệu về đơn hàng</h3>
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6 col-md-4 col-lg-3">
              <div class="bg-success p-10 text-white text-center m-2">
                <i class="fa fa-check-circle m-b-5 font-16"></i>
                <?php
                  $giaothanhcong = $list_status_orders_giaoThanhCong[0]["COUNT(*)"];
                ?>
                <h5 class="m-b-0 m-t-5">
                  <?php
                  echo $giaothanhcong;
                  ?>
                </h5>
                <small class="font-light">Đơn hàng thành công</small>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="bg-warning p-10 text-white text-center m-2">
                <i class="fa fa-shipping-fast m-b-5 font-16"></i>
                <?php
                  $danggiao = $list_status_orders_dangGiaoHang[0]["COUNT(*)"];
                ?>
                <h5 class="m-b-0 m-t-5">
                  <?php
                  echo $danggiao;
                  ?>
                </h5>
                <small class="font-light">Đơn hàng đang giao</small>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="bg-primary p-10 text-white text-center m-2">
                <i class="fa fa-credit-card font-16"></i>
                <?php
                  $giaothatbai = $list_status_orders_giaoThatBai[0]["COUNT(*)"];
                ?>
                <h5 class="m-b-0 m-t-5">
                  <?php
                  echo $giaothatbai;
                  ?>
                </h5>
                <small class="font-light">Đơn hàng thất bại</small>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="bg-info p-10 text-white text-center m-2">
                <i class="fa fa-thumbs-up m-b-5 font-16"></i>
                <?php
                $daxuly = $list_status_orders_daXuLy[0]["COUNT(*)"];
                ?>
                <h5 class="m-b-0 m-t-5">
                  <?php echo $daxuly;?>
                </h5>
                <small class="font-light">Đơn hàng đã xử lý</small>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3"> 
              <div class="bg-secondary p-10 text-white text-center m-2">
                <i class="fas fa-spinner m-b-5 font-16"></i>
                <?php
                  $chuaxuly = $list_status_orders_chuaXuLy[0]["COUNT(*)"];
                ?>
                <h5 class="m-b-0 m-t-5">
                  <?php
                  echo $chuaxuly;
                  ?>
                </h5>
                <small class="font-light">Đơn hàng chưa xử lý</small>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="bg-danger p-10 text-white text-center m-2">
                <i class="fa fa-times-circle m-b-5 font-16"></i>
                <?php
                  $dahuy = $list_status_orders_daHuy[0]["COUNT(*)"];
                ?>
                <h5 class="m-b-0 m-t-5">
                  <?php
                  echo $dahuy;
                  ?>
                </h5>
                <small class="font-light">Đơn hàng đã hủy</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
