<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /*
     * Create user.
     * @param Request $request
     * @return User
     */
    public function registerUser(Request $request){
        try {
            $isUserValidated = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($isUserValidated->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error!',
                    'error' => $isUserValidated->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User created successfully!',
                'token' => $user->createToken('API-Token')->plainTextToken
            ], 200);

        }
        catch (\Throwable $throwable){
            return response()->json([
                'status' => false,
                'message' => $throwable->getMessage(),
            ], 500);
        }


    }

    /*
    * Login user.
    * @param Request $request
    * @return User
    */
    public function loginUser(Request $request){
        try{
            $isUserValidated = Validator::make($request->all(),[
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ]);

            if($isUserValidated->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error!',
                    'error' => $isUserValidated->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email and password does not match with our records!',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully!',
                'token' => $user->createToken('API-Token')->plainTextToken
            ], 200);
        }
        catch (\Throwable $throwable){
            return response()->json([
                'status' => false,
                'message' => $throwable->getMessage(),
            ], 500);
        }
    }
}
