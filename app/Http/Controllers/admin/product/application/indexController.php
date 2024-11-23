<?php

namespace App\Http\Controllers\admin\product\application;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\product;
use App\Models\productApplication;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if (isset($id)) {
            $product = product::where("id", functionController::security($id))->get();
            if ($product[0]["name"]) {
                $application=productApplication::where("productId",$id)->get();
                return View("admin.product.application.index",["product"=>$product,"application"=>$application]);
            }else{
                return redirect(route("admin.index"));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->id)) {
            $id = functionController::security($request->id);
            $product = product::where("id", $id)->get();
            if ($product[0]["name"]) {
                if ($request->File("image") != null) {
                    $images = $request->file("image");
                    foreach ($images as $imageWrite) {
                        if (functionController::resimTurKontrol($imageWrite->getClientOriginalExtension())) {
                            $image = functionController::imageCreateGallery("product/application", $imageWrite->getRealPath(), $imageWrite->getClientOriginalExtension());
                            $imageWebp = functionController::imageCreateWebpGallery("product/application", $imageWrite->getRealPath());
                            $all = [
                                "productId"=>$id,
                                "image" => $image,
                                "imageWebp" => $imageWebp
                            ];
                            productApplication::create($all);
                        }
                    }
                    return redirect()->back()->with("status", "Yüklenebilecek Tüm Fotoğralar Yüklendi.");

                } else {
                    return redirect()->back();
                }
            }else{
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $gallery = productApplication::where("id", functionController::security($id))->get();
            if ($gallery[0]["imageWebp"]) {
                $delete = productApplication::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Fotoğraf Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Fotoğraf ile Silinemedi.");
                }
            }
        }
    }
}
