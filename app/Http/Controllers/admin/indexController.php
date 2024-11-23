<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\contact;
use App\Models\pdfCatalog;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $contact = contact::get();
        $catalog = pdfCatalog::get();
        return View("admin.index", ["contact" => $contact, "catalog" => $catalog]);
    }

    public function contactDestroy($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $contact = contact::where("id", $id)->get();
            if ($contact[0]["name"]) {
                $delete = contact::where("id", $id)->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Silme İşlemi Başarılı.");
                } else {
                    return redirect()->back()->with("status", "Silme İşlemi Gerçekleştirilemedi. Lütfen Tekrar Deneyin..");
                }
            }
        }
    }


    public function catalogCreate(Request $request)
    {
        if ($request->file("image") && $request->file("file")) {

            if (functionController::resimTurKontrol($request->file("image")->getClientOriginalExtension())) {
                $image=functionController::imageCreateWebp($request,"catalog","image");
                $file = $request->File("file");
                if ($file->getClientOriginalExtension() == "pdf") {
                    $fileName = rand(111111111, 999999999) . "-" . date("Y-m-d") . "." . $file->getClientOriginalExtension();
                    $file->move(public_path("pdfCatalog/"), $fileName);
                    $all=[
                        "imageWebp"=>$image,
                        "catalog"=>$fileName,
                    ];

                    $create=pdfCatalog::create($all);
                    if ($create){
                        return redirect()->back()->with("status","Katalog Başarıyla Kaydedildi.");
                    }else{
                        return redirect()->back()->with("status","KAtalog Kaydedilemedi. Lütfen Tekrar Deneyin.");

                    }
                }else{
                    return redirect()->back()->with("status","Katalog \".pdf\" Formatında Olmalıdır!");

                }
            }else{
                return redirect()->back()->with("status","Ürün Fottoğrafı \".jpg, .jpeg, .png\" Formatlarında Olmalıdır!");
            }
        }
    }


    public function catalogDestroy($id)
    {
        if (isset($id)) {
            $id = functionController::security($id);
            $contact = pdfCatalog::where("id", $id)->get();
            if ($contact[0]["catalog"]) {
                $delete = pdfCatalog::where("id", $id)->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Silme İşlemi Başarılı.");
                } else {
                    return redirect()->back()->with("status", "Silme İşlemi Gerçekleştirilemedi. Lütfen Tekrar Deneyin..");
                }
            }
        }
    }
}
