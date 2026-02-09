<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function authenticatedUser()
    {
        return auth()->user();
    }

    protected function isAdmin()
    {
        return auth()->user()->hasRole('admin');
    }
}
