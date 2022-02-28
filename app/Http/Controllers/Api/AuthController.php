<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\GenralTraits;
use Validator;



class AuthController extends Controller
{
    use GenralTraits;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ],[
            'email.required'=>'this input must have value',
            'email.email'=>'this input must have email',
            'password.required'=>'this input must have value',
            'password.string'=>'this input must have string value',
            'password.min'=>'this input must have over 6 character',
        ]);
        if ($validator->fails()) {
            return $this->returnError(422, 'sorry this is have error', 'Errors', $validator->errors());
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return $this->returnError(501, 'UNUtherized');
        }
        return $this->createNewToken($token, 201, 'you are logged in');
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return $this->returnError(422, 'sorry this is have error', 'Errors', $validator->errors());
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));
        return $this->returnSuccess(201, 'User successfully registered', 'user', $user);

    }
}

