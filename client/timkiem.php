<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- shop section -->

<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Kết quả tìm kiếm
      </h2>
    </div>
    <div class="row">
      <?php
        foreach ($tim_kiem as $tim) {
          // var_dump($product);
          
          $product_img = $img_path . $tim['product_image'];
      ?>
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <a href="index.php?act=chitietsanpham&product_id=<?php echo $tim['product_id']?>">
            <div class="img-box">
              <img src="<?php echo $product_img ?>" alt="">
            </div>
            <div class="detail-box">
              <h6>
                <?php echo $tim['product_name']?>
              </h6>
              <h6>
                <span>
                  <?php echo number_format($tim['product_price'], 0, ',', '.')?>đ
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
</body>
</html>