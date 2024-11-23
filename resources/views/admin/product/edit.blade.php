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

            <h1 class="card-title display-5">Site Ürün Güncelleme Formu</h1>
        </div>
        <form action="{{ route("admin.product.update",["id"=>$product[0]["id"]]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Fotoğraf</label>
                </div>
                <div class="col-lg-10 form-group">
                    <img src="{{ asset("imageWebp/product/")."/".$product[0]["imageWebp"] }}" width="200" class="mb-2" alt="">
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
                    <input type="text" class="form-control" value="{{ $product[0]["name"] }}" id="productName" name="productName" placeholder="Kategori Adı Girin!" aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Kategori</label>
                </div>
                <div class="col-lg-10 form-group">
                    <select class="form-control" name="productCategory" id="productCategory">
                        <option value="0" disabled>Lütfen Kategori Seçin!</option>
                        @foreach($category as $categoryWrite)
                            @if($categoryWrite->id==$product[0]["categoryId"])
                                <option selected value="{{ $categoryWrite->id }}">{{ $categoryWrite->name }}</option>
                            @else
                                <option value="{{ $categoryWrite->id }}">{{ $categoryWrite->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Ürün Açıklama</label>
                </div>
                <div class="col-lg-10 form-group">
                    <textarea type="text" class="ckeditor" id="productDescription" name="productDescription" aria-describedby="">{!! $product[0]["description"] !!}</textarea>
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
