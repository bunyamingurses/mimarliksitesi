@extends("layouts.front.index")
@section("content")

    @include("layouts.front.partials.pageHeader")

    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="{{ asset("imageWebp/project/")."/".$project[0]["imageWebp"] }}" alt="">
                    <h1 class="text-uppercase mb-4">{{ $project[0]["title"] }}</h1>
                    <p>{!!  html_entity_decode($project[0]["description"]) !!}</p>

                    @if(isset($gallery[0]["imageWebp"]))
                        <h3>Projeye Ait Fotoğraflar</h3>
                        <div class="row">
                            @foreach($gallery as $galleryWrite)
                                <div class="col-6 col-md-3 portfolio-item mt-4">
                                    <div class="position-relative portfolio-box">
                                        <img class="img-fluid w-100" src="{{ asset("imageWebp/project/images/")."/".$galleryWrite->imageWebp }}" style="width: 100%;height: 250px;" alt="">
                                        <a class="portfolio-btn" href="{{ asset("imageWebp/project/images/")."/".$galleryWrite->imageWebp }}" data-lightbox="portfolio">
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
                        @php $projectPopular=\App\Models\project::inRandomOrder()->limit(5)->get(); @endphp
                        @foreach($projectPopular as $popularWrite)
                            <div class="d-flex mb-3">
                                <img class="img-fluid" src="{{ asset("imageWebp/project/")."/".$popularWrite->imageWebp }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href="{{ route("projectDetail",["id"=>$popularWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($popularWrite->name).".html"]) }}" class="h6 d-flex align-items-center bg-white text-uppercase px-3 mb-0 w-100">{{ $popularWrite->title }}</a>
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
