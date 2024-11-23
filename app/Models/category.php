<?php

namespace App\Models;

use App\Http\Controllers\support\functionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    protected $guarded = [];


    public static function getSingle($id)
    {
        if (isset($id)){
            $id=functionController::security($id);
            $category=category::where("id",$id)->get();
            if ($category[0]["name"]){
                return $category[0]["name"];
            }
        }
    }
}
