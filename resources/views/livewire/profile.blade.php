<div>
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
                <p class="mt-1 text-sm text-gray-600">Update your account's profile information and email address.</p>
            </div>

            <div class="p-6">
                <form wire:submit="updateProfile">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <x-jet-label for="name" value="Name" />
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autofocus autocomplete="name" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div>
                            <x-jet-label for="email" value="Email" />
                            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="email" />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <x-jet-action-message class="mr-3" on="saved">
                            Saved.
                        </x-jet-action-message>

                        <x-jet-button wire:loading.attr="disabled" wire:target="updateProfile">
                            <span wire:loading.remove wire:target="updateProfile">Save</span>
                            <span wire:loading wire:target="updateProfile">Saving...</span>
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
