
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
                                                   <h5 class="m-b-0 m-t-5"><?php echo count($list_accounts)?></h5>
                                                   <small class="font-light">Tổng người dùng</small>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php echo count($list_accounts)?></h5>
                                                   <small class="font-light">Người dùng mới</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php echo count($list_products)?></h5>
                                                   <small class="font-light">Tổng sản phẩm</small>
                                                </div>
                                            </div>
                                             <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php echo count($list_orders)?></h5>
                                                   <small class="font-light">Tổng đơn hàng</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-table m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php echo count($list_categories)?></h5>
                                                   <small class="font-light">Tổng danh mục</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fas fa-trademark"></i>
                                                   <h5 class="m-b-0 m-t-5"><?php echo count($list_brands)?></h5>
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
