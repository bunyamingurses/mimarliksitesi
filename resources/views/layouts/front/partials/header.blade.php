<!DOCTYPE html>
<html lang="tr">

<head>
    <!-- Favicon -->
    <link href="{{ asset("image/setting/")."/".\App\Models\setting::getSetting("logoHeader") }}" rel="icon">
    <title>{{ \App\Models\setting::getSetting("title") }}</title>
    <meta name="format-detection" content="telephone={{ \App\Models\setting::getSetting("phoneNumber") }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ \App\Models\setting::getSetting("description") }}"/>
    <meta http-equiv="cache-control" content="public"/>
    <meta name="copyright" content="{{ \App\Models\setting::getSetting("siteUrl") }}"/>
    <meta name="author" content="{{ \App\Models\setting::getSetting("author") }}"/>
    <meta name="publisher" content="www.ustaogluyapimimarlik.com Türkiyenin Önde Gelen Mimarlık Firmalarından."/>
    <meta name="distribution" content="Global"/>
    <meta name="robots" content="INDEX,FOLLOW"/>


    <meta property="og:type" content="website"/>
    <meta property="og:url"
          content="{{ \App\Models\setting::getSetting("siteUrl") }}"/>
    <meta property="og:image" content="{{ asset("image/setting/")."/".\App\Models\setting::getSetting("logoHeader") }}"/>
    <meta property="og:site_name" content="{{ \App\Models\setting::getSetting("title") }}"/>
    <meta property="og:description" content="{{ \App\Models\setting::getSetting("description") }}"/>
    <meta property="og:locale" content="tr_TR"/>
    <meta property="og:title" content="{{ \App\Models\setting::getSetting("title") }}"/>

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ \App\Models\setting::getSetting("siteUrl") }}">
    <meta property="twitter:title" content="{{ \App\Models\setting::getSetting("title") }}">
    <meta property="twitter:description" content="{{ \App\Models\setting::getSetting("description") }}">
    <meta property="twitter:image" content="{{ asset("image/setting/")."/".\App\Models\setting::getSetting("logoHeader") }}">









    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset("assets/frontAssets/lib/owlcarousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/frontAssets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.cs") }}s" rel="stylesheet" />
    <link href="{{ asset("assets/frontAssets/lib/lightbox/css/lightbox.min.css") }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset("assets/frontAssets/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset("assets/frontAssets/css/style.css") }}" rel="stylesheet">

    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .float2{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#ff0000;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }


        .my-float{
            margin-top:16px;
        }
    </style>

</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid px-5 d-none d-lg-block">
    <div class="row gx-5">
        <div class="col-lg-4 text-center py-3">
            <div class="d-inline-flex align-items-center">
                <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase fw-bold">Adresimiz</h6>
                    <span>{{ \App\Models\setting::getSetting("address") }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center border-start border-end py-3">
            <div class="d-inline-flex align-items-center">
                <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase fw-bold">Email Us</h6>
                    <span>{{ \App\Models\setting::getSetting("email") }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center py-3">
            <div class="d-inline-flex align-items-center">
                <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase fw-bold">Call Us</h6>
                    <span>{{ \App\Models\setting::getSetting("phoneNumber") }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<a href="https://www.google.com/maps/search/?api=1&query=40.987710,29.252557" class="float2" style="margin-bottom: 80px;" target="_blank">
    <i class="fa fa-map-marked-alt my-float"></i>
</a>

<a href="https://api.whatsapp.com/send?phone=+9{{ \App\Models\setting::getSetting("phoneNumber") }}" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>


<!-- Navbar Start -->
<div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
    <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
        <a href="{{ route("indexHtml") }}" class="navbar-brand">
            <img src="{{ asset("/imageWebp/setting/")."/".\App\Models\setting::getSetting("logoHeaderWebp") }}" width="200px" alt="">



{{--            <h1 class="m-0 display-4 text-uppercase text-white"><i class="bi bi-bricks text-primary me-2"></i>USTAOĞLU</h1>--}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            @php $routeName=request()->route()->getName(); @endphp
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route("indexHtml") }}" class="nav-item nav-link   @if($routeName=="indexHtml" || $routeName=="index" || $routeName=="default") active @endif ">Anasayfa</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @if($routeName=="about" || $routeName=="aboutHtml" || $routeName=="mission" || $routeName=="missionHtml" || $routeName=="visionHtml" || $routeName=="vision") active @endif" data-bs-toggle="dropdown">Kurumsal</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route("aboutHtml") }}" class="dropdown-item @if($routeName=="about" || $routeName=="aboutHtml") active @endif">Hakkımda</a>
                        <a href="{{ route("missionHtml") }}" class="dropdown-item @if($routeName=="mission" || $routeName=="missionHtml") active @endif">Misyon</a>
                        <a href="{{ route("visionHtml") }}" class="dropdown-item @if($routeName=="vision" || $routeName=="visionHtml") active @endif">Vizyon</a>
                    </div>
                </div>
                <a href="{{ route("productHtml") }}" class="nav-item nav-link @if($routeName=="product" || $routeName=="productHtml") active @endif">Ürünler</a>
                <a href="{{ route("serviceHtml") }}" class="nav-item nav-link @if($routeName=="service" || $routeName=="serviceHtml") active @endif">Hizmetler</a>
                <a href="{{ route("projectHtml") }}" class="nav-item nav-link @if($routeName=="project" || $routeName=="projectHtml") active @endif">Projeler</a>
                <a href="{{ route("contactHtml") }}" class="nav-item nav-link @if($routeName=="contact" || $routeName=="contactHtml") active @endif">İletişim</a>
                <a href="{{ route("pdfCatalogHtml") }}" class="nav-item nav-link bg-primary text-white px-2 ">PDF Katalogları <i class="fa fa-file-pdf"></i></a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
