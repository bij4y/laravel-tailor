<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'password'=> 'required',

        ]
    );
    if($validator->fails()){
        return response()->json([
            'message' => 'Bad Request',
            'code' => 401
        ]);
    }
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->mobile = $request->mobile;
    $user->password = Hash::make($request->password);
    $user->save();
    return response()->json(
        [
            'message' => 'User Created',
            'code' => 200
        ]
    );

    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
        [

            'email' => 'required',
            'password' =>'required',
        ]
        );
    if($validator->fails()){
        return response()->json([
            'message' => 'Bad Request',
            'code' => 401,
        ]);
    }
    $credentials = request(['email','password']);
    if(!Auth::attempt($credentials)){
        return response()->json([
            'code' => 500,
            'message' => 'UnAuthorized',
        ]);
    }
    $user = User::where('email', $request->email)->first();
    $tokenResult = $user->createToken('authToken')->plainTextToken;
    return response()->json([
        'token' => $tokenResult,
        'code' => 200
    ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'TokenDeleted',
            'code' => 200
        ]);
    }
    // public function edit(Request $request)
    // {
    //     $user = User::find($->name);

    // }
}
