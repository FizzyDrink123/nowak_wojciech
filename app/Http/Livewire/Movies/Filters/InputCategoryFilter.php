<?php

namespace App\Http\Livewire\Movies\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class InputCategoryFilter extends Filter
{
    public $type = 'input';
    public $view = 'input-filter';
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('movies.filters.categories');
    }

    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas(
            'categories', 
            function ($query) use ($value){
                $query->where('name','like','%'.$value.'%');
        }

        );
    }
}
