<?php
$product_image = $img_path . $product['product_image'];
?>
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                        href="<?php echo $product_image ?>">
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                            src="<?php echo $product_image ?>" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <?php
                    foreach ($gallery_img as $img) {
                        $img_g = $img_path . $img['images'];
                    ?>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                        href="<?php echo $img_g ?>" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="<?php echo $img_g ?>" />
                    </a>
                    <?php } ?>
                </div>
                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        <?php echo $product['product_name'] ?>
                    </h4>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                                4.5
                            </span>
                        </div>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                        <span class="text-success ms-2">In stock</span>
                    </div>

                    <div class="mb-3">
                        <span class="h5">
                            <?php echo number_format($product['product_price'], 0, ',') ?>đ
                        </span>
                    </div>

                    <p>
                        <?php echo $product['product_describe'] ?>
                    </p>
                    <form action="index.php?act=add_cart" method="post">
                        <div class="row">
                            <dt class="col-3">Thương Hiệu:</dt>
                            <dd class="col-9">
                                <?php echo $product['brand_name'] ?>
                            </dd>

                            <dt class="col-3">Đổi trả:</dt>
                            <dd class="col-9">
                                Trong vòng 7 ngày
                            </dd>

                            <dt class="col-3">Màu Sắc</dt>
                            <dd class="col-9">
                            <?php echo $product['color_name']?>
                        </dd>
                        </div>

                        <hr />
                        <div class="row mb-4">
                            <div class="col-md-4 col-6 mb-3">
                                <label class="mb-2 d-block">Số Lượng</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                                    <input type="hidden" value="<?php echo $product['quantity'] ?>">
                                    <input type="hidden" name="price_sale" value="<?php echo $product['price_sale'] ?>">
                                    <input type="hidden" name="color_id" value="<?php echo $product['color_id'] ?>">
                                    <input type="number" class="form-control text-center border border-secondary"
                                        min="1" max="4" value="1" name="quantity"
                                        aria-label="Example text with button addon" aria-describedby="button-addon1" />
                                </div>
                            </div>
                        </div>
                        <!-- <a href="index.php?act=add_cart&product_id=" class="btn btn-warning shadow-0"> Mua ngay </a> -->
                        <?php
                        if (!$product['quantity'] <= 0) {
                        ?>
                        <input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary shadow-0" name="btn_add">
                        <?php } else { ?>
                        <em style="color: #d0021b;font-size: 32px; font-weight: 600;">Hết hàng</em>
                        <?php } ?>
                        <!-- <a href="index.php?act=add_cart&product_id=" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Thêm vào giỏ hàng </a> -->
                        <!-- <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i
              class="me-1 fa fa-heart fa-lg"></i> Yêu thích </a> -->
                </div>
                </form>
            </main>
        </div>
    </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
    <div class="container">
        <div class="row gx-4">
            <div class="col-lg-8 mb-4">
                <div class="border rounded-2 px-3 py-2 bg-white">
                    <!-- Pills navs -->

                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                            aria-labelledby="ex1-tab-1">



                            <?php
                            extract($product);
                            ?>
                            <h3>Bình luận</h3>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
                            </script>
                            <script>
                            $(document).ready(function() {
                                $("#binhluan").load("client/binhluan/formbinhluan.php", {
                                    product_id: <?= $product_id ?>
                                });
                            });
                            </script>
                            <div id="binhluan"></div>


                        </div>
                    </div>
                    <!-- Pills content -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="px-0 border rounded-2 shadow-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sản phẩm cùng loại</h5>
                            <?php
                            foreach ($listProduct_sameType as $product_sameType) {
                                $img_prst = $img_path . $product_sameType['product_image'];
                            ?>
                            <div class="d-flex mb-3">
                                <a href="index.php?act=chitietsanpham&product_id=<?php echo $product_sameType['product_id'] ?>"
                                    class="me-3">
                                    <img src="<?php echo $img_prst ?>" style="min-width: 96px; height: 96px;"
                                        class="img-md img-thumbnail" />
                                </a>
                                <div class="info">
                                    <a href="index.php?act=chitietsanpham&product_id=<?php echo $product_sameType['product_id'] ?>"
                                        class="nav-link mb-1">
                                        <?php echo $product_sameType['product_name'] ?>
                                    </a>
                                    <strong
                                        class="text-dark"><?php echo number_format($product_sameType['product_price'], 0, ',', '.') ?>đ</strong>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>