<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorLoginController extends Controller
{
    public function doctorLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){

            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])){

            config(['auth.guards.api.provider' => 'doctor']);

            $token = Auth::guard('doctor')->user()->createToken('MyApp',['doctor'])->accessToken;

            return response()->json(['token' => $token], 200);

        }else{

            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    public function doctorDashboard()
    {
        return response()->json(Auth::guard('doctor')->user());
    }
}
