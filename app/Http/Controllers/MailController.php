<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\UploadMail;

class MailController extends Controller
{
    public function sendmail()
    {
        Mail::to('dummy@email.com')
            ->send(new TestMail());
    }

    public function file()
    {
        Mail::to('dummy@email.com')
            ->send(new TestMail());
    }

    public function form()
    {
        return view('form.form');
    }

    public function upload()
    {
        request()->file('upload')->storeAs(null, 'testing123.jpg');

        $mail = new UploadMail();
        $mail->attach(\storage_path('app/public/testing123.jpg'));

        Mail::to('dummy@123.com')
            ->send($mail);
    }

    public function withoutSaving()
    {
        $mail = new UploadMail();
        $mail->attach(request()->file('upload')->getRealPath(), [
            'as' => 'new-file-without-saving.jpg',
            'mime' => request()->file('upload')->getClientMimeType()
        ]);

        Mail::to('dummy@123.com')
            ->send($mail);
    }
}
