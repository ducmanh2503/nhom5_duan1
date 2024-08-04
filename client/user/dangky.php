<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Đăng Ký</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    
    <div class="main-wrapper">
        
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark"style="height:100vh;">
                        
            <div class="auth-box bg-dark border-secondary">
                <div>
                    <div class="text-center p-t-20 p-b-20 mb-3">
                        <span class="db">
                            <h3 style="color:white;">Đăng Ký</h3>
                        </span>
                        
                    </div>
                    <!-- Form -->
                    <form action="index.php?act=dangky" method="POST" class="form-horizontal m-t-20"
                        action="index.html">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i
                                                class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Tên Tài Khoản"
                                        name="user" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i
                                                class="ti-email"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Địa Chỉ Email"
                                        name="email" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i
                                                class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Mật Khẩu"
                                        name="pass" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i
                                                class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg"
                                        placeholder=" Xác Nhận Mật Khẩu" aria-label="Password" name="confirmpass"
                                        aria-describedby="basic-addon1" required>
                                </div>



                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i
                                                class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Số điện thoại"
                                        name="phone" aria-describedby="basic-addon1" required>
                                </div>



                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i
                                                class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder=" Địa chỉ"
                                        name="address" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div style="margin-top: 16px" class="p-t-20">
                                        <input class="btn btn-block btn-lg btn-info" value="Đăng Ký" name="dangky"
                                            type="submit">

                                    </div>
                                   
                                    <?php
                                    
                                        if(isset($thongbao)){
                                            echo $thongbao;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <a href="index.php" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Back to
                            home</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
   
    </div>
    
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    </script>
    
</body>

</html>