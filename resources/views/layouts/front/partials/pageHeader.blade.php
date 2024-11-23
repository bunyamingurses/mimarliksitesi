
@php
    $routeNamePage=request()->route()->getName();
@endphp
@if($routeNamePage=="about" || $routeNamePage=="aboutHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Hakkımda</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Hakkımda</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="mission" || $routeNamePage=="missionHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Misyon</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Misyon</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="vision" || $routeNamePage=="visionHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Vizyon</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Vizyon</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="product" || $routeNamePage=="productHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Ürünler</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Ürünler</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="productDetail")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Ürün Bilgisi</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Ürün Bilgisi</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="service" || $routeNamePage=="serviceHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Hizmetler</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Hizmetler</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="" || $routeNamePage=="")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">About</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">About</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="project" || $routeNamePage=="projectHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Projeler</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Projeler</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="projectDetail")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">Proje Bilgisi</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">Proje Bilgisi</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="contact" || $routeNamePage=="contactHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">İletişim</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">İletişim</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@elseif($routeNamePage=="pdfCatalog" || $routeNamePage=="pdfCatalogHtml")
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="background: linear-gradient(rgba(4, 15, 40, .7), rgba(4, 15, 40, .7)), url({{ asset("assets/frontAssets/")."/img/carousel-1.jpg" }}) center center no-repeat;">
        <h1 class="display-3 text-uppercase text-white mb-3">PDF Katalogları</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a href="{{ route("indexHtml") }}">Anasayfa</a></h6>
            <h6 class="text-white m-0 px-3">/</h6>
            <h6 class="text-uppercase text-white m-0">PDF Katalogoları</h6>
        </div>
    </div>
    <!-- Page Header Start -->

@endif
