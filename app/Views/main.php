<!DOCTYPE html>
<html lang="id">

<?php
if (session()->get('userLevel') == 1 || session()->get('userLevel') == 2 || session()->get('userLevel') == 3) {
    $nama = session()->get('nama');
} else {
    $nama = session()->get('userNama');
}
?>

<head>
    <title>Si Hera</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url(); ?>\frontend\images\logo.png" type="image/x-icon">
    <!-- Google font-->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"> -->
    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/bower_components/summernote/summernote-bs4.min.css">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>\assets\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>\assets\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>\assets\css\jquery.mCustomScrollbar.css">
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= base_url(); ?>\bower_components\jquery\js\jquery.min.js"></script>
    <!-- owl carousel css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>\bower_components\owl.carousel\css\owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>\bower_components\owl.carousel\css\owl.theme.default.css">

    <!-- TinyMCE Textarea Editor -->
    <script src="https://cdn.tiny.cloud/1/puxzj2mry7rl9e0ej58dphtu7zhazgwqn37arh75k9jzhxx9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor'
        });
    </script>
</head>

<body>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="<?= base_url('/Home') ?>">
                            <img class="img-fluid" width="10%" height="10%" src="<?= base_url(); ?>\landing\images\logo.png" alt="Theme-Logo">
                            <span>Si Hera</span>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?= base_url(); ?>\landing\images\logo.png" class="img-radius" alt="User-Profile-Image">
                                        <span><?= $nama ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a data-toggle="modal" data-target="#editProfile">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="modal" data-target="#changePassword">
                                                <i class="feather icon-lock"></i> Change Password
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('logout') ?>">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <?= $this->include('sidebar'); ?>
                        </div>
                    </nav>
                    <?= $this->rendersection('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile -->
    <form action="<?= base_url('update-profile') ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="modal made" tabindex="-1" id="editProfile" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update profile</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= session()->get('userId') ?>" name="id" required />
                        <input type="text" readonly class="form-control" value="<?= session()->get('userEmail') ?>" autocomplete="off" /> <br>
                        <input type="text" class="form-control" value="<?= session()->get('userNama') ?>" autocomplete="off" name="nama" placeholder="Name" required /> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Change Password -->
    <form action="<?= base_url('change-password') ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="modal made" tabindex="-1" id="changePassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Change Password</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= session()->get('userId') ?>" name="id" required />
                        <input type="password" class="form-control" autocomplete="off" name="password" placeholder="New Password" required /> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Change Password</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript" src="<?= base_url(); ?>\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url(); ?>\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url(); ?>\bower_components\summernote\summernote-bs4.min.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url(); ?>\bower_components\modernizr\js\modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?= base_url(); ?>\bower_components\chart.js\js\Chart.js"></script>
    <!-- Data table -->
    <script src="<?= base_url(); ?>\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>\assets\pages\data-table\js\jszip.min.js"></script>
    <script src="<?= base_url(); ?>\assets\pages\data-table\js\pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>\assets\pages\data-table\js\vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <!-- amchart js -->
    <script src="<?= base_url(); ?>\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="<?= base_url(); ?>\assets\pages\widget\amchart\serial.js"></script>
    <script src="<?= base_url(); ?>\assets\pages\widget\amchart\light.js"></script>
    <script src="<?= base_url(); ?>\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>\assets\js\SmoothScroll.js"></script>
    <script src="<?= base_url(); ?>\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="<?= base_url(); ?>\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>\assets\js\script.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <!-- owl carousel 2 js -->
    <script type="text/javascript" src="<?= base_url() ?>\bower_components\owl.carousel\js\owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>\assets\js\owl-custom.js"></script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
        });
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker();
        });
        $('#simpletable').DataTable({
            responsive: true
        });

        $('#simpletablemodal').DataTable({
            responsive: true
        });

        $('#simpletablemodaltwo').DataTable({
            responsive: true
        });
    </script>

</body>

</html>