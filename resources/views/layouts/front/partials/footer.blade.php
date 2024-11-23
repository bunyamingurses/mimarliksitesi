<!-- Footer Start -->
<div class="footer container-fluid position-relative bg-dark bg-light-radial text-white-50 py-6 px-5">
    <div class="row g-5">
        <div class="col-lg-6 pe-lg-5">
            <a href="{{ route("indexHtml") }}" class="navbar-brand">
                <img src="{{ asset("/imageWebp/setting/")."/".\App\Models\setting::getSetting("logoFooterWebp") }}" width="200px" alt="">



                {{--            <h1 class="m-0 display-4 text-uppercase text-white"><i class="bi bi-bricks text-primary me-2"></i>USTAOĞLU</h1>--}}
            </a>
            @php $aboutFooter=\App\Models\about::limit(1)->get(); @endphp
            <p>{{ $aboutFooter[0]["about"] }}</p>
            <p><i class="fa fa-map-marker-alt me-2"></i>{{ \App\Models\setting::getSetting("address") }}</p>
            <p><i class="fa fa-phone-alt me-2"></i>{{ \App\Models\setting::getSetting("phoneNumber") }}</p>
            <p><i class="fa fa-envelope me-2"></i>{{ \App\Models\setting::getSetting("email") }}</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="{{ \App\Models\setting::getSetting("twitter") }}"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="{{ \App\Models\setting::getSetting("facebook") }}"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="{{ \App\Models\setting::getSetting("linkedin") }}"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0" href="{{ \App\Models\setting::getSetting("instagram") }}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 ps-lg-5">
            <div class="row g-5">
                <div class="col-sm-12">
                    <h4 class="text-white text-uppercase mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="{{ route("indexHtml") }}"><i class="fa fa-angle-right me-2"></i>Anasayfa</a>
                        <a class="text-white-50 mb-2" href="{{ route("aboutHtml") }}"><i class="fa fa-angle-right me-2"></i>Hakkımda</a>
                        <a class="text-white-50 mb-2" href="{{ route("serviceHtml") }}"><i class="fa fa-angle-right me-2"></i>Hizmetler</a>
                        <a class="text-white-50 mb-2" href="{{ route("productHtml") }}"><i class="fa fa-angle-right me-2"></i>Ürünler</a>
                        <a class="text-white-50" href="{{ route("projectHtml") }}"><i class="fa fa-angle-right me-2"></i>Projeler</a>
                        <a class="text-white-50" href="{{ route("contactHtml") }}"><i class="fa fa-angle-right me-2"></i>İletişim</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark bg-light-radial text-white border-top border-primary px-0">
    <div class="d-flex flex-column flex-md-row justify-content-between">
        <div class="py-4 px-5 text-center text-md-start">
            <p class="mb-0">&copy; <a class="text-primary" href="{{ \App\Models\setting::getSetting("siteUrl") }}">www.ustaogluyapimimarlik.com</a>. Tüm Hakları Saklıdır.</p>
        </div>
        <div class="py-4 px-5 bg-primary footer-shape position-relative text-center text-md-end">
            <p class="mb-0">Designed by <a class="text-dark" href="https://www.gursesyazilim.com">Gürses Yazılım</a></p>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("assets/frontAssets/lib/easing/easing.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/lib/waypoints/waypoints.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/lib/owlcarousel/owl.carousel.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/lib/tempusdominus/js/moment.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/lib/tempusdominus/js/moment-timezone.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/lib/isotope/isotope.pkgd.min.js") }}"></script>
<script src="{{ asset("assets/frontAssets/lib/lightbox/js/lightbox.min.js") }}"></script>

<!-- Template Javascript -->
<script src="{{ asset("assets/frontAssets/js/main.js") }}"></script>
</body>

</html>
