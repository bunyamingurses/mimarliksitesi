@extends("layouts.admin.index")

@section("style")
    <link rel="stylesheet" href="{{ asset("assets/ckeditor/content.css") }}">
    <script src="{{ asset("assets/ckeditor/styles.js") }}"></script>
    <script src="{{ asset("assets/ckeditor/ckeditor.js") }}"></script>
@endsection

@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Fotoğraf Güncelleme Formu</h1>
        </div>
        <form action="{{ route("admin.product.gallery.update",["id"=>$gallery[0]["id"]]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageWebp/product/gallery/")."/".$gallery[0]["imageWebp"] }}" width="200" class="mb-2" alt="">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">ÜFotoğraf Kodu/Adı</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $gallery[0]["name"] }}" placeholder="Fotoğraf Kodu/Adı Girin!" aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <input type="hidden" name="productId" value="{{ $productId }}">
                    <button type="submit" class="btn btn-primary">Fotoğraf Güncelle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
