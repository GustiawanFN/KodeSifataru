<!doctype html>
<html lang="en">

<head>
    <title>Kode Sifataru</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

   

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- DATE PICKER -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />

    <!-- DATA TABLES -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/color_skins.css">
</head>

<body class="theme-cyan">
    <div id="wrapper">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>

                <div class="navbar-brand">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/lumer.png" alt="Kode Sifataru" class="img-responsive logo"></a>
                </div>

                <div class="navbar-right">
                               

                    <!-- Menu item atas -->
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">

                            <li>
                                <a href="<?php echo base_url(); ?>index.php/page/logout" class="icon-menu"><i class="icon-login"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div id="left-sidebar" class="sidebar">
            <div class="sidebar-scroll">
                <div class="user-account">
                    <img src="<?php echo base_url(); ?>assets/images/users.png" class="rounded-circle user-photo" alt="User Profile Picture">
                    <div class="dropdown">
                        <span>Hallo,</span>
                        <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong> <?php echo $this->session->userdata("nama"); ?></strong></a>
                        <ul class="dropdown-menu dropdown-menu-right account">
                           
                            <li><a href="<?php echo base_url(); ?>index.php/page/logout"><i class="icon-power"></i>Logout</a></li>
                        </ul>
                    </div>
                    <hr>

                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-l-0 p-r-0">
                    <div class="tab-pane active" id="menu">
                        <nav id="left-sidebar-nav" class="sidebar-nav">
                            <ul id="main-menu" class="metismenu">
                                <li <?php
                                    if ($this->uri->segment(2) == 'index') {
                                        echo 'class="active"';
                                    }
                                    ?>>
                                    <a href="#Dashboard" class="has-arrow"><i class="icon-home"></i> <span>Dashboard</span></a>
                                    <ul>
                                        <li <?php
                                            if ($this->uri->segment(2) == 'index') {
                                                echo 'class="active"';
                                            }
                                            ?>><a href="<?php echo base_url(); ?>index.php/page/index">Home</a></li>

                                    </ul>
                                </li>


                              
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php
    $page_name .= "";
    include $page_name;
    ?>
    </div>
    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/bundles/libscripts.bundle.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/bundles/vendorscripts.bundle.js"></script>


    <script type="text/javascript" src="<?php echo base_url(); ?>asset/bundles/mainscripts.bundle.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/pages/forms/advanced-form-elements.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.js' ?>"></script>

    <script type="text/javascript">
        /*toastr.options = {
		  "closeButton": false,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}*/
        <?php if ($this->session->flashdata('a')) {
            ?>
        toastr.success("<?php echo $this->session->flashdata('a'); ?>");

        <?php } else if ($this->session->flashdata('s')) {
            ?>
        toastr.error("<?php echo $this->session->flashdata('s'); ?>");
        <?php } ?>
    </script>


</body>

</html>