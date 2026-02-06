<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavigationMenu extends Component
{
    public $showingNavigationDropdown = false;

    public function render()
    {
        return view('livewire.navigation-menu');
    }
}
