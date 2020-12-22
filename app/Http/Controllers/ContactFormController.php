<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Contact as Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Support\Arr;

class ContactFormController extends Controller
{
    public $captchas = [
        ['img'   => 'captcha2899.png', 'pass'  => 'cjkr'],
        ['img'   => 'captcha9692.png', 'pass'  => 'j9yr'],
        ['img'   => 'captcha8795.png', 'pass'  => '9v7ha'],
        ['img'   => 'captcha8453.png', 'pass'  => 'zz8v'],
        ['img'   => 'captcha7563.png', 'pass'  => 'tzftz'],
        ['img'   => 'captcha7447.png', 'pass'  => 'xat5b'],
        ['img'   => 'captcha5432.png', 'pass'  => '3jjk3'],
        ['img'   => 'captcha5018.png', 'pass'  => 'lbjk'],
        ['img'   => 'captcha4875.png', 'pass'  => 'ezt7'],
        ['img'   => 'captcha4797.png', 'pass'  => 'by2lc'],
        ['img'   => 'captcha4310.png', 'pass'  => 'zz8v'],
        ['img'   => 'captcha7798.png', 'pass'  => 'mbxhp']
    ];
    
    public function store(Request $request) {
        
        
        $data = $this->validateRequest();
        //dd($data);
        $contact = Contact::create($data);
        //$session_captcha = session('captcha');
        //$response_captcha = strtolower($data['captcha']);
        //$is_valid_captcha =  $this->verifyCaptcha($response_captcha, $session_captcha);
   
       // if($is_valid_captcha) {
            // Send email to miroslav@citizenship-program.com
           // Mail::to('miroslav@citizenship-program.com')->send(new ContactFormMail($data));
            //Mail::to('iwannikolic@gmail.com')->send(new ContactFormMail($data));
            // Redirect to contact page
           // return redirect('/contact-us#contact-section')->with('message', 'Thanks for contacting us, we will get back to you soon!');
         //} else {
            // return redirect('/contact-us#contact-section')->with('error', 'Invalid captcha!');
         //}      
         return back();
    }


    public function api_store(Request $request) {
             
        // $data = $this->validateRequest();
        // $session_captcha = session('captcha');
        // $response_captcha = strtolower($data['captcha']);
        // $is_valid_captcha =  $this->verifyCaptcha($response_captcha, $session_captcha);
   
        // if($is_valid_captcha) {
        //     // Send email to miroslav@citizenship-program.com
        //     Mail::to('miroslav@citizenship-program.com')->send(new ContactFormMail($data));
        //     // Redirect to contact page
        //     return 'Mail sucessfully sent!';
        // } else {
        //     return redirect('/contact-us#contact-section')->with('error', 'Invalid captcha!');
        // }      
        // return back();
    }


    public function callback(Request $request) {
        //
    }

    public function subscribe(Request $request) {
     //  
    }


    /**
     * check if the captcha number from from is valide
     * @param $response_captcha - number that we recived from form
     * @param $session_captcha  - number that we saved in session
     */
    private function verifyCaptcha($response_captcha, $session_captcha){
        return ($response_captcha === $session_captcha['pass']) ? true : false ;
    }

    /**
     * Request Validation
     *
     */
    private function validateRequest()
    {
        return request()->validate([
            'name'      => 'required|min:2',
            'email'     => 'required|email',
            'phone'     => 'required',
            'message'   => 'required',
            'captcha'   => 'required'
        ]);
    }
}
