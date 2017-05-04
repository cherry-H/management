<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Http\Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;



class ContactController extends Controller
{
    /**
     * show form
     *
     */
    public function showForm()
    {
        return View::make('contact')->with('pTitle', "Contact");
    }

    public function sendContactInfo(ContactMeRequest $request)
    {
        $data = $request->only('name', 'email', 'phone');
        $data['messageLines'] = explode('\n', $request->get('message'));

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
            $message->to(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'))
                ->subject('Contact Form:'.$data['name']);
        });

        return View::make('consicion_templates.contact_success')->with('pTitle', "Send Success");
    }
}