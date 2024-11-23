<?php

namespace App\Http\Controllers\admin\project\images;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\project;
use App\Models\projectGallery;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if (isset($id)) {
            @$id = functionController::security($id);
            @$project = projectGallery::where("projectId", $id)->get();
            @$projectGet = project::where("id", $id)->get();
            return View("admin.project.images.index", ["project" => $project, "projectGet" => $projectGet, "id" => $id]);
        } else {
            return redirect()->back();
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
            $project = project::where("id", $id) -> get();
            if ($project[0]["title"]) {
                if ($request->File("image") != null) {
                    $images = $request->file("image");
                    foreach ($images as $imageWrite) {
                        if (functionController::resimTurKontrol($imageWrite->getClientOriginalExtension())) {
                            $image = functionController::imageCreateGallery("project/images", $imageWrite->getRealPath(), $imageWrite->getClientOriginalExtension());
                            $imageWebp = functionController::imageCreateWebpGallery("project/images", $imageWrite->getRealPath());
                            $all = [
                                "projectId"=>$id,
                                "image" => $image,
                                "imageWebp" => $imageWebp
                            ];
                            projectGallery::create($all);
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
            $gallery = projectGallery::where("id", functionController::security($id))->get();
            if ($gallery[0]["imageWebp"]) {
                $delete = projectGallery::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Fotoğraf Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Fotoğraf ile Silinemedi.");
                }
            }
        }
    }
}
