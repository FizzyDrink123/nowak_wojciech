<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{__('translation.navigation.users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg" id="table-view-wrapper">
                <livewire:users.users-table-view />
            </div>
        </div>
    </div>
</x-app-layout>