<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileSettingForm;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProfileSetting extends Component
{
    use WithFileUploads;
    public ProfileSettingForm $form;
    public $userMember;

    public function mount($user)
    {
        $this->form->setMember($user);
        $this->userMember = $user;
    }

    public function update($id)
    {
        $this->form->editMember($id);

        toastr()->success('Accout Successfully Updated!', ['timeOut' => 5000]);
        $this->redirect(route('profile'), navigate: true);
    }

    public function updatePassword($id)
    {
        $this->form->editPassword($id);

        // session()->flash('successUpdatePassword', 'Your password has been successfully reset. Please login with your new password.');

        return redirect()->route('login')->with('successUpdatePassword', 'Your password has been successfully update. Please login with your new password.');
    }

    public function render()
    {


        return view('livewire.profile-setting');
    }
}
