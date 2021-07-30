<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{

    public function login(Request $request){
        if($request->isMethod('POST')){
            $rules = [
                "username" => "required",
                "password" => "required",
            ];

            $validate = Validator::make($request->all(), $rules);

            if ($validate->fails()) {
                return response()->json(["status" => "Validation-Errors", "errors" => $validate->errors()->toArray()]);
            }
            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $data = User::where($fieldType, strtolower($request->username))
                ->orWhere('password', bcrypt($request->password))
                ->first();

            if($data && auth()->attempt(array($fieldType => $request->username, 'password' => $request->password)))
            {
                return response()->json(["status" => "Success", "html" => 'User has been registered successfully']);
            }else{
                return response()->json(["status" => "Validation-Errors", "errors" => ['username' => ['Username/Email or Password does not match.']]]);
            }
        }
        return view('pages.Auth.login');
    }

    public function signup(Request $request){
        if($request->isMethod('post')){
            $rules = [
                "username" => "required|unique:users",
                "email" => "required|email|unique:users",
                "password" => "required",
            ];

            $validate = Validator::make($request->all(), $rules);

            if ($validate->fails()) {
                return response()->json(["status" => "Validation-Errors", "errors" => $validate->errors()->toArray()]);
            }

            $data = new User();
            $data->username = strtolower($request->username);
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            if($data->save()){
                return response()->json(["status" => "Success", "html" => 'User has been registered successfully']);
            }
            abort(503);
        }

        return view('pages.Auth.sign-up');
    }

    public function success(){
        return view('pages.Auth.success');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
