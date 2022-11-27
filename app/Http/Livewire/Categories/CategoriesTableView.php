<?php

namespace App\Http\Livewire\Categories;

use App\Models\User;
use App\Models\Category;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Categories\Filters\SoftDeleteFilter;
use App\Http\Livewire\Categories\Actions\EditCategoryAction;

class CategoriesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    public $searchBy = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        return Category::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            //naglówek sprawdzic
            Header::title(__('categories.atrributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('categories.atrributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at'),
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
            $model->name,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at,
        ];
    }

    protected function filters ()
    {
        return[
            new SoftDeleteFilter,
        ];
    }

    protected function actionsByRow()
    {
        return[
            new EditCategoryAction('categories.edit', __('translation.actions.edit')),
        ];
    }
}
