<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\about;
use App\Models\setting;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = setting::where("id", 1)->get();
        return View("admin.setting.index", ["setting" => $setting]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($id) && $id == 1) {
            if (isset($request->logoHeader) && isset($request->logoFooter) && isset($request->icon)) {
                if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhoneNumber) && isset($request->siteEmail) && isset($request->facebook) && isset($request->twitter) && isset($request->instagram) && isset($request->linkedin) && isset($request->address)) {
                    if (!functionController::resimTurKontrol($request->File("logoHeader")->getClientOriginalExtension()) || !functionController::resimTurKontrol($request->File("logoFooter")->getClientOriginalExtension()) || !functionController::resimTurKontrol($request->File("icon")->getClientOriginalExtension())) {
                        return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
                    } else {


                        $icon = functionController::imageCreate($request, "setting", "icon");
                        $logoHeader = functionController::imageCreate($request, "setting", "logoHeader");
                        $logoHeaderWebp = functionController::imageCreateWebp($request, "setting", "logoHeader");
                        $logoFooter = functionController::imageCreate($request, "setting", "logoFooter");
                        $logoFooterWebp = functionController::imageCreateWebp($request, "setting", "logoFooter");
                        $siteUrl = functionController::security($request->siteUrl);
                        $siteTitle = functionController::security($request->siteTitle);
                        $siteDescription = functionController::security($request->siteDescription);
                        $siteKeyword = functionController::security($request->siteKeyword);
                        $siteAuthor = functionController::security($request->siteAuthor);
                        $sitePhoneNumber = functionController::security($request->sitePhoneNumber);
                        $siteEmail = functionController::security($request->siteEmail);
                        $facebook = functionController::security($request->facebook);
                        $twitter = functionController::security($request->twitter);
                        $instagram = functionController::security($request->instagram);
                        $linkedin = functionController::security($request->linkedin);
                        $address = functionController::security($request->address);

                        $all = [
                            "icon" => $icon,
                            "logoHeader" => $logoHeader,
                            "logoHeaderWebp" => $logoHeaderWebp,
                            "logoFooter" => $logoFooter,
                            "logoFooterWebp" => $logoFooterWebp,
                            "siteUrl" => $siteUrl,
                            "title" => $siteTitle,
                            "description" => $siteDescription,
                            "keyword" => $siteKeyword,
                            "author" => $siteAuthor,
                            "phoneNumber" => $sitePhoneNumber,
                            "email" => $siteEmail,
                            "facebook" => $facebook,
                            "twitter" => $twitter,
                            "instagram" => $instagram,
                            "linkedin" => $linkedin,
                            "address" => $address,
                        ];

                        $update = setting::where("id", "=", 1)->update($all);

                        if ($update) {
                            return redirect()->back()->with("status", "Site Bilgileri Güncellendi.");
                        } else {
                            return redirect()->back()->with("status", "Site Bilgileri Güncellenemedi.");
                        }
                    }
                } else {
                    return redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın.!");
                }
            } else {
                if (isset($request->siteUrl) && isset($request->siteTitle) && isset($request->siteDescription) && isset($request->siteKeyword) && isset($request->siteAuthor) && isset($request->sitePhoneNumber) && isset($request->siteEmail) && isset($request->facebook) && isset($request->twitter) && isset($request->instagram) && isset($request->linkedin) && isset($request->address)) {
                    $siteUrl = functionController::security($request->siteUrl);
                    $siteTitle = functionController::security($request->siteTitle);
                    $siteDescription = functionController::security($request->siteDescription);
                    $siteKeyword = functionController::security($request->siteKeyword);
                    $siteAuthor = functionController::security($request->siteAuthor);
                    $sitePhoneNumber = functionController::security($request->sitePhoneNumber);
                    $siteEmail = functionController::security($request->siteEmail);
                    $facebook = functionController::security($request->facebook);
                    $twitter = functionController::security($request->twitter);
                    $instagram = functionController::security($request->instagram);
                    $linkedin = functionController::security($request->linkedin);
                    $address = functionController::security($request->address);


                    $all = [
                        "siteUrl" => $siteUrl,
                        "title" => $siteTitle,
                        "description" => $siteDescription,
                        "keyword" => $siteKeyword,
                        "author" => $siteAuthor,
                        "phoneNumber" => $sitePhoneNumber,
                        "email" => $siteEmail,
                        "facebook" => $facebook,
                        "twitter" => $twitter,
                        "instagram" => $instagram,
                        "linkedin" => $linkedin,
                        "address" => $address,

                    ];

                    $update = setting::where("id", "=", 1)->update($all);

                    if ($update) {
                        return redirect()->back()->with("status", "Site Bilgileri Güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "Site Bilgileri Güncellenemedi.");
                    }
                } else {
                    return redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın.!");
                }
            }
        } else {
            return redirect()->back();
        }
    }

    public function about()
    {
        $about = about::limit(1)->get();
        return View("admin.setting.about", ["about" => $about]);

    }

    public function aboutPost(Request $request)
    {
        if ($request->image) {

            if (isset($request->about) && isset($request->mission) && isset($request->vision)) {
                if (functionController::resimTurKontrol($request->file("image")->getClientOriginalExtension())) {
                    $image=functionController::imageCreate($request,"setting","image");
                    $imageWebp=functionController::imageCreateWebp($request,"setting","image");
                    $about = functionController::security($request->about);
                    $mission = functionController::security($request->mission);
                    $vision = functionController::security($request->vision);


                    $all = [
                        "about" => $about,
                        "aboutImage"=>$image,
                        "aboutImageWebp"=>$imageWebp,
                        "mission" => $mission,
                        "vision" => $vision
                    ];

                    $aboutGet = about::limit(1)->get();
                    $update = about::where("id", $aboutGet[0]["id"])->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", "Güncelleme Başarılı");
                    } else {
                        return redirect()->back()->with("status", "Güncelleme Başarısız. Lütfen Tekrar Deneyin.");
                    }


                } else {
                    return redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın");
                }
            }else{
                return redirect()->back()->with("status", "Lütfen desteklenen biçimlerdeki fotoğrafları kullanın.");
            }
        } else {
            if (isset($request->about) && isset($request->mission) && isset($request->vision)) {

                $about = functionController::security($request->about);
                $mission = functionController::security($request->mission);
                $vision = functionController::security($request->vision);

                $aboutGet = about::limit(1)->get();

                $all = [
                    "about" => $about,
                    "mission" => $mission,
                    "vision" => $vision
                ];

                $update = about::where("id", $aboutGet[0]["id"])->update($all);
                if ($update) {
                    return redirect()->back()->with("status", "Güncelleme Başarılı");
                } else {
                    return redirect()->back()->with("status", "Güncelleme Başarısız. Lütfen Tekrar Deneyin.");
                }


            } else {
                return redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın");
            }
        }
    }
}
