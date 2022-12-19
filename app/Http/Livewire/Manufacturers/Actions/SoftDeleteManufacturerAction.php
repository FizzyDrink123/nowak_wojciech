<?php

namespace App\Http\Livewire\Manufacturers\Actions;

use App\Http\Livewire\Actions\SoftDeleteAction;
use Illuminate\Database\Eloquent\Model;

class SoftDeleteManufacturerAction extends SoftDeleteAction
{
    protected function dialogTitle():String
    {
        return __('manufacturers.dialogs.soft_delete.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('manufacturers.dialogs.soft_delete.description',[
            'name'=>$model
        ]);
    }
}
