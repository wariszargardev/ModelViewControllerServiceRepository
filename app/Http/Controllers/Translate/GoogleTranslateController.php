<?php

namespace App\Http\Controllers\Translate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class GoogleTranslateController extends Controller
{
    public function googleTranslate()
    {
        return view('translate.translate');
    }

    public function googleTranslateChange(Request $request)
    {
        App::setLocale($request->lang);

        Session::put('locale',$request->lang);

        return redirect()->back();
    }
}
