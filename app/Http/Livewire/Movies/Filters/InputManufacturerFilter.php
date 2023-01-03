<?php

namespace App\Http\Livewire\Movies\Filters;

use LaravelViews\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class InputManufacturerFilter extends Filter
{
    public $type = 'input';
    public $view = 'input-filter';
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('movies.filters.manufacturer');
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas(
            'manufacturer',function ($query) use ($value){
                $query->where('name','like','%'.$value.'%');
            });
    }

}
