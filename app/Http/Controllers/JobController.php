<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function getCategories()
    {
      return response()->json([
         'categories' => Title::select('job')->get()
      ]);
    }
    public function addUserCategories(REQUEST $request)
    {
      if (Auth::check()) {
         $validator = Validator::make($request->all(), [
            'email' => 'required|email|bail|exists:users',
            'jobs' => 'required'
          ]);

           if ($validator->fails()) {
              return response()->json([
                  'status' => 0,
                  'message' => $validator->errors()->first()
              ]);
           }

            $user = User::where('email', $request->email)->first();
            $user->jobs = $request->jobs;
            $user->save();
            return response()->json([
                'status' => 1,
                'message' => "Updated successfully"
            ]);
      }else{
         return route('login');
      }

    }

    public function addAdminCategory(Request $request, Title $title)
    {

      if ($request->session()->has('admin')) {
         // code...
         $validated = Validator::make($request->all(), [
            'category' => 'required|string'
         ]);
         if ($validated->fails()) {
            return [
                'status' => 0,
                'message' => $validated->errors()->first()
            ];
         }
         $jobs = Title::create([
            'job' => $request->category
         ]);
         return ($jobs) ? response()->json([
               'status' => 1,
               'message' => "Created successfully"
            ]) : response()->json([
                  'status' => 0,
                  'message' => "Wahala dey here o"
               ]);
      }else{
         return Redirect::route('admin');
      }

    }

    public function removeCategory(Request $request)
    {
      $hash = $request->session()->get('admin');
      if ($request->session()->has('admin') && Hash::check('helloworld173688^&*()', $hash)) {
         // code...
         $validator = Validator::make($request->all(), [
            'category' => 'required|string|bail'
         ]);
         if ($validator->fails()) {
            return [
               'status' => 0,
               'message' => $validator->errors()->first()
            ];
         }

         $category = Title::where('job', $request->category)->first();
         $category->delete();
         return response()->json([
            'status' => 1,
            'message' => "Category removed successfully"
         ]);
      }else{
         return response()->json([
            'status' => 0,
            'message' => "My Comrade my Comrade, no be so life be o",
            'who' => $hash
         ]);
      }
    }
}
