<?php
// session_start();
// die();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$quantity_item = count($cart);
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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
</head>
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0">Giỏ Hàng</h1>
                                        <h6 class="mb-0 text-muted">Có
                                            <?php echo $quantity_item ?> sản phẩm trong giỏ hàng của bạn
                                        </h6>
                                    </div>
                                    <hr class="my-4">

                                    <?php
                  $quantity_total = 0;
                  $price_total = 0;
                  foreach ($cart as $item) {
                    // var_dump($item);
                    $img_c = $img_path . $item['product_image'];
                    if ($item['quantity'] > 4) {
                      $item['quantity'] = 4;
                    }
                    $product_id = $item['product_id'];
                    $product_price = $item['product_price'] * $item['quantity'];
                    $quantity_total += $item['quantity'];
                    $price_total += $product_price;
                  ?>
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="<?php echo $img_c ?>" class="img-fluid rounded-3" alt="img_error">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted"><?php echo $item['product_name'] ?></h6>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <form style="display: inline-flex;" action="index.php?act=update_cart"
                                                method="post">
                                                <input type="hidden" name="product_id"
                                                    value="<?php echo $item['product_id'] ?>">
                                                <input type="hidden" name="update_quantity" value="1">
                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.parentNode.submit();">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="form1" min="1" max="4" name="quantity"
                                                    value="<?php echo $item['quantity'] ?>" type="number"
                                                    class="form-control form-control-sm"
                                                    onchange="this.form.submit();" />

                                                <button type="button" class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp(); this.parentNode.submit();">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0"><?php echo number_format($product_price, 0, ',', '.') ?>đ
                                            </h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <form action="index.php?act=delete_cart" method="post">
                                                <input type="hidden" name="product_id"
                                                    value="<?php echo $item['product_id'] ?>">
                                                <input type="submit" value="Xóa" name="btn_delete"
                                                    style="background-color: transparent; border: none;">
                                            </form>
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    <?php } ?>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="index.php" class="text-body "><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <?php
              if ($quantity_item > 0) {
              ?>
                            <div class="col-lg-4 bg-body-tertiary">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Thanh Toán</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Tổng số lượng sản phẩm: <?php echo $quantity_total ?>
                                        </h5>
                                    </div>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Tổng tiền: </h5>
                                        <h5><?php echo number_format($price_total, 0, ',', '.') ?>đ</h5>
                                    </div>

                                    <a href="index.php?act=thanhtoan"><button type="button" data-mdb-button-init
                                            data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">Xác Nhận</button></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="js/custom.js"></script>
<?php } else {
                echo '<p style="font-size: 16px; font-bold: 600; text-align: center;">Giỏ hàng của bạn đang trống!</p>';
              }