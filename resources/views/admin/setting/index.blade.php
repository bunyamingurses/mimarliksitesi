@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Site Bilgileri Formu</h1>
        </div>
        <form action="{{ route("admin.setting.update",["id"=>1]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site İkon</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("image/setting/")."/".$setting[0]["icon"] }}" width="200px" alt="">
                    <input type="file" class="form-control" id="icon" name="icon" aria-describedby="icon">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Üst Logo</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageWebp/setting/")."/".$setting[0]["logoHeaderWebp"] }}" width="200px" alt="">
                    <input type="file" class="form-control" id="logoHeader" name="logoHeader" aria-describedby="logoHeader">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Alt Logo</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageWebp/setting/")."/".$setting[0]["logoFooterWebp"] }}" width="200px" alt="">
                    <input type="file" class="form-control" id="logoFooter" name="logoFooter" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Url</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteUrl" name="siteUrl" value="{{ $setting[0]["siteUrl"] }}" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Title</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteTitle" name="siteTitle" value="{{ $setting[0]["title"] }}" aria-describedby="title">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Description</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteDescription" name="siteDescription" value="{{ $setting[0]["description"] }}" aria-describedby="description">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Keyword</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteKeyword" name="siteKeyword" value="{{ $setting[0]["keyword"] }}" aria-describedby="keyword">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Author(Sahibi)</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteAuthor" name="siteAuthor" value="{{ $setting[0]["author"] }}" aria-describedby="author">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Telefon Numarası</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="sitePhoneNumber" name="sitePhoneNumber" value="{{ $setting[0]["phoneNumber"] }}" aria-describedby="phoneNumber">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">E-Posta Adresi</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="siteEmail" name="siteEmail" value="{{ $setting[0]["email"] }}" aria-describedby="email">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Şirket Adresi</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="address" name="address" value="{{ $setting[0]["address"] }}" aria-describedby="address">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Facebook</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $setting[0]["facebook"] }}" aria-describedby="facebook">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Twitter</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $setting[0]["twitter"] }}" aria-describedby="twitter">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">İnstagram</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $setting[0]["instagram"] }}" aria-describedby="instagram">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Linkedin</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $setting[0]["linkedin"] }}" aria-describedby="linkedin">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Ayarları Kaydet <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
