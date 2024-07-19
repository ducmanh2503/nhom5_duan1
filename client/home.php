    <div class="banner_section layout_padding">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row border_1">
                            <div class="col-md-4">
                                <div class="image_1"><img src="images/img-1.png" style="width:100%"></div>
                            </div>
                            <div class="col-md-4">
                                <h1 class="banner_taital">Big Sale Offer</h1>
                                <div class="buynow_bt active"><a href="#">Buy Now</a></div>
                                <div class="contact_bt"><a href="contact.html">Contact Us</a></div>
                            </div>
                            <div class="col-md-4">
                                <div class="image_2"><img src="images/img-2.png" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row border_1">
                            <div class="col-md-4">
                                <div class="image_1"><img src="images/img-1.png" style="width:100%"></div>
                            </div>
                            <div class="col-md-4">
                                <h1 class="banner_taital">Big Sale Offer</h1>
                                <div class="buynow_bt active"><a href="#">Buy Now</a></div>
                                <div class="contact_bt"><a href="contact.html">Contact Us</a></div>
                            </div>
                            <div class="col-md-4">
                                <div class="image_2"><img src="images/img-2.png" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row border_1">
                            <div class="col-md-4">
                                <div class="image_1"><img src="images/img-1.png" style="width:100%"></div>
                            </div>
                            <div class="col-md-4">
                                <h1 class="banner_taital">Big Sale Offer</h1>
                                <div class="buynow_bt active"><a href="#">Buy Now</a></div>
                                <div class="contact_bt"><a href="contact.html">Contact Us</a></div>
                            </div>
                            <div class="col-md-4">
                                <div class="image_2"><img src="images/img-2.png" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!-- banner section end -->
    <!-- catagary section start -->
    
    <div class="catagary_section layout_padding">
        <div class="container">
            <div class="catagory_main">
                <div class="catagary_left">
                    <h2 class="categary_text">Sản Phẩm</h2>
                </div>
                <div class="catagary_right">
                    <div class="catagary_menu">
                        <?php
                            foreach ($list_categories as $category) {
                        ?>
                        <div class="category_name"><a href="#"><?php echo $category['category_name']?></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="catagary_section_2">
        <div class="container-fluid">
            <div class="row">
                <?php
                    foreach ($list_products as $product) {
                    $image_product = $img_path.$product['product_image'];
                ?>
                <div class="col-md-4">
                    <div class="box_man" style="margin: 3% 0;">
                        <div class="mobile_img"><a href="index.php?act=chitietsanpham&product_id=<?php echo $product['product_id']?>"><img src="<?php echo $image_product?>" style="max-width: 50%; max-height: auto;"></a></div>
                        <div class="cart_main">
                            <div class="cart_bt"><a href="index.php?act=chitietsanpham&product_id=<?php echo $product['product_id']?>">Add To Cart</a></div>
                            <h4 class="samsung_text"><?php echo $product['brand_name']?></h4>
                            <h6 class="rate_text"><a href="index.php?act=chitietsanpham&product_id=<?php echo $product['product_id']?>"><?php echo number_format($product['product_price'], 0, ',', '.')?>đ</a></h6>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>