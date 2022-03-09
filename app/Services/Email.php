<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Mail\AttachmentMail;
/**
 *
 */
class Email
{

    public static function addToList($list_name, $email)
    {
        $response = Http::asForm()->post(config('elastic.mail.list_url'), [
            'publicAccountID' => config('elastic.mail.public_id'),
            'email' => $email,
            'listName' => $list_name,
            'sendActivation' => false,
        ]);
        return $response->body();
    }

    public static function send($email, $message, $subject)
    {
      $response = Http::retry(3, 1000)->asForm()->post(config('elastic.mail.send_url'), [
                  'apikey' => config('elastic.mail.api_key'),
                  'subject' => $subject,
                  'bodyText' => $message,
                  'from' => 'Opeyemi@lumina.com.ng',
                  'fromName' => 'Opeyemi from PentadCrown',
                  'to' => $email,
      ]);
      return $response->body();

    }

    public static function sendHTML($email, $subject)
    {
      $response = Http::retry(3, 1000)->asForm()->post(config('elastic.mail.send_url'), [
                  'apikey' => config('elastic.mail.api_key'),
                  'subject' => $subject,
                  'bodyHtml' => new AttachmentMail(),
                  'from' => 'Opeyemi@lumina.com.ng',
                  'fromName' => 'Opeyemi from PentadCrown',
                  'to' => $email,
      ]);
      return $response->body();

    }

    public static function sendTemplate($email, $template)
    {
      $response = Http::retry(3, 1000)->asForm()->post(config('elastic.mail.send_url'), [
                  'apikey' => config('elastic.mail.api_key'),
                  'subject' => 'Welcome to ExpenseX',
                  'template' => $template,
                  'from' => config('elastic.mail.from'),
                  'fromName' => 'Kelvin from ExpenseX',
                  'to' => $email,
      ]);
      return $response->body();
   }

   public static function uploadFile()
   {
      $url = base64_encode(public_path('storage/5nZiPtd1lvqP3VRbEVoN7iMCnHF42BG8bjcxIklM.pdf'));
      $response = Http::retry(3, 1000)->asForm()->post(config('elastic.mail.upload_url'), [
                  'apikey' => config('elastic.mail.api_key'),
                  'name' => $url,
                  'expiresAfterDays' => 1,
                  'enforceUniqueFileName' => false
      ]);
      // echo $url;
      // 'file_1' => new CurlFile($file_name_with_full_path, $filetype, $filename));
      return $response->body();
   }
   public static function tryFile()
   {
      $url = base64_encode(public_path('storage/5nZiPtd1lvqP3VRbEVoN7iMCnHF42BG8bjcxIklM.pdf'));
      // $url = public_path('documents/5nZiPtd1lvqP3VRbEVoN7iMCnHF42BG8bjcxIklM.pdf');//('5nZiPtd1lvqP3VRbEVoN7iMCnHF42BG8bjcxIklM.pdf');
      $response = Http::attach('attachment', $url)->retry(3, 1000)->asForm()->post(config('elastic.mail.send_url'), [
            'apikey' => config('elastic.mail.api_key'),
            'subject' => "CV of the staff you requested for",
            'bodyText' => "Attached is a the CV of the staff that you requested for",
            'from' => 'Opeyemi@lumina.com.ng',
            'fromName' => 'Opeyemi from PentadCrown',
            'to' => "temi325@gmail.com"
      ]);
      $url = public_path('storage/5nZiPtd1lvqP3VRbEVoN7iMCnHF42BG8bjcxIklM.pdf');
      return $response->body();

      // return $url;
   }
}
