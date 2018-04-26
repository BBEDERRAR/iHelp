<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        if ($request->ajax()){
            Session::put('locale',$request->get('locale'));
            app()->setLocale($request->get('locale'));

            return response()->json(['locate'=>Session::get('locale')]);

        }
    }

}
