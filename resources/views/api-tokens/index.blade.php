<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight text-gray-800">
                                API Tokens
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <livewire:api-token-manager />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
