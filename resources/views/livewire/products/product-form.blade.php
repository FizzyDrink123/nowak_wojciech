<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if($editMode)
                {{ __('products.labels.edit_form_title') }}
            @else
                {{ __('products.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">
                    {{ __('products.attributes.name') }}
                </label>
            </div>
            <div class="">
                <x-input placeholder=" {{ __('translation.enter') }}" wire:model="product.name"/>
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="description">{{ __('products.attributes.discription') }}</label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('translation.enter') }}" wire:model="products.description"/>
            </div>
        </div>
    </form>
</div>