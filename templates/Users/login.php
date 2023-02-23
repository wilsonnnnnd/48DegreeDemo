<?php
//session_start();
//unset($_SESSION["username"]);
//unset($_SESSION["password"]);
//
//echo 'You have cleaned session';
//header('Refresh: 2; URL = home');
//?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>48 Degrees Login page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico"/>
</head>
<br>
<section id="login">

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5" style=" margin-left: 80px">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-md-6 login-form-1">
                    <div class="card1 pb-5" >
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line "style="float: right;" ><img
                                src="https://i.imgur.com/uNGdWHi.png" class="image"></div>
                    </div>
                </div>
                <div class="col-md-6" style="margin: 70px auto;">
                    <h1 class="h4 text-gray-900 mb-4" style="margin-left:06% ">Welcome Back!</h1>
                    <?= $this
                        ->Form
                        ->create(NULL) ?>
                    <div class="form-group" style='width:300px' >
                        <?php
                        echo $this
                            ->Form
                            ->control('email', ['class' => 'form-control', 'placeholder' => 'Example@48.com','label'=>'User Email']);
                        ?>
                        <br>
                        <?php
                        echo $this
                            ->Form
                            ->control('password', ['class' => 'form-control ']);
                        ?>
                    </div>
                    <div class="form-group">
                        <?= $this
                            ->Form
                            ->button('Login', ['class' => 'btn btn-primary submit-btn btn-block', 'style' => 'background-color: #454d5ef6; width:300px;']) ?>
                </div>
            </div>
        </div>
    </div>

    <?= $this
        ->Form
        ->end() ?>
</section>

</html>
