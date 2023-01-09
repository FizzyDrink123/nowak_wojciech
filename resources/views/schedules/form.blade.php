<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('translation.navigation.schedules') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm-rounded-lg">
                @if(isset($schedule))
                <livewire:schedules.schedule-form :schedule="$schedule" :editMode="true"/>
                @else
                <livewire:schedules.schedule-form :editMode="false" />
                @endif
            </div>
        </div>     
    </div>   
</x-app-layout>