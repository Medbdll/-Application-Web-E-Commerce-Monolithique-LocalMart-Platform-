<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    public $state = [];

    protected $listeners = ['updated-profile' => '$refresh'];

    public function mount()
    {
        $this->state = Auth::user()->toArray();
    }

    public function updateProfile()
    {
        $user = Auth::user();

        $this->validate([
            'state.name' => ['required', 'string', 'max:255'],
            'state.email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->fill([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
        ])->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
