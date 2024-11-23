@extends("layouts.front.index")
@section("content")
    @include("layouts.front.partials.pageHeader")
    <div class="container">
        @php $about=\App\Models\about::get(); @endphp
        <h1 class="display-5 text-uppercase mb-4 mt-4 text-center">MİSYONUMUZ</h1>
        <p style="margin-bottom:50px;">{{ $about[0]["mission"] }}</p>
    </div>
@endsection
