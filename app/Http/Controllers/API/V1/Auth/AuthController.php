<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\HttpResponses;


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
                return HttpResponses::error('Validation error!',
                    $isUserValidated->errors(), 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return HttpResponses::success('User created successfully!');

        }
        catch (\Throwable $throwable){
            return HttpResponses::error('Error:',
                $throwable->getMessage(), 500);
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
                return HttpResponses::error('Validation error!',
                    $isUserValidated->errors(), 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return HttpResponses::error('Validation error!',
                    'Email and password does not match with our records!', 401);
            }

            $user = User::where('email', $request->email)->first();

            return HttpResponses::success('User logged in successfully!',
                $user->createToken('API-Token')->plainTextToken);
        }
        catch (\Throwable $throwable){
            return HttpResponses::error('Error:',
                $throwable->getMessage(), 500);
        }
    }
}
