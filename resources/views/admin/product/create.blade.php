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

            <h1 class="card-title display-5">Site Ürün Ekleme Formu</h1>
        </div>
        <form action="{{ route("admin.product.store") }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Katalog</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="file" class="form-control" id="catalog" name="catalog" aria-describedby="">
                </div>
            </div>


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Adı</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Kategori Adı Girin!" aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Kategori</label>
                </div>
                <div class="col-lg-10 form-group">
                    <select class="form-control" name="productCategory" id="productCategory">
                        <option value="0" selected disabled>Lütfen Kategori Seçin!</option>
                        @foreach($category as $categoryWrite)
                            <option value="{{ $categoryWrite->id }}">{{ $categoryWrite->name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="productDescription" name="productDescription" aria-describedby=""></textarea>
                </div>
            </div>






            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">
                    <button type="submit" class="btn btn-primary">Ürün Ekle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
