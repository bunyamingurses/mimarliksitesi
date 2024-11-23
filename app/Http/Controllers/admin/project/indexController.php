<?php

namespace App\Http\Controllers\admin\project;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\project;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project=project::get();
        return View("admin.project.index",["project"=>$project]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("admin.project.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->projectTitle) && isset($request->projectDescription) && isset($request->foto)) {
            if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                $image = functionController::imageCreate($request, "project", "foto");
                $imageWebp = functionController::imageCreateWebp($request, "project", "foto");
                $title = functionController::security($request->projectTitle);
                $description = functionController::security($request->projectDescription);

                $all = [
                    "image" => $image,
                    "imageWebp" => $imageWebp,
                    "title" => $title,
                    "description" => $description
                ];

                $create = project::create($all);
                if ($create) {
                    return redirect()->back()->with("status", "Proje Başarı ile Eklendi.");
                } else {
                    return redirect()->back()->with("status", "Proje Eklenemedi. Lütfen Tekrar Deneyin.");
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
            $project = project::where("id", functionController::security($id))->get();
            if ($project[0]["title"]) {
                return View("admin.project.edit", ["project" => $project]);
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
            $project = project::where("id", functionController::security($id))->get();
            if ($project[0]["title"]) {

                if (isset($request->foto)) {
                    if (isset($request->projectTitle) && isset($request->projectDescription) && isset($request->foto)) {
                        if (functionController::resimTurKontrol($request->File("foto")->getClientOriginalExtension())) {
                            $image = functionController::imageCreate($request, "project", "foto");
                            $imageWebp = functionController::imageCreateWebp($request, "project", "foto");
                            $title = functionController::security($request->projectTitle);
                            $description = functionController::security($request->projectDescription);

                            $all = [
                                "images" => $image,
                                "imagesWebp" => $imageWebp,
                                "title" => $title,
                                "description" => $description
                            ];

                            $update = project::where("id", functionController::security($id))->update($all);
                            if ($update) {
                                return redirect()->back()->with("status", "Proje Başarı ile Güncellendi.");
                            } else {
                                return redirect()->back()->with("status", "Proje Güncellenemedi. Lütfen Tekrar Deneyin.");
                            }
                        } else {
                            return redirect()->back()->with("status", "Proje desteklenen biçimlerdeki fotoğrafları kullanın.");
                        }
                    } else {
                        return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
                    }
                } else {
                    if (isset($request->projectTitle) && isset($request->projectDescription)) {
                        $title = functionController::security($request->projectTitle);
                        $description = functionController::security($request->projectDescription);

                        $all = [
                            "title" => $title,
                            "description" => $description
                        ];

                        $update = project::where("id", functionController::security($id))->update($all);
                        if ($update) {
                            return redirect()->back()->with("status", "Proje Başarı ile Güncellendi.");
                        } else {
                            return redirect()->back()->with("status", "Proje Güncellenemedi. Lütfen Tekrar Deneyin.");
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
            $project = project::where("id", functionController::security($id))->get();
            if ($project[0]["title"]) {
                $delete = project::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Proje Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Proje ile Silinemedi.");
                }
            }
        }
    }


    public function popular(string $id)
    {
        if (isset($id)) {
            $project = project::where("id", functionController::security($id))->get();
            if ($project[0]["title"]) {
                if ($project[0]["isPopular"] == 1) {
                    $all=["isPopular"=>0];
                    $update = project::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Proje Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Proje Güncellenemedi.");
                    }
                }else{
                    $all=["isPopular"=>1];
                    $update = project::where("id", functionController::security($id))->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Proje Başarı ile Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Proje Güncellenemedi.");
                    }
                }


            }
        }
    }
}
