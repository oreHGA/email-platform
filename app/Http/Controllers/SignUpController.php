<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SubscribeRequest;

class SignUpController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function subscribe(SubscribeRequest $request){
        $subscriber = new Subscriber([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);

        $subscriber->save();

        Mail::send('emails.subscribed', ['name' => $subscriber->firstname ], function ($message) use ( $subscriber ){
            $message->from('og@emailplatform.com', 'Email Platform');
            $message->to( $subscriber->email );
        });

        return back()->with(['success' => "You have successfully been subscribed to our email platform"]);
    }
}
