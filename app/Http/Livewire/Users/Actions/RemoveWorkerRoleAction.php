<?php

namespace App\Http\Livewire\Users\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Support\Facades\Auth;


class RemoveWorkerRoleAction extends Action
{ 
    public $title = '';
    public $icon = 'shield';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('users.actions.remove_worker_role');
    }

    public function handle($model, View $view)
    {
        $model->removeRole(config('auth.roles.worker'));
        $this->success(__('users.messages.successes.worker_role_removed'));
    }
    public function renderIf($model, View $view)
    {
        return Auth::user()->isAdmin()
            && $model->hasRole(config('auth.roles.worker'));
    }
}
