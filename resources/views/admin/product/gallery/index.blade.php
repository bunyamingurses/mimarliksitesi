@extends("layouts.admin.index")
@section("style")
    <link href="{{ asset("assets/adminAssets/vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
@endsection
@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{ $product[0]["name"] }} Fotoğraf Galerisi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-lg-12 card shadow">
                    <h1 class=" font-weight-bold mt-2 card-header">Fotoğraf Ekle</h1>
                    <form action="{{ route("admin.product.gallery.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $product[0]["id"] }}">
                            <div class="form-group">
                                <div class="row">

                                <div class="col-lg-4">
                                    <input type="file" name="image" id="image" class="form-control mt-2">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" class="form-control mt-2">
                                </div>

                            <button type="submit" class="btn btn-primary col-lg-2 mt-2">Fotoğraf Ekle <span class="fa fa-plus-circle"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12">
                    <div class="row">


                        <div class="table-responsive">
                            <table class="table table-bordered" id="carouselTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Fotoğraf</th>
                                    <th>Fotoğraf Kodu/Adı</th>
                                    <th>Eklenme Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Fotoğraf</th>
                                    <th>Fotoğraf Kodu/Adı</th>
                                    <th>Eklenme Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($gallery as $galleryWrite)
                                    <tr>
                                        <td><img src="{{ asset("imageWebp/product/gallery/")."/".$galleryWrite->imageWebp }}" style="width: 200px; max-height: 150px;" alt=""></td>
                                        <td>{{ $galleryWrite->name }}</td>

                                        <td>{{ $galleryWrite->created_at }}</td>
                                        <td>
                                            <a href="{{ route("admin.product.gallery.edit",["id"=>$galleryWrite->id,"productId"=>$galleryWrite->productId]) }}" class="btn btn-success"><span class="fa fa-edit"></span></a>
                                            <a href="{{ route("admin.product.gallery.destroy",["id"=>$galleryWrite->id]) }}" class="btn btn-danger"><span class="fa fa-times-circle"></span></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("script")
    <!-- Page level plugins -->
    <script src="{{ asset("assets/adminAssets/vendor/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/adminAssets/vendor/datatables/dataTables.bootstrap4.min.js") }}"></script>
    <script>
        $("#carouselTable").dataTable()
    </script>
@endsection
