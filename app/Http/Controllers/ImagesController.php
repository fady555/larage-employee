<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

class ImagesController extends Controller
{
    public function show($a,$b)
    {

        $storagePath = storage_path('app/'.'/'.$a.'/'.$b);
        return Image::make($storagePath)->response();
    }
}
