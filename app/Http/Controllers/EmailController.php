<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendMail(REQUEST $request)
    {
      $validated = $request->validate([
         'name' => 'required|string|min:5',
         'email' => 'required|email|bail',
         'title' => 'required|string|min:5',
         'body' => 'required|string|min:5'
      ]);

      
    }
}
