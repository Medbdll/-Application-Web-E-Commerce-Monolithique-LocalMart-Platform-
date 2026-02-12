<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticateUser
{
    /**
     * Authenticate the user.
     */
    public function authenticate(Request $request): User
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        // Check if user is banned
        if ($user->status === 'banned') {
            throw ValidationException::withMessages([
                'email' => 'Your account has been banned from the platform.',
            ]);
        }

        // Check if user is suspended
        if ($user->status === 'suspended') {
            throw ValidationException::withMessages([
                'email' => 'Your account has been suspended. Please contact support.',
            ]);
        }

        return $user;
    }
}
