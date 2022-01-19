<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Title;
use App\Models\User;
use App\Models\Shortlisted;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function Login(Request $request)
    {

         $check = $request->validate([
            'email' => 'required|email|bail|exists:admins',
            'password' => 'required|min:8'
         ]);
         $admin = Admin::where('email', $request->email)->first();
        if (Hash::check($request->password, $admin->password) && $admin->exists()) {
            $request->session()->put('admin', Hash::make('helloworld173688^&*()'));
             return Redirect::route('iamtheadmin');
        }else{
           return [
               'status' => 0,
               'message' => "Invalid Credentials"
           ];
        }
    }

    public function Dashboard()
    {
      return Inertia::render('Admin/IamTheAdmin');
    }

    public function Search(Request $request)
    {
      if ($request->session()->has('admin')) {
            $validator = Validator::make($request->all(), [
               'search' => 'required|min:3|string'
            ]);

            if ($validator->fails()) {
               return  [
                  'status' => 0,
                  'message' => $validator->errors()->first()
               ];
            }
            // $request->session()->put('search','search');
            return response()->json([
               'status' => 1,
               'message' => User::doesntHave('shortlisteds')->search($request->search)->paginate(15)
            ]);
      }else{
         return Redirect::route('admin');
      }
    }
}
