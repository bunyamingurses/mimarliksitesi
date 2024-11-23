@extends("layouts.admin.index")

@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{ $product[0]["name"] }} Proje Uygulamaları</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-lg-12 card shadow">
                    <h1 class=" font-weight-bold mt-2 card-header">Fotoğraf Ekle</h1>
                    <form action="{{ route("admin.product.application.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $product[0]["id"] }}">
                            <input type="file" name="image[]" multiple id="image[]" class="form-control-sm">
                            <button type="submit" class="btn btn-primary mt-2">Fotoğraf Ekle <span class="fa fa-plus-circle"></span></button>
                        </div>
                    </form>
                </div>



                <div class="col-lg-12">
                    <div class="row">
                        @foreach($application as $applicationWrite)
                            <div class="col-lg-3 card mt-4">
                                <img src="{{ asset("imageWebp/product/application/")."/".$applicationWrite->imageWebp }}" style="width: 100%; max-height: 250px;" class="card-img" alt="">
                                <div class="card-body"></div>
                                <div class="card-footer">
                                    <a href="{{ route("admin.product.application.destroy",["id"=>$applicationWrite->id]) }}" class="btn btn-danger">Fotoğrafı Sil <span class="fa fa-times-circle"></span></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

