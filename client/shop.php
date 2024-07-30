<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Sản phẩm mới
      </h2>
    </div>
    <div class="row">
    <?php
        $active_categories = array();
        foreach ($list_category as $category) {
          if ($category['status'] == 'Active') {
              $active_categories[] = $category['category_id']; // Giả sử bạn có id danh mục
    ?>
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="box">
        <div class="detail-box">
          <h6>
            <?php echo $category['category_name']?>
              <input type="hidden" value="<?php echo $category['status']?>">
          </h6>
        </div>
      </div>
    </div>
    <?php
          }
        }
      ?>
    </div>
    
      <?php
        foreach ($list_products as $product) {
          // Kiểm tra nếu sản phẩm thuộc danh mục đang hoạt động
          if (in_array($product['category_id'], $active_categories)) { // Giả sử bạn có category_id của sản phẩm
            $product_img = $img_path . $product['product_image'];
      ?>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <a href="index.php?act=chitietsanpham&product_id=<?php echo $product['product_id']?>">
            <div class="img-box">
              <img src="<?php echo $product_img ?>" alt="">
            </div>
            <div class="detail-box">
              <h6>
                <?php echo $product['product_name']?>
              </h6>
              <h6>
                Giá: 
                <span>
                  <?php echo number_format($product['product_price'], 0, ',', '.')?>đ
                </span>
              </h6>
            </div>
            <div class="new">
              <span>
                Mới
              </span>
            </div>
          </a>
        </div>
      </div>
      <?php
          }
        }
      ?>
    </div>
    <div class="btn-box">
      <a href="#">
        Xem thêm
      </a>
    </div>
  </div>
</section>
