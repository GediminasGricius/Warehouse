<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLanguage($lang, Request $request){
        $request->session()->put('lang',$lang);
        return redirect()->back();
    }
}
