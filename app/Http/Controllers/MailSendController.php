<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{

    public function sendEMail($order_id, $book_title, $price, $email)
    {
       $subject = "Order Confirmation | QuickDigital";
       Mail::to($email)->send(new ConfirmMail($subject, $order_id, $book_title, $price, $email));

       $order_id = session()->get('order_id');
       $book_id = session('book_id');      
       $book_title = session()->get('book_title');
       $price = session('price');                                                                                                                              
       $email = session()->get('email');

        return redirect()->route('successPay', [
            'order_id' => $order_id,
            'book_id' => $book_id,
            'book_title' => $book_title,
            'price' => $price,
            'email' => $email,
        ]);
    }

}
