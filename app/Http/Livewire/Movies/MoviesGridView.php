<?php

namespace App\Http\Livewire\Movies;

use App\Models\Movie;
use WireUi\Traits\Actions;
use LaravelViews\Views\GridView;
use App\Http\Livewire\Traits\Restore;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Traits\SoftDelete;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Actions\SoftDeleteAction;
use App\Http\Livewire\Movies\Actions\EditMovieAction;
use App\Http\Livewire\Movies\Actions\RestoreMovieAction;
use App\Http\Livewire\Movies\Actions\SoftDeleteMovieAction;
use App\Http\Livewire\Movies\Filters\InputCategoryFilter;
use App\Http\Livewire\Movies\Filters\InputManufacturerFilter;
use Illuminate\Database\Eloquent\Model;

class MoviesGridView extends GridView
{
    use Actions;
    use SoftDelete;
    use Restore;

    protected $model = Movie::class;

    protected $paginate = 20;
    public $maxCols = 3;

    public $cardComponent = 'livewire.movies.grid-view-item';

    public $searchBy = [
        'name',
        'description',
        'information',
        'manufacturer.name',
        'categories.name',
    ];

    public function repository(): Builder
    {
        $query = Movie::query()
            ->with(['manufacturer','categories']);
        if (request()->user()->can('manage',Movie::class)){
            $query->withTrashed();
        }
        return $query;
    }

    public function card($model)
    {
        return[
            'image' => Storage::url('no-image.png'),
            'name' => $model->name,
            'description' => $model->description,
            'information' => $model->information,
            'manufacturer' => $model->manufacturer->name,
            'categories'=>$model->categories,
        ];
    }

    public function getPaginatedQueryProperty()
    {
        return $this->query->paginate($this->paginate);
    }

    protected function filters()
    {
        return[
            new InputCategoryFilter,
            new InputManufacturerFilter,
        ];
    }

    protected function actionsByRow()
    {
        if (request()->user()->can('manage',Movie::class)){
            return[
                new EditMovieAction(
                    'movies.edit', 
                    __('translation.actions.edit'),     
                ),
                new SoftDeleteMovieAction(),
                new RestoreMovieAction(),
            ];
        } else {
            return [];
        }
    }

    protected function softDeleteNotificationDescription(Model $model)
    {
        return __('movies.messages.successes.destroy',[
            'name' => $model->name
        ]);
    }



    protected function restoreNotificationDescription(Model $model)
    {
        return __('movies.messages.successes.restore',[
            'name' => $model->name
        ]);
    }
}
