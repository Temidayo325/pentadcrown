<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shortlisted;
use App\Models\User;
use App\Models\Notification;

class ShortListedController extends Controller
{
    public function create(Request $request)
    {
         if ($request->session()->has('admin')) {
            $validator = Validator::make($request->all(), [
               'email' => 'required|email'
            ]);
            if ($validator->fails()) {
               return  [
                  'status' => 0,
                  'message' => $validator->error()->first()
               ];
            }
            $usersExists = Shortlisted::where('email', $request->email)->first();
            if ($usersExists === null) {
                  Shortlisted::create([
                     'email' => $request->email
                  ]);
                  return  response()->json([
                     'status' => 1,
                     'message' => "User Shortlisted!"
                  ]);
            }else{
               return  response()->json([
                  'status' => 0,
                  'message' => "Oops! Seems the User has been short listed previously"
               ]);
            }
         }else{
            return Redirect::route('admin');
         }
    }

    public function destroy(Request $request)
    {
         if ($request->session()->has('admin')) {
               $validator = Validator::make($request->all(), [
                  'email' => 'required|email|bail'
               ]);
               if ($validator->fails()) {
                  return  [
                     'status' => 0,
                     'message' => $validator->error()->first()
                  ];
               }
               $user = ShortListed::where('email', $request->email)->first();
               if ($user) {
                  $user->delete();
                  return response()->json([
                     'status' => 1,
                     'message' => "User removed from short list"
                  ]);
               }else{
                  return response()->json([
                     'status' => 0,
                     'message' => "Invalid request"
                  ]);
               }
         }else{
            return Redirect::route('admin');
         }
    }

    public function read(Request $request)
    {
       if ($request->session()->has('admin')) {
          return response()->json([
             'status' => 1,
             'message' => Shortlisted::select('email')->orderByDesc('created_at')->offset($request->start)->limit(15)->get()->map(function ($item, $key){
                return User::where('email', $item->email)->first();
             }),
             'templates' => Notification::all()
          ]);
       }else{
          return Redirect::route('admin');
       }
    }

    public function sendMail(Request $request)
    {
      if ($request->session()->has('admin')) {
         // code...
         $validate = Validator::make($request->all(), [
            'email' => 'required|email'
         ]);
         if ($validate->fails()) {
            return [
               'status' => 0,
               'message' => $validate->error()->first()
            ];
         }
         // send mail
         return response()->json([
            'status' => 1,
            'message' => "Mail sent successfully"
         ]);
      }else{
         Redirect::route('/admin');
      }
    }

    public function sendAttachment(Request $request)
    {
      if ($request->session()->has('admin')) {
         $validate = Validator::make($request->all(), [
            'establishment' => 'required|email',
            'user' => 'required|email'
         ]);
         if ($validate->fails()) {
            return [
               'status' => 0,
               'message' => $validate->error()->first()
            ];
         }
         // retrieve User cv
         $userCv = User::select('cvpath')->where('email', $request->user)->first();
         // send the cv as attachment
         return response()->json([
            'status' => 0,
            'message' => "Attachment of the candidate has been sent successfully"
         ]);
      }else{
         Redirect::route('/admin');
      }
    }
}
