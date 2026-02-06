<div>
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Delete Account</h3>
                <p class="mt-1 text-sm text-gray-600">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information you wish to retain.</p>
            </div>

            <div class="p-6">
                <div class="max-w-xl">
                    <p class="text-sm text-gray-600">Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                </div>

                <div class="mt-6">
                    <x-jet-label for="password" value="Password" />
                    <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-jet-danger-button wire:click="deleteUser" wire:confirm="Are you sure you want to delete your account?">
                        Delete Account
                    </x-jet-danger-button>
                </div>
            </div>
        </div>
    </div>
</div>
