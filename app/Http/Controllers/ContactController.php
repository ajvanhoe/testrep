<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function store() {


        $data = $this->validateRequest();


        //dd(request()->all());

        // Send email

            Mail::to('test@test.com')->send(new ContactFormMail($data));

            //session()->flash('message', 'hvala...');
            return back()->with('message', 'hvala sto ste nas kontaktirali');

   }


   private function validateRequest()
    {
        return request()->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'message'   => 'required',
           // 'active' => 'required',
           // 'company_id' => 'required',
           // 'image' => 'sometimes|file|image|max:5000',
        ]);
    }



}
