<!-- About Start -->
<div class="container-fluid py-6 px-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                @php $about=\App\Models\about::get(); @endphp
                <h1 class="display-5 text-uppercase mb-4">USTAOĞLU <span class="text-primary">YAPI VE MİMARLIK</span> </h1>
                <p>{{ $about[0]["about"] }}</p>
                <div class="row gx-5 py-2">
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Mükemmel Planlama</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Profesyonel Çalışanlar</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>İlk Çalışma Süreci</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 pb-5" style="min-height: 400px;">
                <div class="position-relative bg-dark-radial h-100 ms-5">
                    <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="{{ asset("imageWebp/setting/")."/".$about[0]["aboutImageWebp"] }}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
