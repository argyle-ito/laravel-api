<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|max:55',
            'owner_name' => 'required|max:55',
            'key' => 'required|max:55|unique:users',
            'name' => 'required|max:55',
            'url' => 'required',
            'remarks' => 'max:55',


        ]);


         $project_code = "PAB01";
        $service_code = "UYZ99";
         $validatedData['project_code'] = $project_code;
         $validatedData['service_code'] = $service_code;

        //    $validatedData['password'] = bcrypt("s3cretpass");
        //    $validatedData['user'] = "sample-user_1";
              $validatedData['user'] = "sample";
              $validatedData['password'] = bcrypt("s3cret");
        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;



        return response()->json(['project_code' => $project_code,'service_code' => $service_code],Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'user' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $limited = Carbon::now()->addHours(2);


        return response()->json([ 'token' => $accessToken,'expires_at' => $limited],Response::HTTP_OK);

    }
}
