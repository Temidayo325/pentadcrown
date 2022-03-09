<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Establishment;

class EstablishmentController extends Controller
{
   public function Create(Request $request)
   {
     if ($request->session()->has('admin')) {
           $validate = Validator::make($request->all(), [
              'name' => 'required|string|min:3|bail',
              'phone' => 'required|min:10|bail',
              'email' => 'required|email|bail'
           ]);
           if ($validate->fails()) {
              return  [
                 'status' => 0,
                 'message' => $validate->errors()->first()
              ];
           }
           $exists = Establishment::where('email' ,$request->email)->orWhere('phone', $request->phone)->first();
           if ($exists) {
              return response()->json([
                 'status' => 0,
                 'message' => 'Establishment already exists! Contact developer'
              ]);
           }else{
             $created = Establishment::create([
               'name' => $request->name,
               'phone' => $request->phone,
               'email' => $request->email,
               'active' => 1
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
          }


     }else{
         Redirect::route('admin');
     }
   }

  public function Read(Request $request)
  {
     if ($request->session()->has('admin')) {
        return response()->json([
           'status' => 1,
           'message' => Establishment::where('active', 1)->get()
        ]);
     }else{
        return Redirect::route('admin');
     }
  }

  public function Destroy(Request $request)
  {
     if ($request->session()->has('admin')) {
        $validate = Validator::make($request->all(), [
           'email' => 'required|email|exists:establishments|bail'
        ]);
        if ($validate->fails()) {
           return [
              'status' => 0,
              'message' => $validate->errors()->first()
           ];
        }
        $establishment = Establishment::where('email', $request->email)->first();
        if ($establishment) {
           $establishment->active = 0;
           $establishment->save();
           return response()->json([
              'status' => 1,
              'message' => "Establishment deleted successfully"
           ]);
        }else{
           return response()->json([
              'status' => 0,
              'message' => "Unable to delete Establishment"
           ]);
        }
     }else{
        Redirect::route('admin');
     }
  }
}
