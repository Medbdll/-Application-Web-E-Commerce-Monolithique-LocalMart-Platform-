<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;

class ApiTokenManager extends Component
{
    public $tokens;
    public $showCreateTokenForm = false;
    public $state = [
        'name' => '',
        'abilities' => [],
    ];

    protected $listeners = ['token-created' => '$refresh'];

    public function mount()
    {
        $this->tokens = Auth::user()->tokens->load('tokenable');
    }

    public function createToken()
    {
        $this->validate([
            'state.name' => 'required|string|max:255',
        ]);

        $token = Auth::user()->createToken($this->state['name']);

        $this->dispatch('created-token', $token->plainTextToken);
        $this->showCreateTokenForm = false;
        $this->state['name'] = '';
        $this->mount();
    }

    public function deleteToken($tokenId)
    {
        $token = PersonalAccessToken::findOrFail($tokenId);

        if ($token->tokenable_id !== Auth::id()) {
            return;
        }

        $token->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.api-token-manager');
    }
}
