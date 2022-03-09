<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Title;
use App\Models\User;
use App\Models\Shortlisted;

use App\Services\Validate;
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

            if ($request->search !== '' || $request->search !== undefined || $request->search !== null) {
               // code...
               $request->session()->put('search', Validate::alphabet($request->search));
               return response()->json([
                  'status' => 1,
                  'message' => User::doesntHave('shortlisteds')->search($request->search)->paginate(10)
               ]);
            }else{
               return response()->json([
                  'status' => 1,
                  'message' => User::doesntHave('shortlisteds')->search($request->session()->get('search'))->paginate(15)
               ]);
            }

      }else{
         return Redirect::route('admin');
      }
    }
}
