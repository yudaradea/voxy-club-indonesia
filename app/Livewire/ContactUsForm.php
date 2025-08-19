<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailForm;
use App\Models\Member;
use App\Models\User;
use DutchCodingCompany\LivewireRecaptcha\ValidatesRecaptcha;
use Flasher\Toastr\Prime\Toastr;
use Flasher\Toastr\Prime\ToastrInterface;

class ContactUsForm extends Component
{
    public string $name;
    public string $email;
    public string $message;

    protected function rules()
    {
        return [
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'message' => 'required|min:10',
            // gRecaptchaResponse otomatis divalidasi oleh trait
        ];
    }

    protected $messages = [
        'name.required'    => 'Nama harus diisi.',
        'email.required'   => 'Email harus diisi.',
        'message.required' => 'Pesan harus diisi.',
        'message.min'      => 'Pesan harus diisi minimal 10 karakter.',
    ];

    public string $gRecaptchaResponse;
    #[ValidatesRecaptcha]
    public function send()
    {
        $this->validate();

        $emailPenerima = User::where('role', 'admin')->get();

        foreach ($emailPenerima as $user) {
            Mail::to($user->email)->send(new ContactMailForm([
                'name'    => $this->name,
                'email'   => $this->email,
                'message' => $this->message,
            ]));
        }

        $this->reset(); // reset form & captcha otomatis
        toastr()->success('Pesan Berhasil dikirim!', ['timeOut' => 5000, 'closeButton' => true, 'progressBar' => true]);
    }

    public function render()
    {
        return view('livewire.contact-us-form');
    }
}
