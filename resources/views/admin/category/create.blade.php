@extends("layouts.admin.index")

@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Site Kategori Ekleme Formu</h1>
        </div>
        <form action="{{ route("admin.category.store") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Kategori Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                </div>
            </div>
            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Kategori Adı</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Kategori Adı Girin!"  aria-describedby="">
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Kategori Ekle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection