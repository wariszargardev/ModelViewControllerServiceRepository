<?php

namespace App\Http\Controllers\Passport;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function userRegister(Request $request)
    {
        $request = $request->all();

        $validator = Validator::make($request,[
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $request['password'] = Hash::make($request['password']);

        User::create($request);

        return response()->json(['status' => true, 'message' => 'User successfully register.' ], 200);
    }

    public function userLogin(Request $request)
    {
        $request = $request->all();

        $validator = Validator::make($request,[
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if(! Auth::attempt($request)){

            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response()->json(['user' => auth()->user(), 'access_token' => $accessToken], 200);
    }

    public function userDetail(Request $request)
    {
        $user = $request->user();

        return response()->json(['user' => $user], 200);
    }

    public function logout (Request $request)
    {
        $token = $request->user()->token();

        $token->revoke();

        $response = ['message' => 'You have been successfully logged out!'];

        return response()->json($response, 200);
    }
}
