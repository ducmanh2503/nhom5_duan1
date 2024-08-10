<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        <?php echo $show[0]['category_name'] ?>
      </h2>
    </div>
    <div class="row">
      <?php
        foreach ($show as $product) {
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
      <?php }  ?>
    </div>
  </div>
</section>
