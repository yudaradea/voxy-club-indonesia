<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\RegisterForm;
use App\Mail\RegisterMailForm;
use App\Models\Term;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\error;

class Register extends Component
{
    use WithFileUploads;

    public RegisterForm $form;

    public $step = 1;
    public $agreed = false;

    public function nextStep()
    {
        if ($this->step === 1 && $this->agreed === false) {
            session()->flash('error', 'Please agree to the terms and conditions.');
            return;
        }

        $this->step = 2;
    }

    public function previousStep()
    {
        $this->step = 1;
    }

    public function submit()
    {
        $this->form->addMember();

        //  cek apakah ada validation error
        // if ($this->form->getErrorBag()->isNotEmpty()) {
        //     toastr()->error('Ada kesalahan dalam pengisian form. Silakan periksa kembali.', ['timeOut' => 5000]);
        //     return;
        // }

        $penerimaEmail = User::where('role', 'admin')->get();
        foreach ($penerimaEmail as $user) {
            Mail::to($user->email)->send(new RegisterMailForm([
                'name'    => $this->form->name,
                'email'   => $this->form->email,
                'phone'   => $this->form->phone,
                'ktp_sim' => $this->form->ktp_sim,
                'address' => $this->form->address,

            ]));
        }


        toastr()->success('Akun Berhasil dibuat!', ['timeOut' => 5000]);

        $this->redirect(route('profile'), navigate: true);
    }
    public function render()
    {

        $term = Term::first();
        return view('livewire.auth.register', [
            'term' => $term
        ]);
    }
}
