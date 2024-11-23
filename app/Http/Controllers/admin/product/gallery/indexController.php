<?php

namespace App\Http\Controllers\admin\product\gallery;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\product;
use App\Models\productApplication;
use App\Models\productGallery;
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
                $gallery = productGallery::where("productId", $id)->get();
                return View("admin.product.gallery.index", ["product" => $product, "gallery" => $gallery]);
            } else {
                return redirect(route("admin.index"));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

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
                if ($request->File("image") != null && $request->name) {
                    $images = $request->file("image");
                    if (functionController::resimTurKontrol($request->file("image")->getClientOriginalExtension())) {
                        $name = functionController::security($request->name);
                        $image = functionController::imageCreate($request, "product/gallery", "image");
                        $imageWebp = functionController::imageCreateWebp($request, "product/gallery", "image");
                        $all = [
                            "productId" => $id,
                            "name" => $name,
                            "image" => $image,
                            "imageWebp" => $imageWebp
                        ];
                        $crate = productGallery::create($all);
                        if ($crate) {
                            return redirect()->back()->with("status", "Fotoğraf Başarıyla Yüklendi.");
                        } else {
                            return redirect()->back()->with("status", "Fotoğraf Yülenemdi. Lütfen Tekrar Deneyin.");
                        }
                    } else {
                        return redirect()->back()->with("status", "Fotoğraf \".jpg, .jpeg, .png\" Formatlarında Olmalıdır!");
                    }
                } else {
                    return redirect()->back();
                }
            } else {
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
    public function edit(Request $request)
    {
        if (isset($request->id) && isset($request->productId)) {
            $id = functionController::security($request->id);
            $productId = functionController::security($request->productId);
            $gallery = productGallery::where("id", $id)->get();
            if ($gallery) {
                return View("admin.product.gallery.edit", ["gallery" => $gallery, "productId" => $productId]);
            } else {
                return redirect(route("admin.index"));
            }
        } else {
            return redirect(route("admin.index"));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if (isset($request->id) && isset($request->productId)) {
            $id = functionController::security($request->id);
            $productId = functionController::security($request->productId);
            $gallery = productGallery::where("id", $id)->get();
            if ($gallery[0]["imageWebp"]) {
                $all = [];
                if ($request->file("foto")!=null || isset($request->name)) {

                    if ($request->file("foto")) {
                        if (functionController::resimTurKontrol($request->file("image")->getClientOriginalExtension())) {
                            $image = functionController::imageCreate($request, "product/gallery", "image");
                            $imageWebp = functionController::imageCreateWebp($request, "product/gallery", "image");
                            $all += [
                                "image" => $image,
                                "imageWebp" => $imageWebp
                            ];
                        } else {
                            return redirect()->back()->with("status", "Fotoğraf \".jpg, .jpeg, .png\" Formatlarında Olmalıdır!");
                        }
                    }

                    if (isset($request->name)) {
                        $name = functionController::security($request->name);
                        $all += ["name" => $name];
                    }

                    if ($all != null) {
                        $update = productGallery::where("id", $id)->update($all);
                        if ($update) {
                            return redirect(route("admin.product.gallery.index", ["id" => $productId]))->with("status", "Fotoğraf Güncellendi.");
                        } else {
                            return redirect()->back()->with("status", "Fotoğraf Güncellenemedi. Lütfen Tekrar Deneyin.");

                        }
                    }
                }else{
                    return redirect()->back()->with("status","Lütfen Boş Alan Bırakmayın.");
                }

            } else {
                return redirect(route("admin.index"));
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $gallery = productGallery::where("id", functionController::security($id))->get();
            if ($gallery[0]["imageWebp"]) {
                $delete = productGallery::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Fotoğraf Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Fotoğraf ile Silinemedi.");
                }
            }
        }
    }
}
