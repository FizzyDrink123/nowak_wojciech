<?php

namespace App\Http\Livewire\Users\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Support\Facades\Auth;


class AssignWorkerRoleAction extends Action
{ 
    public $title = '';
    public $icon = 'droplet';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('users.actions.assign_worker_role');
    }

    public function handle($model, View $view)
    {
        $model->assignRole(config('auth.roles.worker'));
        $this->success(__('users.messages.successes.worker_role_assigned'));
    }
    public function renderIf($model, View $view)
    {
        return Auth::user()->isAdmin()
            && !$model->hasRole(config('auth.roles.worker'));
    }
}
