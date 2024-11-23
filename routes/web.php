<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get("/", [Controllers\front\indexController::class, "index"])->name("default");
Route::get("/index", [Controllers\front\indexController::class, "index"])->name("index");
Route::get("/index.html", [Controllers\front\indexController::class, "index"])->name("indexHtml");
Route::get("/hakkimda", [Controllers\front\indexController::class, "about"])->name("about");
Route::get("/hakkimda.html", [Controllers\front\indexController::class, "about"])->name("aboutHtml");
Route::get("/misyon", [Controllers\front\indexController::class, "mission"])->name("mission");
Route::get("/misyon.html", [Controllers\front\indexController::class, "mission"])->name("missionHtml");
Route::get("/vizyon", [Controllers\front\indexController::class, "vision"])->name("vision");
Route::get("/vizyon.html", [Controllers\front\indexController::class, "vision"])->name("visionHtml");

Route::get("/urunler", [Controllers\front\indexController::class, "product"])->name("product");
Route::get("/urunler.html", [Controllers\front\indexController::class, "product"])->name("productHtml");
Route::get("/urunler/{id}/{name}",[Controllers\front\indexController::class,"productDetail"])->name("productDetail");


Route::get("/hizmetler", [Controllers\front\indexController::class, "service"])->name("service");
Route::get("/hizmetler.html", [Controllers\front\indexController::class, "service"])->name("serviceHtml");



Route::get("/projeler", [Controllers\front\indexController::class, "project"])->name("project");
Route::get("/projeler.html", [Controllers\front\indexController::class, "project"])->name("projectHtml");
Route::get("/projeler/{id}/{name}", [Controllers\front\indexController::class, "projectDetail"])->name("projectDetail");



Route::get("/iletisim", [Controllers\front\indexController::class, "contact"])->name("contact");
Route::get("/iletisim.html", [Controllers\front\indexController::class, "contact"])->name("contactHtml");
Route::post("/iletisim", [Controllers\front\indexController::class, "contactCreate"])->name("contactPost");


Route::get("/pdfkataloglari", [Controllers\front\indexController::class, "pdfCatalog"])->name("pdfCatalog");
Route::get("/pdfkataloglari.html", [Controllers\front\indexController::class, "pdfCatalog"])->name("pdfCatalogHtml");

Route::get("/sitemap", [Controllers\front\indexController::class, "sitemap"])->name("sitemap");
Route::get("/sitemap.xml", [Controllers\front\indexController::class, "sitemap"])->name("sitemapXML");




// Login Route Start
Route::prefix("login")->as("login.")->group(function () {
    Route::get("/", [Controllers\login\indexController::class, "index"])->name("index");
    Route::get("/index", [Controllers\login\indexController::class, "index"])->name("index");
    Route::post("/create", [Controllers\login\indexController::class, "login"])->name("loginPost");
    Route::get("/logout", [Controllers\login\indexController::class, "logOut"])->name("logOut");

});
// Login Route Finish


Route::prefix("/admin")->as("admin.")->middleware("loginControl")->group(function () {
    Route::get("/", [Controllers\admin\indexController::class, "index"])->name("index");
    Route::get("/contactdestroy/{id}",[Controllers\admin\indexController::class,"contactDestroy"])->name("contactDestroy");
    Route::post("/catalogcreate",[Controllers\admin\indexController::class,"catalogCreate"])->name("catalogCreate");
    Route::get("/catalogdestroy/{id}",[Controllers\admin\indexController::class,"catalogDestroy"])->name("catalogDestroy");

    Route::prefix("/setting")->as("setting.")->group(function () {
        Route::get("/", [Controllers\admin\setting\indexController::class, "index"])->name("index");
        Route::post("/update/{id}", [Controllers\admin\setting\indexController::class, "update"])->name("update");

        Route::get("/about", [Controllers\admin\setting\indexController::class, "about"])->name("about");
        Route::post("/aboutpost", [Controllers\admin\setting\indexController::class, "aboutPost"])->name("aboutPost");
    });

    Route::prefix("profile")->as("profile.")->group(function () {
        Route::get("/", [Controllers\admin\profile\indexController::class, "index"])->name("index");
        Route::post("/update", [Controllers\admin\profile\indexController::class, "save"])->name("update");
    });

    Route::prefix("/carousel")->as("carousel.")->group(function () {
        Route::get("/", [Controllers\admin\carousel\indexController::class, "index"])->name("index");
        Route::get("/create", [Controllers\admin\carousel\indexController::class, "create"])->name("create");
        Route::post("/create", [Controllers\admin\carousel\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [Controllers\admin\carousel\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [Controllers\admin\carousel\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [Controllers\admin\carousel\indexController::class, "destroy"])->name("destroy");
    });

    Route::prefix("service")->as("service.")->group(function () {
        Route::get("/", [Controllers\admin\services\indexController::class, "index"])->name("index");
        Route::get("/create", [Controllers\admin\services\indexController::class, "create"])->name("create");
        Route::post("/create", [Controllers\admin\services\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [Controllers\admin\services\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [Controllers\admin\services\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [Controllers\admin\services\indexController::class, "destroy"])->name("destroy");
        Route::get("/popular/{id}", [Controllers\admin\services\indexController::class, "popular"])->name("popular");
    });

    Route::prefix("category")->as("category.")->group(function () {
        Route::get("/", [Controllers\admin\category\indexController::class, "index"])->name("index");
        Route::get("/create", [Controllers\admin\category\indexController::class, "create"])->name("create");
        Route::post("/create", [Controllers\admin\category\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [Controllers\admin\category\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [Controllers\admin\category\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [Controllers\admin\category\indexController::class, "destroy"])->name("destroy");
    });

    Route::prefix("product")->as("product.")->group(function () {
        Route::get("/", [Controllers\admin\product\indexController::class, "index"])->name("index");
        Route::get("/create", [Controllers\admin\product\indexController::class, "create"])->name("create");
        Route::post("/create", [Controllers\admin\product\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [Controllers\admin\product\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [Controllers\admin\product\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [Controllers\admin\product\indexController::class, "destroy"])->name("destroy");

        Route::prefix("gallery")->as("gallery.")->group(function () {
            Route::get("/index/{id}", [Controllers\admin\product\gallery\indexController::class, "index"])->name("index");
            Route::post("/create", [Controllers\admin\product\gallery\indexController::class, "store"])->name("store");
            Route::get("/edit/{id}/{productId}", [Controllers\admin\product\gallery\indexController::class, "edit"])->name("edit");
            Route::post("/update/{id}", [Controllers\admin\product\gallery\indexController::class, "update"])->name("update");
            Route::get("/destroy/{id}", [Controllers\admin\product\gallery\indexController::class, "destroy"])->name("destroy");
        });

        Route::prefix("information")->as("information.")->group(function () {
            Route::get("/{id}", [Controllers\admin\product\information\indexController::class, "index"])->name("index");
            Route::post("/create", [Controllers\admin\product\information\indexController::class, "store"])->name("store");
            Route::get("/edit/{id}", [Controllers\admin\product\information\indexController::class, "edit"])->name("edit");
            Route::post("/update/{id}", [Controllers\admin\product\information\indexController::class, "update"])->name("update");
            Route::get("/destroy/{id}", [Controllers\admin\product\information\indexController::class, "destroy"])->name("destroy");
        });

        Route::prefix("application")->as("application.")->group(function () {
            Route::get("/{id}", [Controllers\admin\product\application\indexController::class, "index"])->name("index");
            Route::post("/create", [Controllers\admin\product\application\indexController::class, "store"])->name("store");
            Route::get("/destroy/{id}", [Controllers\admin\product\application\indexController::class, "destroy"])->name("destroy");
        });


    });

    Route::prefix("project")->as("project.")->group(function () {
        Route::get("/", [Controllers\admin\project\indexController::class, "index"])->name("index");
        Route::get("/create", [Controllers\admin\project\indexController::class, "create"])->name("create");
        Route::post("/create", [Controllers\admin\project\indexController::class, "store"])->name("store");
        Route::get("/edit/{id}", [Controllers\admin\project\indexController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [Controllers\admin\project\indexController::class, "update"])->name("update");
        Route::get("/destroy/{id}", [Controllers\admin\project\indexController::class, "destroy"])->name("destroy");
        Route::get("/popular/{id}", [Controllers\admin\project\indexController::class, "popular"])->name("popular");


        Route::prefix("images")->as("images.")->group(function () {
            Route::get("/index/{id}", [Controllers\admin\project\images\indexController::class, "index"])->name("index");
            Route::post("/create", [Controllers\admin\project\images\indexController::class, "store"])->name("store");
            Route::get("/destroy/{id}", [Controllers\admin\project\images\indexController::class, "destroy"])->name("destroy");
        });


    });


});






