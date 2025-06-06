<?php

namespace App\Livewire;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $email;

    public $name;

    public $subject;

    public $message;

    public function rules()
    {
        return (new ContactFormRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function send()
    {

        $validated = $this->validate();
        //        dd($validated); // dump the validated data

        Mail::to('markjc@mweb.co.za')->send(new ContactMail($validated));
        $this->reset();
        session()->flash('success', 'Thanks for contacting us, we will get back to you soon.');
    }
}
