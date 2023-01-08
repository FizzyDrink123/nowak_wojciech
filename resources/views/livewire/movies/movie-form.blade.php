<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if($editMode)
                {{ __('movies.labels.edit_form_title') }}
            @else
                {{ __('movies.labels.create_form_title') }}
            @endif
        </h3>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">
                    {{ __('movies.attributes.name') }}
                </label>
            </div>
            <div class="">
                <x-input placeholder=" {{ __('translation.enter') }}" wire:model="movie.name"/>
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="description">{{ __('movies.attributes.description') }}</label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('translation.enter') }}" wire:model="movie.description"/>
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="information">{{ __('movies.attributes.information') }}</label>
            </div>
            <div class="">
                <x-textarea placeholder="{{ __('translation.enter') }}" wire:model="movie.information"/>
            </div>
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="manufacturer_id">{{ __('movies.attributes.manufacturer')}}</label>
            </div>
            <div class="">
                <x-select placeholder="{{ __('translation.select') }}" wire:model.defer="movie.manufacturer_id"
                    :async-data="route('async.manufacturers')" option-label="name" option-value="id"/>
            </div>    
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="categories">{{ __('movies.attributes.categories') }}</label>
            </div>
            <div class="">
                <x-select multiselect placeholder="{{ __('translation.select') }}" wire:model="categoriesIds"
                    :async-data="route('async.categories')" option-label="name" option-value="id"/>
            </div>    
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="image">{{ __('movies.attributes.image') }}</label>
            </div>
            <div class="">
                @if($imageExists)
                    <div class="realtive">
                        <img class="w-full" src="{{ $imageUrl }}" alt="{{$movie->name}}">
                        <div class="aboslute top-2 right-2 h-16">
                            <x-button.circle outline xs secondary icon="trash" wire:click="deleteImageConfirm"/>
                        </div>
                    </div>
                    @else
                        <x-input type="file" wire:model="image"/>
                    @endif
            </div>    
        </div>

        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('movies.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-button type="submit" primary label="{{ __('translation.save') }}" spinner />
    </form>
</div>