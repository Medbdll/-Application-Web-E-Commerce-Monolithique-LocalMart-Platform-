<div>
    <div class="max-w-2xl mx-auto p-4">
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Teams</h3>
                <p class="mt-1 text-sm text-gray-600">Manage and create your teams.</p>
            </div>

            <div class="p-6">
                @if ($showCreateTeamForm)
                    <form wire:submit="createTeam">
                        <div>
                            <x-jet-label for="name" value="Team Name" />
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autofocus autocomplete="off" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-jet-secondary-button class="mr-3" wire:click="$toggle('showCreateTeamForm')">
                                Cancel
                            </x-jet-secondary-button>

                            <x-jet-button wire:loading.attr="disabled" wire:target="createTeam">
                                <span wire:loading.remove wire:target="createTeam">Create</span>
                                <span wire:loading wire:target="createTeam">Creating...</span>
                            </x-jet-button>
                        </div>
                    </form>
                @else
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">You haven't created any teams yet.</p>
                        </div>

                        <div>
                            <x-jet-button wire:click="$toggle('showCreateTeamForm')">
                                Create Team
                            </x-jet-button>
                        </div>
                    </div>
                @endif

                @if (count($teams) > 0)
                    <div class="mt-6 space-y-4">
                        @foreach ($teams as $team)
                            <div class="flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $team->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $team->user->name }} • {{ $team->created_at->diffForHumans() }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('teams.show', $team->id) }}" class="text-sm text-indigo-600 hover:text-indigo-900">
                                        Manage
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
