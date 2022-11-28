<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
        @if ($editMode)
            {{ __('categories.labels.edit_form_title') }}
        @else
            {{ __('categories.labels.create_form_title') }}
        @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('categories.attributes.name') }}</lable>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translation.enter') }}" wire:model="category.name"/>
            </div>
        </div>
        <hr class="my-2">
        <div class="flex jusitfy-end pt-2">
            <x-button href="{{ route('categories.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}"/>
            <x-button type="submit" primary label="{{ __('translation.save') }}" spinner/>
        </div>
    </form>
</div>