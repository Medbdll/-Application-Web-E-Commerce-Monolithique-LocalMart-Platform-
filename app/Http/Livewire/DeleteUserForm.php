<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DeleteUserForm extends Component
{
    public $password = '';

    public function deleteUser()
    {
        $this->validate([
            'password' => ['required', 'string', Password::default()],
        ]);

        if (! Hash::check($this->password, Auth::user()->password)) {
            $this->addError('password', 'The provided password does not match your current password.');
            return;
        }

        Auth::user()->delete();

        return redirect()->route('home.redirect');
    }

    public function render()
    {
        return view('livewire.delete-user-form');
    }
}
