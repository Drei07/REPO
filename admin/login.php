<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body class="hold-transition ">
    <script>
    start_loader()
    </script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

    html,
    body {
        height: calc(100%) !important;
        width: calc(100%) !important;
        background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
        background-size: cover;
        background-repeat: no-repeat;
        font-family: 'Poppins';
    }


    .login-title {
        text-shadow: 2px 2px black;
    }

    #login {
        flex-direction: column !important
    }

    #logo-img {
        height: 150px;
        width: 150px;
        object-fit: scale-down;
        object-position: center center;
        border-radius: 100%;
    }

    #login .col-7,
    #login .col-5 {
        width: 100% !important;
        max-width: unset !important
    }
    </style>
    <div class="h-100 d-flex align-items-center w-100" id="login">
        <div class="col-7 d-flex align-items-center justify-content-center">
            <div class="w-100">
                <center><img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="" id="logo-img"></center>
                <h1 class="text-center"><?php echo ($_settings->info('short_name')) ?></h1>
                <h2 class="text-center"><?php echo ($_settings->info('name')) ?></h1>
                    <h4 class="text-center"><?php echo ($_settings->info('address')) ?></h4>
            </div>

        </div>
        <div class="col-5 h-100 bg-gradient">
            <div class="d-flex w-100 h-50 justify-content-center align-items-center">
                <div class="card col-sm-12 col-md-6 col-lg-3 card-outline card-primary">
                    <div class="card-header">
                        <h4 class="text-purle text-center"><b>Login</b></h4>
                    </div>
                    <div class="card-body">
                        <form id="login-frm" action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" autofocus name="username"
                                    placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- /.col -->

                                <button type="submit" class="btn btn-primary w-100">Sign In</button>

                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script>
    $(document).ready(function() {
        end_loader();
    })
    </script>
</body>

</html>