<?php
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

// var_dump($cart);
?>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/LOGO SHOP.png" type="image/x-icon">

  <title>
    MVT Shop
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<section class="bg-light py-5">
  <?php if (!isset($_SESSION['cart'])) { ?>
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
              <th class="text-center">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($order_details_now as $key => $now) {
              $img_ctdh = $img_path . $now['product_image'];
              // var_dump($total_money);
              // var_dump($now['total_money']);
            ?>
              <tr>
                <td class="text-center"><?php echo $key + 1 ?></td>
                <td><?php echo $now['product_name'] ?></td>
                <td class="text-center"><img src="<?php echo $img_ctdh ?>" alt="" width="50px"></td>
                <td class="text-center"><?php echo $now['quantity'] ?></td>
                <td class="text-center"><?php echo number_format($now['product_price'], 0, ',', '.') ?>đ</td>
                <td class="text-center"><?php echo number_format($now['product_price'] * $now['quantity'], 0, ',', '.')?>đ</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-12">
      <div class="pull-right m-t-30 text-right">
        <h3><b>Tổng : <?php echo number_format($total_money, 0, ',', '.') ?>đ</b></h3>
        <div class="note_price">
          <em>Giá đã bao gồm VAT + Ship</em>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr>
    </div>
  <?php } else { 
    ?>
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 mb-4 d-flex justify-content-center">
          <!-- Checkout -->
          <div class="card shadow-0 border">
            <form action="index.php?act=thanhtoan" method="post">
              <div class="p-4">
                <h5 class="card-title mb-3">Thông tin khách hàng</h5>
                <div class="row">
                  <div class="col-6 mb-3">
                    <p class="mb-0">Họ & Tên</p>
                    <div class="form-outline">
                      <input type="text" id="typeText" name="customer_name" placeholder="Bắt buộc" value="<?php if (isset($_SESSION['account'])) { echo $_SESSION['account']['user']; } ?>" class="form-control" required />
                    </div>
                  </div>
                  <div class="col-6 mb-3">
                    <p class="mb-0">Số điện thoại</p>
                    <div class="form-outline">
                      <input type="tel" id="typePhone" name="customer_phone" value="<?php if (isset($_SESSION['account'])) { echo $_SESSION['account']['phone_number']; } ?>" class="form-control" required />
                    </div>
                  </div>
                  <div class="col-6 mb-3">
                    <p class="mb-0">Email</p>
                    <div class="form-outline">
                      <input type="email" id="typeEmail" name="customer_email" value="<?php if (isset($_SESSION['account'])) { echo $_SESSION['account']['email']; } ?>" placeholder="example@gmail.com" class="form-control" required />
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="row">
                  <div class="col-sm-8 mb-3">
                    <p class="mb-0">Địa chỉ</p>
                    <div class="form-outline">
                      <input type="text" id="typeText" name="customer_address" value="<?php if (isset($_SESSION['account'])) {
                                                                                        echo $_SESSION['account']['address'];
                                                                                      } ?>" placeholder="Bắt buộc" class="form-control" required />
                                                                                      
                    </div>

                                                <!--Thanh toán-->
                  </div>
                  <div class="form-check">
                      <input type="hidden" name="payment" id="radio1" value="tien_mat" checked>
                      <label class="form-check-label" for="radio1"></label>                                                                
                  </div>
                  <div class="form-check">
                      <input type="hidden" name="payment" id="radio1" value="vn_pay" checked>
                      <label class="form-check-label" for="radio1"></label>                                                                
                  </div>
                  <div class="float-end">
                    <!-- <button class="btn btn-light border">Cancel</button> -->
                    <input type="submit" class="btn btn-success shadow-0 border mt-4" id="btn-thanhtoan" name="btn-thanhtoan" value="Tiếp Tục">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
          <div class="card shadow-0 border ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
            <div class="p-4">
              <h6 class="text-dark my-4">Sản phẩm trong giỏ hàng</h6>
              <?php
              $sale = $sale - 100000;
                if (isset($_POST['btn_submit']) && ($_POST['btn_submit'])) {
                                      $voucher_id = $_POST['voucher'];
                                      $sale = $_POST['sale'];
                                      $new_sale = 0;
                                      if ($voucher_id == 1) {
                                          $new_sale -= 30000;
                                      } else {
                                          $new_sale -= 100000;
                                      }
                                      // var_dump($sale);
                                      foreach($cart as $item) {
                                        // var_dump($item);
                                        $item['price_sale'] = $sale;
                                      }
                                          unset($item); // Kết thúc tham chiếu

                                      // Lưu giỏ hàng đã cập nhật vào session
                                      $_SESSION['cart'] = $cart;

                                      // Lưu giá trị sale vào session
                                      $_SESSION['sale'] = $new_sale;
                                      $sale = $new_sale;

                                      // var_dump($_SESSION['cart']);
                                      // var_dump($_SESSION['sale']);
                                  }
              ?>
              <?php
              include_once 'global.php';
              $total = 0; // Khởi tạo biến tổng tiền
              foreach ($cart as $item) {
                $img_c = $img_path . $item['product_image'];
                if ($item['quantity'] > 4) {
                  $item['quantity'] = 4;
                }
                // echo '<pre>';
                // print_r($item);
                // echo '</pre>';
                $item['price_sale'] = $sale;
                $product_price = $item['product_price'];
                $quantity_product = $item['quantity'];
                $total_price = $product_price * $quantity_product;
                $total += $total_price; // Cộng dồn tổng tiền
                // var_dump($item);
              ?>
                <div class="d-flex align-items-center mb-4">
                  <div class="me-3 position-relative">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary"><?php echo $item['quantity'] ?></span>
                    <img src="<?php echo $img_c ?>" style="height: 96px; width: 96px;" class="img-sm rounded border" />
                  </div>
                  <div>
                    <a href="index.php?act=chitietsanpham&product_id=<?php echo $item['product_id'] ?>" class="nav-link"><?php echo $item['product_name']; ?> <br /></a>
                    <?php if ($item['color_id'] == 1) {
                      echo 'Đen';
                    } else if ($item['color_id'] == 2) {
                      echo 'Trắng';
                    } else if ($item['color_id'] == 3) {
                      echo 'Hồng';
                    } ?>
                    <div class="price text-muted">Giá: <?php echo number_format($product_price, 0, ',', '.'); ?>đ</div>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Tổng: </p>
                  <p class="mb-2"><?php echo number_format($total_price, 0, ',', '.') ?>đ</p>
                </div>
                <hr/>
              <?php } ?>
                <h6 class="mb-3">Xác nhận thanh toán</h6>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Tổng tiền sản phẩm:</p>
                  <p class="mb-2 fw-bold"><?php echo number_format($total_price, 0, ',', '.') ?>đ</p>
                </div>
                <h6 class="mb-3">Mã giảm giá: </h6>
                  <form action="index.php?act=thanhtoan" method="post">
                      <?php
                        foreach($list_vouchers as $voucher) {
                      ?>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="voucher" value="<?php echo $voucher['voucher_id']?>" checked>
                        <input type="hidden" name="sale" value="<?php echo $sale?>">
                      <label class="form-check-label mb-4" for="voucher">
                        <?php echo $voucher['voucher_title']?>
                      </label>
                      </div>
                      <?php } ?>
                    <div class="d-flex justify-content-left mt-4">
                      <input class="btn btn-dark" type="submit" value="Áp dụng" name="btn_submit">
                    </div>
                    </form>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Giảm giá:</p>
                  <p class="mb-2 text-danger"><?php echo number_format($sale, 0, ',', '.')?>đ</p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Ship COD:</p>
                  <p class="mb-2"><?php echo number_format($price_ship, 0, ',', '.') ?>đ</p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Thành tiền:</p>
                  <p class="mb-2 fw-bold"><?php echo number_format($total + $price_ship + $sale, 0, ',', '.') ?>đ</p>
                </div>
                <div class="note_price">
                  <em class="text-muted">Giá đã bao gồm VAT + Ship</em>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</section>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>