<style>
  .shop_section .row {
  display: flex;
  flex-wrap: wrap;
  margin: -10px;
}

.shop_section .col-sm-6.col-md-4.col-lg-3 {
  padding: 10px;
  flex: 0 0 25%;
  max-width: 25%;
  box-sizing: border-box;
  display: flex;
}

.shop_section .box {
  background-color: #f9f9f9;
  padding: 20px;
  text-align: center;
  border: 1px solid #ddd;
  margin-bottom: 20px;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.shop_section .img-box img {
  max-width: 100%;
  height: auto;
  max-height: 200px;
  margin-bottom: 15px;
}

.shop_section .detail-box {
  flex-grow: 1;
}

.shop_section .new {
  margin-top: 10px;
}
</style>

<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Sản phẩm mới
      </h2>
    </div>
    <div class="row">
      <?php
      foreach ($list_products as $product) {
        // var_dump($product);
        $product_img = $img_path . $product['product_image'];
      ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="index.php?act=chitietsanpham&product_id=<?php echo $product['product_id'] ?>">
              <div class="img-box">
                <img src="<?php echo $product_img ?>" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  <?php echo $product['product_name'] ?>
                </h6>
                <h6>
                  <span>
                    <?php echo number_format($product['product_price'], 0, ',', '.') ?>đ
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
      <?php } ?>
    </div>

  </div>
</section>

<!-- end shop section -->

<!-- saving section -->
<?php
include_once 'client/saving.php';
?>
<!-- end saving section -->

<!-- why section -->
<?php
include_once 'client/why.php';
?>
<!-- end why section -->


<!-- gift section -->
<?php
include_once 'client/gift.php';
?>
<!-- end gift section -->


<!-- contact section -->
<?php
include_once 'client/contact.php';
?>
<!-- end contact section -->

<!-- client section -->
<?php
include_once 'client/testimonial.php';
?>
<!-- end client section -->