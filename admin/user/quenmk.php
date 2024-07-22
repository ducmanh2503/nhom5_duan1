<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Đăng Nhập</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>



        <div>
            <div>
                <div>
                    <div>Quên Mật Khẩu</div>
                    <div>
                        <div id="recoverform">
                            <div class="text-center">
                                <span class="text-white">Nhập địa chỉ email của bạn bên dưới và chúng tôi sẽ gửi cho bạn
                                    hướng
                                    dẫn cách khôi phục mật khẩu.</span>
                            </div>
                            <div class="row m-t-20">
                                <!-- Form -->
                                <form class="col-12" action="index.php?act=laylaimk" method="POST">
                                    <!-- email -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-danger text-white" id="basic-addon1"><i
                                                    class="ti-email"></i></span>
                                        </div>
                                        <input type="text" name="email" class="form-control form-control-lg"
                                            placeholder="Email Address" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <!-- pwd -->
                                    <div class="row m-t-20 p-t-20 border-top border-secondary">
                                        <div class="col-12">
                                            <a class="btn btn-success" href="index.php?act=dangnhap" id="to-login"
                                                name="action">Trở về Đăng
                                                Nhập</a>
                                            <input class="btn btn-info float-right" name="gui" value="Khôi Phục"
                                                type="submit" name="action">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h2>
                            <?php
                     if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                     }
                ?></h2>
                    </div>

                </div>

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function() {

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>

</body>