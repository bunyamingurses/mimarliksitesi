@extends("layouts.admin.index")

@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif
    <div class="container-fluid card  p-4">
        <div class="card-header mb-4">

            <h1 class="card-title display-5">Ürün Bilgi Güncelleme Formu <a class="btn btn-primary" href="{{ route("admin.product.information.index",["id"=>$information[0]["productId"]]) }}">Geri Dön <span class="fa fa-arrow-circle-left"></span></a></h1>
        </div>
        <form action="{{ route("admin.product.information.update",["id"=>$information[0]["id"]]) }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Bilgi Adı</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" value="{{ $information[0]["name"] }}" id="informationName" name="informationName" placeholder="Bilgi Adı Girin!" aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                    <label for="">Bilgi Değer</label>
                </div>
                <div class="col-lg-10 form-group">
                    <input type="text" class="form-control" value="{{ $information[0]["value"] }}" id="informationValue" name="informationValue" placeholder="Bilgi Değer Girin!" aria-describedby="">
                </div>
            </div>

            <div class="col-lg-12 row">

                <div class="col-lg-2">
                </div>
                <div class="col-lg-10 form-group">

                    <button type="submit" class="btn btn-primary">Bilgi Güncelle <span class="fa fa-plus-circle"></span></button>
                </div>
            </div>
        </form>
    </div>
@endsection
