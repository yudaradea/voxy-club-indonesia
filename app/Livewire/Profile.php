<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Member;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = "";

    #[Url]
    public $perPage = 10;



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user();
        $kasHistory = Payment::orderBy('created_at', 'desc')->get();
        $contact = Contact::first();

        //for list member
        $users = User::whereHas('member', function ($query) {
            $query->where('status', 'verified');
        })
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);

        return view('livewire.profile', [
            'user' => $user,
            'kasHistory' => $kasHistory,
            'contact' => $contact,
            'users' => $users
        ])
            ->title('| Profile')
            ->layout('components.frontend.layout');
    }
}
