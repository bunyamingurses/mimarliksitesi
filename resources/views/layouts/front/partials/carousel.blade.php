<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php $carousel=\App\Models\carousel::get(); $say=0; @endphp
            @foreach($carousel as $carouselWrite)
                @if($say==0)
                    @php $say++; @endphp
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset("imageWebp/carousel/")."/".$carouselWrite->imageWebp }}" style="max-height: 650px;" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3">
                                <h1 class="display-2 text-uppercase text-white mb-md-4">{{ $carouselWrite->title }}</h1>
                                <h1 class="display-5 text-primary">{{ $carouselWrite->description }}</h1>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset("imageWebp/carousel/")."/".$carouselWrite->imageWebp }}" style="max-height: 650px;" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3">
                                <h1 class="display-2 text-uppercase text-white mb-md-4">{{ $carouselWrite->title }}</h1>
                                <h1 class="display-5 text-primary">{{ $carouselWrite->description }}</h1>

                            </div>
                        </div>
                    </div>
                @endif

            @endforeach








        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
