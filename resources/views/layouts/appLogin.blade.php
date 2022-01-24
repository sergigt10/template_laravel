<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administració de la web</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('styles')

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
</head>

<style type="text/css">
    .auth .login-half-bg{
        background: url("{{ asset('images/auth/portada-login.jpg') }}");
        background-size: cover;
    }
    .content-wrapper {
        background: #fff;
        padding: 1.75rem 1.312rem;
        width: 100%;
        -webkit-flex-grow: 1;
        flex-grow: 1;
    }
    .text-primary, .list-wrapper .completed .remove{
        color: black !important;
    }
    .btn-primary:hover, .wizard > .actions a:hover{
        color: black;
        background-color: white;
        border-color: black;
    }
    .btn-primary, .wizard > .actions a{
        color: #fff;
        background-color: black;
        border-color: black;
    }
    .auth .brand-logo img{
        width: auto !important;
    }
</style>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="{{ asset('images/logo_login.png') }}" alt="logo">
                            </div>
                            <h4>Benvingut/da!</h4>
                            <h6>Zona restringida</h6>
                            <!-- Formulari -->
                            @yield('contentFormLogin')
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end"><a style="color: white" target="_blank" href="http://www.webmastervic.com/">Disseny web: Webmastervic</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>

</body>

</html>