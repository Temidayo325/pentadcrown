<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function Create(Request $request)
    {
      if ($request->session()->has('admin')) {
            $validate = Validator::make($request->all(), [
               'type' => 'required|string|min:3|bail',
               'content' => 'required|string|min:10|bail'
            ]);
            if ($validate->fails()) {
               return  [
                  'status' => 0,
                  'message' => $validate->errors()->first()
               ];
            }
            $created = Notification::create([
               'type' => $request->type,
               'content' => $request->content
            ]);
            if ($created) {
               return response()->json([
                  'status' => 1,
                  'message' => "Message saved successfully"
               ]);
            }else{
               return response()->json([
                  'status' => 0,
                  'message' => "Unable to save the message"
               ]);
            }

      }else{
         return Redirect::route('admin');
      }
    }

   public function Read(Request $request)
   {
      if ($request->session()->has('admin')) {
         return response()->json([
            'status' => 1,
            'message' => Notification::get()
         ]);
      }else{
         Redirect::route('admin');
      }
   }

   public function destroy(Request $request)
   {
      if ($request->session()->has('admin')) {
         $validate = Validator::make($request->all(), [
            'type' => 'required|string|min:3|bail'
         ]);
         if ($validate->fails()) {
            return [
               'status' => 0,
               'message' => $validate->errors()->first()
            ];
         }
         $notification = Notification::where('type', $request->type)->first();
         if ($notification) {
            $notification->delete();
            return response()->json([
               'status' => 1,
               'message' => "Notification deleted successfully"
            ]);
         }else{
            return response()->json([
               'status' => 0,
               'message' => "Unable to delete Notification"
            ]);
         }
      }else{
         Redirect::route('admin');
      }
   }
}
