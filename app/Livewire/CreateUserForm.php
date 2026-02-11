<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateUserForm extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $role = 'client';
    public $status = 'active';
    public $showModal = false;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'confirmed'],
        'role' => ['required', 'string', 'in:client,seller,admin'],
        'status' => ['required', 'string', 'in:active,banned'],
    ];

    public function openModal()
    {
        $this->reset();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset();
    }

    public function createUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Password::default()],
            'role' => ['required', 'string', 'in:client,seller,admin'],
            'status' => ['required', 'string', 'in:active,banned'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ]);

        $user->assignRole($this->role);

        $this->closeModal();
        $this->dispatch('userCreated');
        
        return redirect()->route('users')->with('success', 'User created successfully');
    }

    public function render()
    {
        return view('livewire.create-user-form');
    }
}
