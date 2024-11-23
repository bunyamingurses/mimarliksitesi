@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Site Hakkımda Formu</h1>
        </div>
        <form action="{{ route("admin.setting.aboutPost") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hakkımda Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageWebp/setting/")."/".@$about[0]["aboutImageWebp"] }}" width="200px" alt="">
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Url</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="form-control" id="about" name="about" rows="5" aria-describedby="">{{ @$about[0]["about"] }}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Title</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="form-control" id="mission" name="mission" rows="5" aria-describedby="title">{{ @$about[0]["mission"] }}</textarea>
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Site Description</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="form-control" id="vision" name="vision" rows="5" aria-describedby="description">{{ @$about[0]["vision"] }}</textarea>
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
