<?php

namespace App\Http\Livewire\Movies\Actions;

use App\Http\Livewire\Actions\RestoreAction;
use Illuminate\Database\Eloquent\Model;

class RestoreMovieAction extends RestoreAction
{
    protected function dialogTitle(): String
    {
        return __('manufacturers.dialogs.restore.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('manufarcturers.dialogs.restore.description',[
            'name'=>$model->name
        ]);
    }
}
