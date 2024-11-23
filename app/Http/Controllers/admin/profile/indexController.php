<?php

namespace App\Http\Controllers\admin\profile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\profile;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $profile=profile::limit(1)->get();
        return View("admin.profile.index",["profile"=>$profile]);
    }

    public function save(Request $request)
    {
        if (isset($request->username) && isset($request->oldPassword) && isset($request->password) && isset($request->passwordRepeat)) {
            $profile = profile::limit(1)->get();
            $username = functionController::security($request->username);
            $oldPassword = functionController::security($request->oldPassword);
            $password = functionController::security($request->password);
            $passwordRepeat = functionController::security($request->passwordRepeat);

            if ($password == $passwordRepeat) {

                if (hash("sha256",$oldPassword)==$profile[0]["password"]) {
                    $all = [
                        "username"=>$username,
                        "password"=>hash("sha256",$password),
                    ];

                    $update = profile::where("id", $profile[0]["id"])->update($all);
                    if ($update) {
                        return redirect()->back()->with("status", " Başarı ile güncellendi.");
                    } else {
                        return redirect()->back()->with("status", "güncellenemedi. Lütfen Tekrar Deneyin.");
                    }
                }else{
                    return redirect()->back()->with("status", "mevcut parola yanlış. Lütfen Tekrar Deneyin.");
                }
            }else{
                return redirect()->back()->with("status", "parolalar aynı değil. Lütfen Tekrar Deneyin.");
            }

        } else {
            return redirect()->back()->with("status", "Lütfen Boş ALan Bırakmayın.");
        }
    }
}
