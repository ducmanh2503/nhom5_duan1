<?php
  $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>

<section class="bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-8 mb-4 d-flex justify-content-center">

        <!-- Checkout -->
        <div class="card shadow-0 border">
          <form action="" method="post">
            <div class="p-4">
              <h5 class="card-title mb-3">Thông tin khách hàng</h5>
              <div class="row">
                <div class="col-6 mb-3">
                  <p class="mb-0">Họ & Tên</p>
                  <div class="form-outline">
                    <input type="text" id="typeText" name="customer_name" placeholder="Bắt buộc" class="form-control" require />
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Số điện thoại</p>
                  <div class="form-outline">
                    <input type="tel" id="typePhone" name="customer_phone" value="+84 " class="form-control" require />
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Email</p>
                  <div class="form-outline">
                    <input type="email" id="typeEmail" name="customer_email" placeholder="example@gmail.com" class="form-control" require />
                  </div>
                </div>
              </div>

              <hr class="my-4" />

              <div class="row">
                <div class="col-sm-8 mb-3">
                  <p class="mb-0">Địa chỉ</p>
                  <div class="form-outline">
                    <input type="text" id="typeText" name="customer_address" placeholder="Bắt buộc" class="form-control" require />
                  </div>
                </div>

                <div class="float-end">
                  <!-- <button class="btn btn-light border">Cancel</button> -->
                  <input type="submit" class="btn btn-success shadow-0 border" name="btn_order" value="Tiếp Tục">
                </div>
              </div>
            </div>
          </form>
          <!-- Checkout -->
        </div>
      </div>

      <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
        <div class="card shadow-0 border ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
          <div class="p-4">
            <h6 class="text-dark my-4">Sản phẩm trong giỏ hàng</h6>
            <?php
              $quantity_total = 0;
              $total = 0;
              foreach ($cart as $item) {
                $img_c = $img_path . $item['product_image'];
                if ($item['quantity'] > 4) {
                  $item['quantity'] = 4;
                }
                $product_price = $item['product_price'] * $item['quantity'];
                $quantity_total += $item['quantity'];
                $price_total += $product_price;
                $total = $price_total + $price_ship;
            ?>
            <div class="d-flex align-items-center mb-4">
              <div class="me-3 position-relative">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                  <?php echo $item['quantity'] ?>
                </span>
                <img src="<?php echo $img_c?>"
                  style="height: 96px; width: 96px;" class="img-sm rounded border" />
              </div>
              <div class="">
                <a href="#" class="nav-link">
                  <?php echo $item['product_name']; ?> <br />
                </a>
                <div class="price text-muted">Tổng: <?php echo number_format($product_price, 0, ',', '.'); ?>đ</div>
              </div>
            </div>
            <?php } ?>
            <h6 class="mb-3">Xác nhận thanh toán</h6>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Tổng tiền:</p>
              <p class="mb-2"><?php echo number_format($price_total, 0, ',', '.')?>đ</p>
            </div>
            <!-- <div class="d-flex justify-content-between">
              <p class="mb-2">Giảm giá:</p>
              <p class="mb-2 text-danger">- $60.00</p>
            </div> -->
            <div class="d-flex justify-content-between">
              <p class="mb-2">Ship COD:</p>
              <p class="mb-2"><?php echo number_format($price_ship, 0, ',', '.')?>đ</p>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <p class="mb-2">Tổng tiền:</p>
              <p class="mb-2 fw-bold"><?php echo number_format($total, 0, ',', '.')?>đ</p>
            </div>

            <!-- <div class="input-group mt-3 mb-4">
              <input type="text" class="form-control border" name="" placeholder="Nhập mã giảm giá" />
              <button class="btn btn-light text-primary border">Xác nhận</button>
            </div> -->
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
