@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Profil Formu</h1>
        </div>
        <form action="{{ route("admin.profile.update") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label class="control-label col-lg-12" for="foto"> Kullanıcı Adı
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" id="username" name="username" value="{{ @$profile[0]["username"] }}"
                           class="form-control col-lg-12">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label class="control-label col-lg-12" for="siteUrl">Mevcut Parola
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" id="oldPassword" name="oldPassword" required="required"
                           class="form-control col-lg-12"
                           placeholder="Lütfen Mevcut Parola Girin.!">
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label class="control-label col-lg-12" for="siteUrl">Yeni Parola
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" id="password" name="password" required="required"
                           class="form-control col-lg-12"
                           placeholder="Lütfen Yeni Parola Girin.!">
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label class="control-label col-lg-12" for="siteTitle">Yeni Parola Tekrar
                        <span class="required">*</span>
                    </label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" id="passwordRepeat" name="passwordRepeat" required="required"
                           class="form-control col-lg-12"
                           placeholder="Lütfen Yeni Parola'yı Tekrar Girin.!">
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">

                    <button type="submit" class="btn btn-primary">Profil Bilgisi Güncelle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
