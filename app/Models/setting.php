<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table = "setting";
    protected $guarded = [];

    public static function getSetting($text)
    {
        if (isset($text)){
            $setting=setting::limit(1)->get();
            return $setting[0][$text];
        }
    }
}
