@php $project=\App\Models\project::inRandomOrder()->limit(8)->get(); @endphp
    <!-- Portfolio Start -->
<div class="container-fluid bg-light py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5">
            <h1 class="display-1 text-uppercase mb-4 text-primary text-center">PROJELERİMİZ
                <hr style="height: 5px; box-shadow: 0px 0px 10px 2px;">
            </h1>
        </div>

        <div class="row ">
            @foreach($project as $projectWrite)
                <div class="col-xl-3 col-lg-6 col-md-6 portfolio-item mt-4">
                    <div class="position-relative portfolio-box">
                        <img class="img-fluid w-100" src="{{ asset("imageWebp/project/")."/".$projectWrite->imageWebp }}" style="width: 100%;height: 250px;" alt="">
                        <a class="portfolio-title shadow-sm" href="{{ route("projectDetail",["id"=>$projectWrite->id,"name"=>\App\Http\Controllers\support\functionController::seo($projectWrite->title).".html"]) }}">
                            <p class="h6 text-uppercase" style="color:#FD5D14;">{{ $projectWrite->title }}<br></p>
                        </a>
                        <a class="portfolio-btn" href="{{ asset("imageWebp/project/")."/".$projectWrite->imageWebp }}" data-lightbox="portfolio">
                            <i class="bi bi-plus text-white"></i>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Portfolio End -->
