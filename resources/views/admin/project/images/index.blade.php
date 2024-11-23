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
            <h6 class="m-0 font-weight-bold text-primary">{{ @$projectGet[0]["title"] }} Fotoğrafları</h6>
        </div>
        <div class="card-body">
            <div class="col-lg-12 card shadow">
                <h1 class=" font-weight-bold mt-2 card-header">Fotoğraf Ekle</h1>
                <form action="{{ route("admin.project.images.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="file" name="image[]" multiple id="image[]" class="form-control-sm">
                        <button type="submit" class="btn btn-primary mt-2">Fotoğraf Ekle <span class="fa fa-plus-circle"></span></button>
                    </div>
                </form>
            </div>


            <div class="col-lg-12 mt-4">
                <div class="row">
                    @foreach($project as $projectWrite)
                        <div class="col-6 col-md-3 card mt-2">
                            <img src="{{ asset("imageWebp/project/images/")."/".$projectWrite->imageWebp }}" class="w-100 card-img mt-3" style="max-height: 250px;" alt="">
                            <div class="card-body"></div>
                            <div class="card-footer">
                                <a href="{{ route("admin.project.images.destroy",["id"=>$projectWrite->id]) }}" class="btn btn-danger btn-sm">Fotoğrafı Sil <span class="fa fa-times-circle"></span></a>
                            </div>
                        </div>
                    @endforeach
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
