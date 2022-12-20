<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow-xl sm:rounded-lg" id="table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2">
                    @can('create',App\Models\Product::class)
                        <x-button primary label="{{ __('products.actions.create') }}" href="{{ route('products.create') }}"
                        class="justify-self-end" />
                    @endcan 
                </div>
                    <livewire:products.products-grid-view />
                </div>
         
            </div>
        </div>
</x-app-layout>