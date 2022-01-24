<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Administració de la web</title>

    <!-- Scripts -->
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <?php echo $__env->yieldContent('styles'); ?>

    <!-- Styles -->
    <!-- <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/vendor.bundle.addons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vertical-layout-light/style.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.php"><img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo e(asset('images/logo-mini.svg')); ?>" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav navbar-nav-left">
                    <a href="http://www.techdrone.es" target="_blank" style="color:black">Veure pàgina web</a>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">Administrator</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-primary"></i>
                            Tancar sessió
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div id="right-sidebar" class="settings-panel"></div>
            <!-- NAVBAR INICI -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('noticias.index')); ?>">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">
                                Inici
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#general-pages" <?php echo (strpos($_SERVER['REQUEST_URI'] ,"blogs") !== false) ? 'aria-expanded="true"' : 'aria-expanded="false"'; ?> aria-controls="general-pages">
                            <i class="mdi mdi-table-edit  menu-icon"></i>
                            <span class="menu-title">Blog</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div <?php echo (strpos($_SERVER['REQUEST_URI'] ,"blogs") !== false) ? 'class="collapse show"' : 'class="collapse"'; ?> id="general-pages">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> 
                                    <a class="nav-link" href="<?php echo e(route('noticias.create')); ?>">
                                        Inserir
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> 
                                    <a class="nav-link" href="<?php echo e(route('noticias.index')); ?>">
                                        Modificar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- NAVBAR FI -->

            <!-- <?php if(session('estado')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('estado')); ?>

                </div>
            <?php endif; ?> -->

            <?php echo $__env->yieldContent('content'); ?>
            
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Disseny web: <a style="color: black;" target="_blank" href="https://www.webmastervic.com" target="_blank">Webmastervic</a></span>
                </div>
            </footer>
        </div>
    </div>
</div>
    <script src="<?php echo e(asset('vendors/js/vendor.bundle.base.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/js/vendor.bundle.addons.js')); ?>"></script>
    <script src="<?php echo e(asset('js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('js/template.js')); ?>"></script>
    <script src="<?php echo e(asset('js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('js/todolist.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Sergi\Desktop\codi\laravel\LARAVEL UDEMY\practica\noticias\resources\views/layouts/app.blade.php ENDPATH**/ ?>