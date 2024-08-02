<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    

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
    <!-- <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
  /> -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.php">
                    
                        <img src="images/LOGO SHOP.png" alt="" style="width: 100%; height: 3vw;">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=sanpham">
                                Shop
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=danhmuc">
                                Danh mục
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=testimonial">
                                Testimonial
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=contact">Contact Us</a>
                        </li>
                    </ul>
                    <div class="user_option">


                        <ul>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        Login
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <?php if(isset($_SESSION['account'])): ?>
                                    <a class="dropdown-item bg-info text-white" href="index.php?act=update_taikhoan">Cập
                                        Nhật Tài Khoản</a>
                                    <?php if($_SESSION['account']['role_id'] == 1): ?>
                                    <a class="dropdown-item bg-info text-white" href="admin/index.php">Đăng Nhập
                                        Admin</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item bg-info text-white" href="index.php?act=tracuu">Tra cứu đơn hàng</a>
                                    <a class="dropdown-item bg-info text-white" href="index.php?act=laylaimk">Quên Mật
                                        Khẩu</a>
                                    <a class="dropdown-item bg-info text-white" href="client/user/logout.php">Đăng
                                        Xuất</a>
                                    <?php else: ?>
                                    <a class="dropdown-item bg-info text-white" href="index.php?act=dangnhap">Đăng
                                        Nhập</a>
                                    <a class="dropdown-item bg-info text-white" href="index.php?act=dangky">Đăng Ký</a>
                                    <?php endif; ?>
                                </div>
                            </li>



                        </ul>

                        <a href="index.php?act=cart">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        </a>
                        <form action="index.php?act=tim_kiem" method="post" class="form-inline ">
                            <input type="text" name="tim_kiem" placeholder="Nhập vào để tìm kiếm">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input type="search" name="search">
                                <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>

                        
                    </div>
                </div>
            </nav>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section">
            <div class="slider_container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Chào mừng đến với MVT Shop
                                            </h1>
                                            <p>
                                                Nơi đây, bạn có thể tha hồ lựa chọn những sản phẩm mà mình yêu thích với
                                                vô vàn các sản phẩm đa
                                                dạng như Laptop, Case, Màn Hình, Bàn Phím, ... .
                                            </p>
                                            <a href="index.php?act=contact">
                                                Liên hệ với chúng tôi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <a href="index.php?act=chitietsanpham&product_id=145"><img
                                                    src="images/case/pc1.1.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Sản phẩm đang được bán chạy <br>
                                                Tại cửa hàng
                                            </h1>
                                            <p>
                                                Còn chần chờ gì nữa mà không nhấn thêm ngay vào giỏ hàng nào.
                                            </p>
                                            <a href="index.php?act=contact">
                                                Liên hệ với chúng tôi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <a href="index.php?act=chitietsanpham&product_id=139"><img
                                                    src="images/Loa/Razer Leviathan V2 X (3).jpg" alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Giảm ngay 30% và miễn phí giao hàng khi đăng ký thành viên của MVT Shop
                                                <br>
                                                Đăng ký ngay thôi!
                                            </h1>
                                            <p>
                                                Tha ga mua sắm, không lo về giá.
                                            </p>
                                            <a href="index.php?act=contact">
                                                Liên hệ với chúng tôi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <a href="index.php?act=chitietsanpham&product_id=143"><img
                                                    src="images/laptop/lt3.3.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_btn-box">
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <img src="images/line.png" alt="" />
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- end slider section -->
    </div>
    <!-- end hero area -->