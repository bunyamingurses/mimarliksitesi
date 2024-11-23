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
            <h4 class="m-0 font-weight-bold text-primary">Ürünler Tablosu</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="carouselTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Ürün Adı</th>
                        <th>Kategori</th>
                        <th>Bilgilendirme Tablosu</th>
                        <th>Ürün Kataloğu</th>
                        <th>Ürün Galeri</th>
                        <th>Proje Uygulamaları</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Ürün Adı</th>
                        <th>Kategori</th>
                        <th>Bilgilendirme Tablosu</th>
                        <th>Ürün Kataloğu</th>
                        <th>Ürün Galeri</th>
                        <th>Proje Uygulamaları</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($product as $productWrite)
                        <tr>
                            <td><img src="{{ asset("imageWebp/product/")."/".$productWrite->imageWebp }}" width="200px" alt=""></td>
                            <td>{{ $productWrite->name }}</td>
                            <td>{{ \App\Models\category::getSingle($productWrite->categoryId) }}</td>
                            <td><a class="btn btn-primary" href="{{ route("admin.product.information.index",["id"=>$productWrite->id]) }}"><span class="fa fa-table"></span> Bilgilendirme Tablosu</a></td>
                            <td>
                                @if($productWrite->catalog)
                                    <a class="btn btn-primary" href="{{ asset("catalog/")."/".$productWrite->catalog }}"><span class="fa fa-file-pdf"></span> Ürün Kataloğu</a>
                                @else
                                <a class="btn btn-danger"><span class="fa fa-file-pdf"></span> Katalog Yok</a>
                                @endif
                            </td>
                            <td><a class="btn btn-primary" href="{{ route("admin.product.gallery.index",["id"=>$productWrite->id]) }}"><span class="fa fa-images"></span> Ürün Galeri</a></td>
                            <td><a class="btn btn-primary" href="{{ route("admin.product.application.index",["id"=>$productWrite->id]) }}"><span class="fa fa-images"></span> Proje Uygulamaları</a></td>
                            <td>{{ $productWrite->created_at }}</td>
                            <td>
                                <a href="{{ route("admin.product.edit",["id"=>$productWrite->id]) }}" class="btn btn-success"><span class="fa fa-edit"></span></a>
                                <a href="{{ route("admin.product.destroy",["id"=>$productWrite->id]) }}" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
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
