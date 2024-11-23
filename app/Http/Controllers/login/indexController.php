<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index()
    {
        if (session("userInfo")) {
            return redirect(route("admin.index"));
        } else {
            return View("login.index");
        }
    }

    public function login(Request $request)
    {
        if (session("userInfo")) {
            return redirect(route("admin.index"));
        } else {
                if (isset($request->Username) && isset($request->Password)) {
                    $username = functionController::security($request->Username);
                    $password = functionController::security($request->Password);

                    $profile=profile::limit(1)->get();
                    if ($username==$profile[0]["username"]) {
                        if (hash("sha256",$password)==$profile[0]["password"]) {
                            $usernameControl=[
                                "username"=>$username,
                                "password"=>$password
                            ];
                            Session::put("userInfo", $usernameControl);
                            return redirect(route("admin.index"));
                        } else {
                            return redirect(route("login.index"))->with("status", "Parola bilgisi yanlış girildi.");
                        }
                    } else {
                        return redirect(route("login.index"))->with("status", "Kullanıcıadı bilgisi yanlış girildi.");
                    }
                } else {
                    return redirect(route("login.index"))->with("status", "Lütfen boş alan bırakmayın.");
                }
        }
    }

    public function logOut(Request $request)
    {
        $request->session()->flush();
        if (session("userInfo")){
            return redirect()->back()->with("status","Çıkış işlemi başarılamadı.");
        }else{
            return redirect(route("login.index"));
        }
    }

}
