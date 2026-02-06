<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Jetstream\HasTeams;
use Illuminate\Support\Facades\Auth;

class TeamManager extends Component
{
    public $teams;
    public $showCreateTeamForm = false;
    public $state = [
        'name' => '',
    ];

    protected $listeners = ['team-created' => '$refresh'];

    public function mount()
    {
        $this->teams = Auth::user()->allTeams();
    }

    public function createTeam()
    {
        $this->validate([
            'state.name' => 'required|string|max:255',
        ]);

        Auth::user()->createTeam($this->state['name']);

        $this->showCreateTeamForm = false;
        $this->state['name'] = '';
        $this->mount();
    }

    public function render()
    {
        return view('livewire.team-manager');
    }
}
