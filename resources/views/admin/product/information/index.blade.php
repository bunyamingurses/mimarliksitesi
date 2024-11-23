@extends("layouts.admin.index")
@section("style")
    <link href="{{ asset("assets/adminAssets/vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
@endsection

@section("content")

    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif

                <div class="col-lg-12 card shadow mb-4">
                    <h3 class=" font-weight-bold mt-2 card-header">Bilgi Ekle</h3>
                    <form action="{{ route("admin.product.information.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">

                            <div class="col-lg-12 row">

                                <div class="col-lg-2">
                                    <label for="">Bilgi Adı</label>
                                </div>
                                <div class="col-lg-10 form-group">
                                    <input type="text" class="form-control" id="informationName" name="informationName" placeholder="Bilgi Adı Girin!" aria-describedby="">
                                </div>
                            </div>

                            <div class="col-lg-12 row">

                                <div class="col-lg-2">
                                    <label for="">Bilgi Değer</label>
                                </div>
                                <div class="col-lg-10 form-group">
                                    <input type="text" class="form-control" id="informationValue" name="informationValue" placeholder="Bilgi Değer Girin!" aria-describedby="">
                                </div>
                            </div>

                            <div class="col-lg-12 row">

                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-10 form-group">
                                    <input type="hidden" name="productId" value="{{ $product[0]["id"] }}">
                                    <button type="submit" class="btn btn-primary mt-2">Bilgi Ekle <span class="fa fa-plus-circle"></span></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">{{ $product[0]["name"] }} Bilgiler Tablosu</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <table class="table table-bordered" id="carouselTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Bilgi Adı</th>
                        <th>Bilgi Değer</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Bilgi Adı</th>
                        <th>Bilgi Değer</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($information as $informationWrite)
                        <tr>
                            <td>{{ $informationWrite->name }}</td>
                            <td>{{ $informationWrite->value }}</td>
                            <td>{{ $informationWrite->created_at }}</td>
                            <td>
                                <a href="{{ route("admin.product.information.edit",["id"=>$informationWrite->id]) }}" class="btn btn-success"><span class="fa fa-edit"></span></a>
                                <a href="{{ route("admin.product.information.destroy",["id"=>$informationWrite->id]) }}" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a>
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
