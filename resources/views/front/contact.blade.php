@extends("layouts.front.index")
@section("content")
    @include("layouts.front.partials.pageHeader")


    <!-- Contact Start -->
    <div class="container py-6">
        <div class="text-center mb-5">
            <h1 class="display-5 text-uppercase mb-4"><span class="text-primary">Sorunuz Mu Var?</span><br>Lütfen Bizimle İletişime Geçin</h1>
            @if(session("status"))
                <div class="alert alert-primary"> {{ session("status") }}</div>
            @endif
        </div>
        <div class="col-lg-12">
            <div class="contact-form bg-light p-5">
                <form action="{{ route("contactPost") }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" name="name" class="form-control border-0" placeholder="Adınızı Belirtin!" style="height: 55px;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" name="email" class="form-control border-0" placeholder="E-Posta Adresnizi Belirtin!" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <input type="text" name="subject" class="form-control border-0" placeholder="Konu'yu Belirtin!" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0" name="message" rows="4" placeholder="Mesajınızı Belirtin!"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Mesaj Gönder <span class="fa fa-plus-circle"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
