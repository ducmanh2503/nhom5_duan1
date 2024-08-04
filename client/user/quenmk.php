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
    <div class="main-wrapper d-flex justify-content-center align-items-center mt-5 mb-5 ">
        <div style="width: 40%;">
            <div>
                <div class="mb-3"><h3>Quên mật khẩu</h3></div>
                <div>
                    <div id="recoverform">
                        <div class="row justify-content-center align-items-center">
                            <!-- Form -->
                            <form class="col-12" action="index.php?act=laylaimk" method="POST">
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1">
                                            <i class="ti-email"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg"
                                        placeholder="Email Address" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                                <!-- pwd -->
                                <div class="row mt-4 pt-3 border-top border-secondary">
                                    <div class="col-12">
                                        <a class="btn btn-success" href="index.php" id="to-login" name="action">Trở về
                                            Trang Chủ</a>
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
                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    
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
