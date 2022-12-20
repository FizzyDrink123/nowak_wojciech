<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Product $product;
    public Bool $editMode;

    public function rules()
    {
        return [
            'product.name'=>[
                'required',
                'string',
                'min:2',
                'max:100',
                'unique:products,name' .
                    ($this->editMode ? (',' . $this->product->id) : '')
            ],
            'product.description'=>[
                'nullable',
                'string',
                'max:1000',
            ],
            'product.manufacturer_id'=>[
                'required',
                'integer',
                'exists:manufacturer,id'
            ],
            'products.categories'=>[
                'required',
                'array',
            ]
        ];
    }

    public function validationAttributes()
    {
        return[
            'name'=>Str::lower(__('products.attributes.name')),
            'description'=>Str::lower(__('products.attributes.description')),
            'manufacturer_id'=>Str::lower(__('products.attributes.manufacturer')),
            'categories'=>Str::lower(__('products.attributes.categories')),
        ];
    }

    public function mount(Product $product, Bool $editMode)
    {
        $this->product = $product;
        $this->product->load('categories');
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view ('livewire.products.product-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        dd('save');
    }
}
