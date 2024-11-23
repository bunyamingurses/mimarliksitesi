@php $service=\App\Models\services::inRandomOrder()->limit(6)->get(); @endphp
<!-- Services Start -->
<div class="container-fluid bg-light py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5">
            <h1 class="display-1 text-uppercase text-primary"> HİZMETLERİMİZ
                <hr style="height: 5px; box-shadow: 0px 0px 10px 2px;">
            </h1>
        </div>
        <div class="col-lg-12">
            <div class="row">


                @foreach($service as $serviceWrite)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                            <img class="img-fluid" src="{{ asset("imageWebp/service/")."/".$serviceWrite->imagesWebp }}" style="width: 100%; max-height: 250px;" alt="">

                            <div class="px-4 pb-4 mt-4">
                                <h4 class="text-uppercase mb-3">{{ $serviceWrite->title }}</h4>
                                <p>{{ $serviceWrite->text }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
<!-- Services End -->
