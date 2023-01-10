<?php

namespace App\Http\Livewire\Invoices;

use App\Models\Invoice;

use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;

class InvoicesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Invoice::class;

    public $searchBy = [
        'invoiceNo'
    ];

    // public function repository(): Builder
    // {
    //     return Invoice::query()->withTrashed();
    // }
    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('invoices.attributes.invoiceNo'))->sortBy('invoiceNo'),
            Header::title(__('invoices.attributes.orderDate')),
            Header::title(__('invoices.attributes.email')),
            Header::title(__('invoices.attributes.fullName')),
            Header::title(__('invoices.attributes.address')),
            Header::title(__('invoices.attributes.phoneNumber')),
            Header::title(__('invoices.attributes.city')),
            Header::title(__('invoices.attributes.product')),
            Header::title(__('invoices.attributes.price')),
            Header::title(__('invoices.attributes.qunatity')),
            Header::title(__('invoices.attributes.totalPrice')),

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
            $model->invoiceNo,
            $model->orderDate,
            $model->email,
            $model->fullName,
            $model->address,
            $model->phoneNumber,
            $model->city,
            $model->product,
            $model->price,
            $model->qunatity,
            $model->totalPrice,
            // $model->created_at,
            // $model->updated_at,
        ];
    }
}
