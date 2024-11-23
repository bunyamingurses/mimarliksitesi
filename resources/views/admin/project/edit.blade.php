@extends("layouts.admin.index")

@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Site Proje Güncelleme Formu</h1>
        </div>
        <form action="{{ route("admin.project.update",["id"=>$project[0]["id"]]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageWebp/project/")."/".$project[0]["imageWebp"] }}" width="200" class="mb-2" alt="">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Başlık</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" value="{{ $project[0]["title"] }}" placeholder="Hizmet Başlık Girin!"  aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Hizmet Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="projectDescription" name="projectDescription" value="{{ $project[0]["description"] }}" placeholder="Hizmet Açıklama Girin!" aria-describedby="">
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Proje Güncelle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
