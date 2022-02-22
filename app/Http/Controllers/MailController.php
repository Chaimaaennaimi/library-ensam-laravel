<?php

namespace App\Http\Controllers;

use App\Mail\NotifMail;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function writeMail($id){
        $data=Etudiant::find($id);

        return view("emails.writeEmail", compact('data'));
    }

    public function sendMail(Request $request){

        $details = [
            'title' => $request->title,
            'body' => $request->body
        ];
        Mail::to($request->email)->send(new NotifMail($details));
        return redirect()->to('/');
    }

}
