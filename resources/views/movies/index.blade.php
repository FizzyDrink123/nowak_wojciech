<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2">
                    @can('create', App\Models\Movie::class)
                        <x-button primary 
                        label="{{ __('movies.actions.create') }}" href="{{ route('movies.create') }}"
                        class="justify-self-end" />
                    @endcan 
                </div>
                    <livewire:movies.movies-grid-view />
                </div>
            </div>
        </div>
</x-app-layout>