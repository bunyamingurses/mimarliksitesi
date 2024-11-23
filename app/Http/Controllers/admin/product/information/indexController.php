<?php

namespace App\Http\Controllers\admin\product\information;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\product;
use App\Models\productInformation;
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
                $information=productInformation::where("productId",$id)->get();
                return View("admin.product.information.index",["product"=>$product,"information"=>$information]);
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
        if (isset($request->informationName) && isset($request->informationValue) && isset($request->productId)){
            $name=functionController::security($request->informationName);
            $value=functionController::security($request->informationValue);
            $id=functionController::security($request->productId);
            $all=[
                "productId"=>$id,
                "name"=>$name,
                "value"=>$value,
            ];

            $create=productInformation::create($all);
            if ($create){
                return redirect()->back()->with("status","Bilgi Başarıyla Eklendi.");
            }else{
                return redirect()->back()->with("status","Bilgi Ekelenemedi. Lütfen Tekrar Deneyin.");
            }
        }else{
            return redirect()->back()->with("status","Lütfen Boş Alan Bırakmayın.");
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
                $information=productInformation::where("id",$id)->get();
            if ($information[0]["name"]) {
                return View("admin.product.information.edit",["information"=>$information]);
            }else{
                return redirect(route("admin.index"));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->informationName) && isset($request->informationValue) && isset($request->id)){
            $name=functionController::security($request->informationName);
            $value=functionController::security($request->informationValue);
            $id=functionController::security($request->id);
            $all=[
                "id"=>$id,
                "name"=>$name,
                "value"=>$value,
            ];

            $create=productInformation::where("id",$id)->update($all);
            if ($create){
                return redirect()->back()->with("status","Bilgi Başarıyla Güncellendi.");
            }else{
                return redirect()->back()->with("status","Bilgi Güncellenemedi. Lütfen Tekrar Deneyin.");
            }
        }else{
            return redirect()->back()->with("status","Lütfen Boş Alan Bırakmayın.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($id)) {
            $information = productInformation::where("id", functionController::security($id))->get();
            if ($information[0]["name"]) {
                $delete = productInformation::where("id", functionController::security($id))->delete();
                if ($delete) {
                    return redirect()->back()->with("status", "Bilgi Başarı ile Silindi.");
                } else {
                    return redirect()->back()->with("status", "Bilgi  Silinemedi.");
                }
            }
        }
    }
}
