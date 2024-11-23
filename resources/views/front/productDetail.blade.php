@extends("layouts.front.index")
@section("content")
    @include("layouts.front.partials.pageHeader")


    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="{{ asset("imageWebp/product/")."/".$product[0]["imageWebp"] }}" alt="">
                    <h1 class="text-uppercase mb-4">{{ $product[0]["name"] }}</h1>
                    <p>{!!  html_entity_decode($product[0]["description"]) !!}</p>

                    @if(isset($gallery[0]["imageWebp"]))
                    <h3>Ürüne Ait Fotoğraflar</h3>
                    <div class="row">
                        @foreach($gallery as $galleryWrite)
                            <div class="col-6 col-md-3 portfolio-item mt-4">
                                <div class="position-relative portfolio-box">
                                    <img class="img-fluid w-100" src="{{ asset("imageWebp/product/gallery/")."/".$galleryWrite->imageWebp }}" style="width: 100%;height: 250px;" alt="">
                                        <p class="h6 portfolio-title text-uppercase" style="color:#FD5D14;">{{ $galleryWrite->name }}<br></p>
                                    <a class="portfolio-btn" href="{{ asset("imageWebp/product/gallery/")."/".$galleryWrite->imageWebp }}" data-lightbox="portfolio">
                                        <i class="bi bi-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    @if(isset($information[0]["name"]))

                        <h3>Ürün Bİlgi Formu</h3>

                        <div class="col-lg-6">

                            <table class="table table-bordered table-hover table-striped">
                                @foreach($information as $informationWrite)
                                    <tr>
                                        <td>{{ $informationWrite->name }}</td>
                                        <td>{{ $informationWrite->value }}</td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    @endif

                    @if(isset($application[0]["imageWebp"]))
                        <h3>Proje Uygulamaları</h3>
                        <div class="row">
                            @foreach($application as $applicationWrite)
                                <div class="col-6 col-md-3 portfolio-item mt-4">
                                    <div class="position-relative portfolio-box">
                                        <img class="img-fluid w-100" src="{{ asset("imageWebp/product/application/")."/".$applicationWrite->imageWebp }}" style="width: 100%;height: 250px;" alt="">
                                        <a class="portfolio-btn" href="{{ asset("imageWebp/product/application/")."/".$applicationWrite->imageWebp }}" data-lightbox="portfolio">
                                            <i class="bi bi-plus text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
                <!-- Blog Detail End -->


            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Popüler ürünler</h3>
                    <div class="bg-light p-4">
                        @php $productPopular=\App\Models\product::inRandomOrder()->limit(5)->get(); @endphp
                        @foreach($productPopular as $popularWrite)
                            <div class="d-flex mb-3">
                                <img class="img-fluid" src="{{ asset("imageWebp/product/")."/".$popularWrite->imageWebp }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href="{{ route("productDetail",["id"=>$popularWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($popularWrite->name).".html"]) }}" class="h6 d-flex align-items-center bg-white text-uppercase px-3 mb-0 w-100">{{ $popularWrite->name }}</a>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- Recent Post End -->

            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->
@endsection
