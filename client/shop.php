<style>
  .shop_section .row {
    display: flex;
    flex-wrap: wrap;
  }

  .shop_section .col-sm-6.col-md-4.col-lg-3 {
    display: flex;
    padding: 15px;
  }

  .shop_section .box {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    width: 100%;
    /* Đảm bảo box chiếm toàn bộ không gian của cột */
    border: 1px solid #ddd;
    /* Thêm viền cho box */
    padding: 15px;
    /* Khoảng cách bên trong box */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Đổ bóng nhẹ cho box */
    background-color: #fff;
    /* Màu nền của box */
  }

  .shop_section .img-box img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
  }

  .shop_section .detail-box {
    flex-grow: 1;
    /* Đẩy chi tiết box xuống */
    margin-top: 15px;
  }

  .shop_section .new {
    margin-top: 10px;
  }
</style>


</styl.shop_section>
<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Sản phẩm</h2>
    </div>
    <div class="row">
      <?php
      $active_categories = array();
      foreach ($list_categories as $category) {
        if ($category['status'] != 'Inactive') {
          $active_categories[] = $category['category_id'];
      ?>
          <input type="hidden" value="<?php echo $category['category_name'] ?>">
      <?php
        }
      }
      ?>
    </div>
    <div class="row">
      <?php
      foreach ($list_products as $product) {
        if (in_array($product['category_id'], $active_categories)) {
          $product_img = $img_path . $product['product_image'];
      ?>
          <div class="col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
            <div class="box">
              <a href="index.php?act=chitietsanpham&product_id=<?php echo $product['product_id'] ?>">
                <div class="img-box">
                  <img src="<?php echo $product_img ?>" alt="">
                </div>
                <div class="detail-box">
                  <h6><?php echo $product['product_name'] ?></h6>
                  <h6>
                    Giá:
                    <span><?php echo number_format($product['product_price'], 0, ',', '.') ?>đ</span>
                  </h6>
                </div>
                <div class="new">
                  <span>Mới</span>
                </div>
              </a>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</section>