<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <!-- Session Status -->
    <x-jet-authentication-card-status :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-jet-label for="email" value="Email" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-jet-button type="submit">
                Email Password Reset Link
            </x-jet-button>
        </div>
    </form>
</x-guest-layout>
