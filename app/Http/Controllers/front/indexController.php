<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\support\functionController;
use App\Models\contact;
use App\Models\product;
use App\Models\productApplication;
use App\Models\productGallery;
use App\Models\productInformation;
use App\Models\project;
use App\Models\projectGallery;
use App\Models\setting;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return View("front.index");
    }

    public function about()
    {
        return View("front.about");
    }

    public function mission()
    {
        return View("front.mission");
    }

    public function vision()
    {
        return View("front.vision");
    }

    public function service()
    {
        return View("front.service");
    }

    public function product()
    {
        return View("front.product");
    }

    public function productDetail(Request $request)
    {

        if (isset($request->id)) {
            $id = functionController::security($request->id);
            $product = product::where("id", $id)->get();
            if ($product[0]["name"]) {
                $gallery = productGallery::where("productId", $id)->get();
                $information = productInformation::where("productId", $id)->get();
                $application = productApplication::where("productId", $id)->get();
                return View("front.productDetail", ["product" => $product, "gallery" => $gallery, "information" => $information, "application" => $application]);
            } else {
                return redirect(route("indexHtml"));
            }
        } else {
            return redirect(route("indexHtml"));
        }


        return View("front.productDetail");
    }

    public function project()
    {
        return View("front.project");
    }

    public function projectDetail(Request $request)
    {
        if (isset($request->id)) {
            $id = functionController::security($request->id);
            $project = project::where("id", $id)->get();
            if ($project[0]["title"]) {
                $gallery = projectGallery::where("projectId", $id)->get();
                return View("front.projectDetail",["project"=>$project,"gallery"=>$gallery]);
            }else{
                return redirect(route("indexHtml"));
            }
        }else{
            return redirect(route("indexHtml"));
        }
    }

    public function contact()
    {
        return View("front.contact");
    }

    public function pdfCatalog()
    {
        return View("front.pdfCatalog");
    }


    public function contactCreate(Request $request)
    {
        if (isset($request->name) && isset($request->email) && isset($request->subject) && isset($request->message)) {
            $name = functionController::security($request->name);
            $email = functionController::security($request->email);
            $subject = functionController::security($request->subject);
            $message = functionController::security($request->message);


            $all = [
                "name" => $name,
                "email" => $email,
                "subject" => $subject,
                "message" => $message
            ];

            $create = contact::create($all);
            if ($create) {
                return redirect()->back()->with("status", "Mesajınız Başarılı Bir Şekilde İletildi. En Kısa Sürede Size Dönüş Yapılacaktır.");
            } else {
                return redirect()->back()->with("status", "Mesajınız İletilemedi. Lütfen Tekrar Deneyin!");
            }

        } else {
            return redirect()->back()->with("status", "Lütfen Boş Alan Bırakmayın!");
        }
    }






    // Sitemap Start
    public function sitemap()
    {
        header('Content-type: Application/xml; charset="utf8"', true);
        $xml_path = setting::getSetting("siteUrl")."/sitemap.xml";
        define("PATH",setting::getSetting("siteUrl"));

        $xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xml_output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml_output.="<url><loc>".PATH."/</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/index</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/index.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/hakkimda</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/hakkimda.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/misyon</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/misyon.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/vizyon</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/vizyon.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/urunler</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/urunler.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/hizmetler</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/hizmetler.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/projeler</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/projeler.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/iletisim</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/iletisim.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/pdfkataloglari</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        $xml_output.="<url><loc>".PATH."/pdfkataloglari.html</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";

        $product = product::get();
        foreach($product as $productWrite) {
            $xml_output.="<url><loc>".PATH."/urunler/".$productWrite->id."/".functionController::seo($productWrite->name).".html"."</loc><lastmod>".substr($productWrite->created_at,0,11)."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        }

        $project = project::get();
        foreach($project as $projectWrite) {
            $xml_output.="<url><loc>".PATH."/projeler/".$projectWrite->id."/".functionController::seo($projectWrite->name).".html"."</loc><lastmod>".substr($projectWrite->created_at,0,11)."</lastmod><changefreq>daily</changefreq><priority>0.8</priority></url>";
        }


        $xml_output .= "</urlset>";


        print_r($xml_output);
    }

    // Sitemap Finish








}
