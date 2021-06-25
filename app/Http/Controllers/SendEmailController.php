<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        // $tasks = auth()->user()->tasks();
        return view('send-email');
    }

    public function sendemail()
    {
    	return view('send-email');
    }

    public function saveToDb(Request $request){
        $data["email"]=$request->get("email");
        $data["client_name"]=$request->get("client_name");
        $data["subject"]=$request->get("subject");
        $data["text"]=$request->get("text");
 
        // $pdf = PDF::loadView('test', $data);
 
        try{
            // Mail::send('mails.mail', $data, function($message)use($data,$pdf) {
            Mail::send('mails.mail', $data, function($message) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->text($data["text"]);
            // ->attachData($pdf->output(), "invoice.pdf");
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";
 
        }else{
 
           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return response()->json(compact('this'));
 }
}
