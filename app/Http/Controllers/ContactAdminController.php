<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCustomerMail;
class ContactAdminController
{
    /**
     * Manage contacts
     */
    public function contacts()
    {
        $contacts = Contact::all();
        return view('admin.contacts', compact('contacts'));
    }

    public function send_mail($id )
    {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    public function mail(MailRequest $request, $id)
    {
        $data = Contact::find($id);
        $input = $request->validated();
        $details = [
        'greeting' => $input['greeting'],
        'body' => $input['body'],
        'action_text' => $input['action_text'],
        'action_url' => $input['action_url'],
        'end_line' => $input['end_line'],
        'to_email' => $data->email
        ];

        if(Mail::to($details['to_email'])->send(new SendCustomerMail($details))) {
            return redirect()->back()->with('message', "send mail to" . $details['to_email'] . "successfully!");
        }
        return redirect()->back();
    }
}
