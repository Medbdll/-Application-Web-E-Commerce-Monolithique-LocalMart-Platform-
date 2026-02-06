<x-guest-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email Address -->
        <div>
            <x-jet-label for="email" value="Email" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $email ?? null)" required autofocus />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-jet-label for="password" value="Password" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="Confirm Password" />
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button type="submit">
                Reset Password
            </x-jet-button>
        </div>
    </form>
</x-guest-layout>
