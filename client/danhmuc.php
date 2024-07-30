<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Danh mục sản phẩm
      </h2>
    </div>
    <div class="row">
      <?php
        foreach ($list_category as $category) {
          if ($category['status'] == 'Active') {
      ?>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <a href="index.php?act=chitietsanpham&product_id=<?php echo $category['category_id']?>">
            <div class="detail-box">
              <h6>
                <?php echo $category['category_name']?>
                <input type="hidden" value="<?php echo $category['status']?>">
              </h6>
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
