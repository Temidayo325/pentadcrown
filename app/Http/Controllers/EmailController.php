<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Email;
use App\Templates\Verify;

class EmailController extends Controller
{
    public function sendMail(REQUEST $request)
    {
      $validated = Validator::make($request->all(),[
         'name' => 'required|string|min:5',
         'email' => 'required|email|bail',
         'header' => 'required|string|min:5',
         'body' => 'required|string|min:5'
      ]);

      if ($validated->fails()) {
         return response()->json([
            'status' => 0,
            'message' => $validated->errors()->first()
         ]);
      }

      Email::addToList('pentadcrown', $request->email);
      $email_to_send = Verify::boot($request);
      Email::sendHTML('temi325@gmail.com', $email_to_send, "You have a new Email");
      // Email::send("", "Message has been sent succesfully", $request->header);
      return response()->json([
         'status' => 1,
         'message' => "Your message has been sent, we will get back to you shortly"
      ]);
    }
}
