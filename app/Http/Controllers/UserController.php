<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function upload_cv(REQUEST $request)
    {
      $validator = Validator::make($request->all(), [
         'email' => 'required|email',
         'image' => 'required|mimes:pdf|max:5024',
         'type' => 'required|in:cl,cv'
        ]);
        if ($validator->fails()) {
           return [
               'status' => 0,
               'message' => $validator->errors()->first()
           ];
        }
      if ($request->hasFile('image') && $request->file('image')->isValid()) {
         // code...
         $path = $request->image->store('documents');
         if ($request->type == 'cv') {
            // code...
            if (File::exists(public_path(User::where('email', $request->email)->first()->cvpath))) {
               // code...
               // File::delete(User::where('email', $request->email)->first()->cvpath);
               Storage::delete(User::where('email', $request->email)->first()->cvpath);
               User::where('email', $request->email)->first()->update(['cvpath' => $path]);
            }else{
               User::where('email', $request->email)->first()->update(['cvpath' => $path]);
            }

         }elseif ($request->type == 'cl') {
            // code...
            if (User::where('email', $request->email)->first()->coverletterpath !== null) {
               // code...
               File::delete(User::where('email', $request->email)->first()->coverletterpath);
               User::where('email', $request->email)->first()->update(['coverletterpath' => $path]);
            }else{
               User::where('email', $request->email)->first()->update(['coverletterpath' => $path]);
            }

         }

         return  response()->json([
            'message' => 'Uploaded',
            'status' => 1
         ]);
      }else{
         return  response()->json([
            'message' => "Ain't a file",
            'status' => 0
         ]);
      }
   }
}
