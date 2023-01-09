<?php

namespace App\Http\Livewire\Schedules;

use App\Models\Schedule;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Actions\AddToCartAction;

class SchedulesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Schedule::class;

    public $searchBy = [
        'movie_id',
        'movie_information',
        'date',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        return Schedule::query()->withTrashed();
    }
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('schedules.attributes.movie.name'))->sortBy('movie_id'),
            Header::title(__('schedules.attributes.movie.information')),
            Header::title(__('schedules.attributes.date'))->sortBy('date'),
            Header::title(__('schedules.attributes.price'))->sortBy('price'),
            Header::title(__('schedules.attributes.buy')),
            Header::title(__('schedules.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('schedules.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('schedules.attributes.deleted_at'))->sortBy('deleted_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->movie->name,
            $model->movie->information,
            $model->date,
            $model->price,
            $model->buy,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at,
        ];
    }

    protected function filters()
    {
        return [];
    }
}
