<?php

namespace App\Http\Livewire\Actions;

use App\Facades\CartService;
use LaravelViews\Actions\Action;

class AddToCartAction extends Action
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('schedules.actions.add_to_cart');
    }

    public $icon = 'shopping-cart';

    public function handle($model, View $view)
    {
        CartService::add($model->id);
        $view->notification().success(
            $title = __('translation.messages.successes.cart_title'),
            $description = __(
                'schedules.messages.successes.added_to_cart',
                ['name'=>model->name]
            )
        );
        $view->emit('cartUpdated');
    }
}
