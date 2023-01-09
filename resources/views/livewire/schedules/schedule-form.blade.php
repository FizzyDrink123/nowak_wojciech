<div class="p-2">
  <form wire:submit.prevent="save">
      <h3 class="text-xl font-semibold leading-tight text-gray-800">
      @if ($editMode)
          {{ __('schedules.labels.edit_form_title') }}
      @else
          {{ __('schedules.labels.create_form_title') }}
      @endif
      </h3>

      <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="movie_id">{{ __('schedules.attributes.movie.name')}}</label>
            </div>
            <div clas="">
                <x-select placeholder="{{ __('translation.select') }}" wire:model.defer="schedule.movie_id"
                    :async-data="route('async.movies')" option-label="name" option-value="id"/>
            </div>    
        </div>

        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="information_id">{{ __('schedules.attributes.movie.information') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translation.enter') }}" wire:model="schedule.information_id"/>
            </div>
        </div>

      <hr class="my-2">
              <div class="grid grid-cols-2 gap-2">
                  <div class="">
                      <label for="date">{{ __('schedules.attributes.date') }}</label>
                  </div>
                  <div class="">
                      <x-input placeholder="{{ __('translation.enter') }}" wire:model="schedule.date"/>
                  </div>
              </div>
      <hr class="my-2">
              <div class="grid grid-cols-2 gap-2">
                  <div class="">
                      <label for="price">{{ __('schedules.attributes.price') }}</label>
                  </div>
                  <div class="">
                      <x-input placeholder="{{ __('translation.enter') }}" wire:model="schedule.price"/>
                  </div>
              </div>

              <h2 class="my-2">
      <div class="flex justify-end pt-2">
          <x-button href="{{ route('schedules.index') }}" secondary class="mr-2"
              label="{{ __('translation.back') }}"/>
          <x-button type="submit" primary label="{{ __('translation.save') }}" spinner />
      </div>
  </form>
</div>
