<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\category;
use App\Models\product;
use App\Models\productApplication;
use App\Models\productGallery;
use App\Models\productInformation;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\List_;
use Ramsey\Uuid\Type\Integer;
use function PHPUnit\Framework\isFinite;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = product::get();
        return View("admin.product.index", ["product" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::get();
        return View("admin.product.create", ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->file("foto") != null && $request->file("catalog") != null && isset($request->productName) && isset($request->productCategory) && isset($request->productDescription)) {

            if (functionController::resimTurKontrol($request->file("foto")->getClientOriginalExtension())) {
                $name = functionController::security($request->productName);
                $image = functionController::imageCreate($request, "product", "foto");
                $imageWebp = functionController::imageCreateWebp($request, "product", "foto");
                $category = functionController::security($request->productCategory);
                $description = functionController::security($request->productDescription);

                $categoryGet = category::where("id", $category)->get();
                if ($categoryGet[0]["name"]) {
                    $file = $request->File("catalog");
                    if ($file->getClientOriginalExtension() == "pdf") {
                        $fileName = rand(111111111, 999999999) . "-" . date("Y-m-d") . "." . $file->getClientOriginalExtension();
                        $file->move(public_path("catalog/"), $fileName);

                        $all = [
                            "categoryId" => $category,
                            "image" => $image,
                            "imageWebp" => $imageWebp,
                            "name" => $name,
                            "description" => $description,
                            "catalog" => $fileName,

                        ];

                        $create = product::create($all);

                        if ($create) {
                            return redirect()->back()->with("status", "Ürün Başarıyla Eklendi.");
                        } else {
                            return redirect()->back()->with("status", "Ürün Eklenemedi.");
                        }


                    } else {
                        return redirect()->back()->with("status", "Katalog \".pdf\" Formatında Olmalıdır!");
                    }
                } else {
                    return redirect()->back();
                }
            } else {
                return redirect()->back()->with("status", "Ürün Fottoğrafı \".jpg, .jpeg, .png\" Formatlarında Olmalıdır!");
            }
        } else {
            return redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın!");
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
        if (isset($id)) {
            $product = product::where("id", functionController::security($id))->get();
            if ($product[0]["name"]) {
                $category = category::get();
                return View("admin.product.edit", ["product" => $product, "category" => $category]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($id)) {

            $product = product::where("id", functionController::security($id))->get();
            if ($product[0]["name"]) {
                $all = [];


                if ($request->file("foto") != null || $request->file("catalog") != null || isset($request->productName) || isset($request->productCategory) || isset($request->productDescription)) {

                    if ($request->productName) {
                        $name = functionController::security($request->productName);
                        $all += ["name" => $name];
                    }

                    if ($request->productCategory) {

                        $categoryGet = category::where("id", functionController::security($request->productCategory))->get();
                        if ($categoryGet[0]["name"]) {
                            $category = functionController::security($request->productCategory);
                            $all += ["categoryId" => $category];
                        } else {
                            return redirect()->back();
                        }
                    }

                    if ($request->productDescription) {
                        $description = functionController::security($request->productDescription);
                        $all += ["description" => $description];
                    }

                    if ($request->file("foto")) {
                        if (functionController::resimTurKontrol($request->file("foto")->getClientOriginalExtension())) {

                            $image = functionController::imageCreate($request, "product", "foto");
                            $imageWebp = functionController::imageCreateWebp($request, "product", "foto");
                            $all += ["image" => $image, "imageWebp" => $imageWebp];

                        } else {
                            return redirect()->back()->with("status", "Ürün Fottoğrafı \".jpg, .jpeg, .png\" Formatlarında Olmalıdır!");
                        }
                    }


                    if ($request->file("catalog")) {
                        $file = $request->File("catalog");
                        if ($file->getClientOriginalExtension() == "pdf") {
                            $fileName = rand(111111111, 999999999) . "-" . date("Y-m-d") . "." . $file->getClientOriginalExtension();
                            $file->move(public_path("catalog/"), $fileName);
                            $all += ["catalog" => $fileName];
                        } else {
                            return redirect()->back()->with("status", "Katalog \".pdf\" Formatında Olmalıdır!");
                        }
                    }


                    if ($all != null) {
                        $update = product::where("id", functionController::security($id))->update($all);
                        if ($update) {
                            return redirect()->back()->with("status", "Ürün Başarıyla Güncellendi.");
                        } else {
                            return redirect()->back()->with("status", "Ürün Güncellenemedi.");
                        }
                    }


                } else {
                    return redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın!");
                }
            } else {
                return redirect(route("admin.index"));
            }
        } else {
            return redirect(route("admin.index"));
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $product = product::where("id", $id)->get();
            if ($product[0]["name"]!=null) {

                $information = productInformation::where("productId", $id)->get();
                if ($information!=null) {
                    $informationDelete = productInformation::where("productId", $id)->delete();
                }

                $gallery = productGallery::where("productId", $id)->get();
                if ($gallery!=null) {
                    $galleryDelete = productGallery::where("productId", $id)->delete();
                }

                $application=productApplication::where("productId",$id)->get();
                if ($application!=null){
                    $applicationDelete=productApplication::where("productId",$id)->delete();
                }

                $productDelete=product::where("id",$id)->delete();
                if ($productDelete){
                    return redirect()->back()->with("status","Ürün Başrıyla Silindi.");
                }else{
                    return redirect()->back()->with("status","Ürün Silinemdi. Lütfen Tekrar Deneyin.");
                }

            }else{
                return redirect(route("admin.index"));
            }
        }
    }
}
