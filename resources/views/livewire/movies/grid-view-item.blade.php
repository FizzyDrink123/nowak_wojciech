@props([
    'image' => '',
    'title' => '',
    'manufacturer' => '',
    'description' => '',
    'information' => '',
    'withBackground' => false,
    'model',
    'actions' => [],
    'hasDefaultAction' => false,
    'selected' => false,
])

<div class="{{ $withBackground ? 'rounded-md shadow-md' : '' }}">
  @if ($hasDefaultAction)
    <a href="#!" wire:click.prevent="onCardClick({{ $model->id }})">
      <img src="{{ $image }}" alt="{{ $image }}" class="hover:shadow-lg cursor-pointer rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }} {{ $selected ? variants('gridView.selected') : "" }}">
    </a>
  @else
    <img src="{{ $image }}" alt="{{ $image }}" class="rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }}  {{ $selected ? variants('gridView.selected') : "" }}">
  @endif

  <div class="pt-4 {{ $withBackground ? 'bg-white rounded-b-md p-4' : '' }}">
    <div class="flex items-start">
      <div class="flex-1">
        <h3 class="font-bold leading-6 text-gray-900 {{ $model->deleted_at ? 'line-through' : ''}}">
          @if ($hasDefaultAction)
            <a href="#!" class="hover:underline" wire:click.prevent="onCardClick({{ $model->getKey() }})">
              {!! $name !!}
            </a>
          @else
            {!! $name !!}
          @endif
        </h3>
        @if($manufacturer)
            <span class="text-sm text-gray-600">
                {{ __('movies.attributes.manufacturer') }}: {!! $manufacturer !!}
            </span> 
        @endif  
        @if ($categories)
            <span class="flex justify-end text-sm text-gray-600">
                @foreach($categories as $category)
                    <span
                        class="mr-2 rounded bg-gray-100 px-2.5 py-0.5 text-xs font-semibold text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{$category->name}}</span>
                @endforeach
            </span>
        @endif
    </div>

      @if (count($actions))
        <div class="flex justify-end items-center">
          <x-lv-actions.drop-down :actions="$actions" :model="$model" />
        </div>
      @endif
    </div>

    @if (isset($description))
      <p class="line-clamp-3 mt-2">
        {!! $description !!}
      </p>
    @endif

    @if (isset($information))
      <p class="line-clamp-3 mt-2">
        {!! $information !!}
      </p>
    @endif
  </div>

</div>