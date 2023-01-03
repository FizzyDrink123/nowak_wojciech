<?php

namespace App\Http\Livewire\Movies\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeleteAction;

class SoftDeleteMovieAction extends SoftDeleteAction
{
    protected function dialogTitle():String
    {
        return __('manufacturers.dialogs.soft_delete.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('manufacturers.dialogs.soft_delete.description',[
            'name'=>$model->name
        ]);
    }
}
