<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subcribe;
use Illuminate\Http\Request;
use Mail;
use Session;

class MailController extends Controller
{
    public function sub_mail(Request $request)
    {
        $data = $request->all();
        $Submail = new Subcribe;
        $Submail->SubcribeEmail = $data['mail_sub'];
        $Submail->SubcribeStatus = 0;
        $Submail->save();
        Session::put('email_note', 'Cảm ơn bạn đã đăng kí !');

        return redirect()->back();
    }

    public function send_mail(Request $request)
    {
        $data_contact = $request->all();
        $contact = new Contact;
        $contact->ContactName = $data_contact['customerName'];
        $contact->ContactEmail = $data_contact['customerEmail'];
        $contact->ContactSubject = $data_contact['contactSubject'];
        $contact->ContactMessage = $data_contact['contactMessage'];
        $contact->save();
        $mail_ = $data_contact['customerEmail'];
        $Subject = $data_contact['contactSubject'];
        $Mes = $data_contact['contactMessage'];
        $to_name = $data_contact['customerName'];
        $to_email = 'thienkun0235@gmail.com'; // send to this email
        //
        $data = ['mail_' => $mail_, 'name' => $Subject, 'body' => $Mes]; // body of mail.blade.php
        //
        Mail::send('pages.Introduce.contact_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Thư được gửi từ khách hàng của ORANGE-FURNi'); // send this mail with subject
            $message->from($to_email, $to_name); // send from this mail

        });
        Session::put('contact', 'Cảm ơn bạn đã liên hệ với chúng tôi !');

        return redirect()->back();
    }

    public function mail_manager()
    {
        $mail_list = Contact::orderby('ContactID', 'DESC')->get();

        return view('admin.email.inbox')->with(compact('mail_list'));
    }

    public function write_mail()
    {
        return view('admin.email.write');
    }

    public function read_mail($ContactID)
    {
        $detail = Contact::where('ContactID', $ContactID)->first();

        return view('admin.email.read')->with(compact('detail'));
    }

    public function reply_email($ContactID)
    {
        $reply = Contact::where('ContactID', $ContactID)->first();

        return view('admin.email.reply')->with(compact('reply'));
    }

    public function admin_send_mail(Request $request)
    {
        $data_contact = $request->all();
        $Subject = $data_contact['Subject'];
        $Mes = $data_contact['Message'];
        $to_name = 'ORANGE-FURNi';
        $to_email = $data_contact['Cusemail'];
        //
        $data = ['mail_' => 'ADMIN-ORANGE', 'name' => $Subject, 'body' => $Mes]; // body of mail.blade.php
        //
        Mail::send('pages.Introduce.contact_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Thư được gửi từ ORANGE-FURNi'); // send this mail with subject
            $message->from($to_email, $to_name); // send from this mail

        });

        return redirect()->back();
    }
}
