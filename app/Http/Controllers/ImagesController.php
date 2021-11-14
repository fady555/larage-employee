<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class ImagesController extends Controller
{
    public function show($a=0,$b=0)
    {

        $storagePath = storage_path('app/'.'/'.$a.'/'.$b);


        if(Storage::exists('/'.$a.'/'.$b)){

            return Image::make($storagePath)->response();
        }

        //return Image::make($storagePath)->response();
    }
}
