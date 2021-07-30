<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserManageController extends Controller
{

    public function editProfile(Request $request, $tags = null)
    {
        if ($request->isMethod('post')) {
            $rules = [
                "first_name" => "required",
                "last_name" => "required",
                "phone" => "required|numeric",
                "about_me" => "required",
            ];

            $validate = Validator::make($request->all(), $rules);

            if ($validate->fails()) {
                return response()->json(["status" => "Validation-Errors", "errors" => $validate->errors()->toArray()]);
            }

            $data = User::findOrFail(Auth::user()->id);
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->phone = $request->phone;
            $data->about_me = $request->about_me;
            if($data->save()){
                return response()->json(["status" => "Success", "html" => "Profile Details updated successfully."]);
            }
            abort(503);
        }
        return view('pages.Settings.EditProfile');
    }

    public function editLoginDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                "username" => "required",
                "password" => "required",
            ];

            $validate = Validator::make($request->all(), $rules);

            if ($validate->fails()) {
                return response()->json(["status" => "Validation-Errors", "errors" => $validate->errors()->toArray()]);
            }

            $data = User::findOrFail(Auth::user()->id);
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            if($data->save()){
                return response()->json(["status" => "Success", "html" => "Login Details updated successfully."]);
            }
            abort(503);
        }
        return view('pages.Settings.LoginSettings');
    }


}
