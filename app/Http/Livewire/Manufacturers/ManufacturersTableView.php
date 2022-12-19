<?php

namespace App\Http\Livewire\Manufacturers;

use WireUi\Traits\Actions;
use App\Models\Manufacturer;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Actions\SoftDeleteAction;
use App\Http\Livewire\Manufacturers\Actions\EditManufacturerAction;
use App\Http\Livewire\Manufacturers\Actions\RestoreManufacturerAction;

class ManufacturersTableView extends TableView
{
    use Actions;
    use SoftDelete;
    use Restore;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Manufacturer::class;

    public $searchBy = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        return Manufacturer::query()->withTrashed();
    }


    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('manufacturers.attributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at')
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

    protected function filters()
    {
        return[];
    }

    protected function actionsByRow()
    {
        return[
            new EditManufacturerAction('manufacturers.edit',__('translation.action.edit')),
            new SoftDeleteAction(),
            new RestoreManufacturerAction(),
        ];
    }

    protected function softDeleteNotification(Model $model)
    {
        return __('manufacturers.messages.successes.destroy',[
            'name'=>$model
        ]);
    }

    protected function restoreNotificationDescription(Model $model)
    {
        return __('manufacturers.messages.success.restore',[
            'name'=>$model
        ]);
    }
}
