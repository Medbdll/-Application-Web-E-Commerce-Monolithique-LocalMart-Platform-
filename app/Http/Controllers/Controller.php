<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller 
{
    use AuthorizesRequests;
    protected function authenticatedUser()
    {
        return auth()->user();
    }
    
    protected function isAdmin()
    {
        return auth()->user()->hasRole('admin');
    }
}
