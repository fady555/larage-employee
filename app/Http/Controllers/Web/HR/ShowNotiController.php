<?php

namespace App\Http\Controllers\web\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowNotiController extends Controller
{


    public function index(){

        if(!auth()->user()): return "no auth or verifiy"; endif;

            return view('hr.show_notification',['notifications'=>auth()->user()->notifications]);

            //return auth()->user()->notifications;
    }

    public function show($id){

        if(!auth()->user()): return "no auth or verifiy"; endif;

        return view('hr.show_notification',['notifications'=>auth()->user()->notifications]);

        //return auth()->user()->notifications->Where('id','=',"0134550c-0896-4d48-9fbf-5279825416d2")->first();

    }
}
