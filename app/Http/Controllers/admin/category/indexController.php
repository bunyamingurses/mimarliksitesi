<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\category;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=category::get();
        return View("admin.category.index",["category"=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->categoryName)  && isset($request->foto)) {
            if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                $image = functionController::imageCreate($request, "category", "foto");
                $imageWebp = functionController::imageCreateWebp($request, "category", "foto");
                $name = functionController::security($request->categoryName);

                $all = [
                    "image" => $image,
                    "imageWebp" => $imageWebp,
                    "name" => $name,
                ];

                $create = category::create($all);
                if ($create) {
                    return redirect()->back()->with("status", "Kategori Başarı ile Eklendi.");
                } else {
                    return redirect()->back()->with("status", "Kategori Eklenemedi. Lütfen Tekrar Deneyin.");
                }
            } else {
                return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
            }
        } else {
            return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
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
            $category = category::where("id", functionController::security($id))->get();
            if ($category[0]["name"]) {
                return View("admin.category.edit", ["category" => $category]);
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
    public function update(Request $request, string $id)
    {
        if (isset($id)) {
            $category = category::where("id", functionController::security($id))->get();
            if ($category[0]["name"]) {

                if (isset($request->foto)) {
                    if (isset($request->categoryName) && isset($request->foto)) {
                        if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                            $image = functionController::imageCreate($request, "category", "foto");
                            $imageWebp = functionController::imageCreateWebp($request, "category", "foto");
                            $name = functionController::security($request->categoryName);

                            $all = [
                                "image" => $image,
                                "imageWebp" => $imageWebp,
                                "name" => $name,
                            ];

                            $update = category::where("id", functionController::security($id))->update($all);
                            if ($update) {
                                return redirect()->back()->with("status", "Kategori Başarı ile Güncellendi.");
                            } else {
                                return redirect()->back()->with("status", "Kategori Güncellenemedi. Lütfen Tekrar Deneyin.");
                            }
                        } else {
                            return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                        }
                    } else {
                        return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
                    }
                } else {
                    if (isset($request->categoryName)) {
                        $name = functionController::security($request->categoryName);

                        $all = [
                            "name" => $name
                        ];

                        $update = category::where("id", functionController::security($id))->update($all);
                        if ($update) {
                            return redirect()->back()->with("status", "Kategori Başarı ile Güncellendi.");
                        } else {
                            return redirect()->back()->with("status", "Kategori Güncellenemedi. Lütfen Tekrar Deneyin.");
                        }

                    } else {
                        return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
                    }
                }


            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $category = category::where("id", functionController::security($id))->get();
            if ($category[0]["name"]) {
                $delete = category::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Kategori Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Kategori ile Silinemedi.");
                }
            }
        }
    }
}
