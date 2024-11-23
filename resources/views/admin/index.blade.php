@extends("layouts.admin.index")
@section("content")
    @if(session("status"))
        <div class="alert alert-info"> {{ session("status") }}</div>
    @endif



        <div class="col-lg-12 card shadow mb-4">
            <h3 class=" mt-2 card-header">Katalog Ekle</h3>
            <form action="{{ route("admin.catalogCreate") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-4">

                    <div class="col-lg-12 row">

                        <div class="col-lg-2">
                            <label for="">Katalog Fotoğraf</label>
                        </div>
                        <div class="col-lg-10 form-group">
                            <input type="file" class="form-control" id="image" name="image" aria-describedby="">
                        </div>
                    </div>

                    <div class="col-lg-12 row">

                        <div class="col-lg-2">
                            <label for="">Katalog Dosya</label>
                        </div>
                        <div class="col-lg-10 form-group">
                            <input type="file" class="form-control" id="file" name="file" aria-describedby="">
                        </div>
                    </div>

                    <div class="col-lg-12 row">

                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-10 form-group">
                            <input type="hidden" name="productId" value="">
                            <button type="submit" class="btn btn-primary mt-2">Bilgi Ekle <span class="fa fa-plus-circle"></span></button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Katalog Tablosu</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="carouselTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Katalog</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Katalog</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>

                        </tfoot>
                        <tbody>

                        @foreach($catalog as $catalogWrite)
                            <tr>
                                <td><img src="{{ asset("imageWebp/catalog/")."/".$catalogWrite->imageWebp }}" width="200" alt=""></td>
                                <td><a href="{{ asset("pdfCatalog/")."/".$catalogWrite->catalog }}" class="btn btn-primary">Katalog <span class="fa fa-file-pdf"></span></a></td>
                                <td>{{ $catalogWrite->created_at }}</td>
                                <td>
                                    <a href="{{ route("admin.catalogDestroy",["id"=>$catalogWrite->id]) }}" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>










    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">İletişim Mesajlar Tablosu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="carouselTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Adı Soyadı</th>
                        <th>E-Posta Adresi</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Adı Soyadı</th>
                        <th>E-Posta Adresi</th>
                        <th>Konu</th>
                        <th>Mesaj</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>

                    </tfoot>
                    <tbody>

                    @foreach($contact as $contactWrite)
                        <tr>
                            <td>{{ $contactWrite->name }}</td>
                            <td>{{ $contactWrite->email }}</td>
                            <td>{{ $contactWrite->subject }}</td>
                            <td>{{ $contactWrite->message }}</td>
                            <td>{{ $contactWrite->created_at }}</td>
                            <td>
                                <a href="{{ route("admin.contactDestroy",["id"=>$contactWrite->id]) }}" class="btn btn-danger"><span class="fa fa-trash-alt"></span></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
