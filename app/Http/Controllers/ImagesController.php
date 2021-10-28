<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Image;

class ImagesController extends Controller
{
    public function show($user_id, $slug)
    {
        $storagePath = storage_path('app/images/users/' . $user_id . '/' . $slug);

        Image::make();
        return Image::make($storagePath)->response();

    }
}
