<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AjaxImageUploadController extends Controller
{
    public function create(){
        return view('ajax.ajax-image-upload');
    }

    public function formSubmit(Request $request)
    {
        $path = Storage::disk('public')->put('images',$request->file);
        $response = Storage::disk('public')->url($path);
        return response()->json(['message' => 'File Uploaded Successfully.','path' => $response]);
    }
}
