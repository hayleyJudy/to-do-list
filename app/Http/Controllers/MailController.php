<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\OfferMail;
use Mail;


class MailController extends Controller
{
    public function sendOfferMail()
    {
        $email = 'nazlieda95@gmail.com';
   
        $offer = [
            'title' => 'Deals of the Day',
            'url' => 'https://www.remotestack.io'
        ];
  
        Mail::to($email)->send(new OfferMail($offer));
   
        // dd("Mail sent!");
        return redirect('/dashboard'); 
    }
}