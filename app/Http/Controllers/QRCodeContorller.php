<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeContorller extends Controller
{
    public function index(){
        return view('qr-code.index');
    }
}
