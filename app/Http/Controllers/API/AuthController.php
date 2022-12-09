<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'url' => 'required|unique:users',
            'key' => 'required|unique:users',
            'remarks' => 'max:55',
             'password' => 'required'

        ]);


         $project_code = Str::random(5);
        $service_code = Str::random(5);
         $validatedData['project_code'] = $project_code;
         $validatedData['service_code'] = $service_code;

           $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;



        return response([ 'access_token' => $accessToken,'project_code ' => $project_code,'service_code' => $service_code]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'project_code' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['expires_at' => auth()->user(), 'token' => $accessToken]);

    }
}
