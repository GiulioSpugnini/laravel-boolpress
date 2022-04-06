<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactMessageController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email',
                'message' => 'required'
            ],
            [
                'email.required' => 'La mail è obbligatoria',
                'email.email' => 'La mail non è valida',
                'message.required' => 'Il testo del messaggio è obbligatorio'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $mail = new ContactMessageMail($data);
        Mail::to(env('MAIL_ADMIN_ADDRESS'))->send($mail);
        return  response('Mail sent', 204);
    }
}
