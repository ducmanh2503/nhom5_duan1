<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        .auth-box {
            width: 100%;
            max-width: 400px; 
            padding: 20px;
            margin: 0 auto;
        }

        .alert {
            width: 100%;
            max-width: 400px;
            margin: 0 auto 15px auto;
        }
    </style>
<body>
    <div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark" style="height:100vh">
            <div class="auth-box bg-dark border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <h3 style="color:white;">Đăng Nhập</h3>
                    </div>
                    <?php if (isset($thongbao) && $thongbao != ""): ?>
                        <div class="alert alert-danger">
                            <?php echo $thongbao; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form class="form-horizontal m-t-20" method="POST" id="loginform" action="index.php?act=dangnhap">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">
                                            <i class="ti-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="user" class="form-control form-control-lg"
                                           placeholder="Tên Tài Khoản" aria-label="Username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2">
                                            <i class="ti-pencil"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="pass" class="form-control form-control-lg"
                                           placeholder="Mật Khẩu" aria-label="Password" aria-describedby="basic-addon2" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div style="margin-top: 16px" class="p-t-20">
                                        <a href="index.php?act=laylaimk">
                                            <button class="btn btn-info" id="to-recover" type="button">
                                                <i class="fa fa-lock m-r-5"></i> Quên Mật Khẩu?
                                            </button>
                                        </a>
                                        <input name="dangnhap" value="Đăng Nhập" class="btn btn-success float-right" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">
                            Back to home
                        </a>
                    </form>
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
        $('#to-recover').on("click", function () {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function () {
            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>
</body>
