<?php

namespace App\Http\Livewire\Manufacturers;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ManufacturerForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Manufacturer $manufacturer;
    public Bool $editMode;

    public function rules()
    {
        return[
            'manufacturer.name' => [
                'required',
                'String',
                'min:1',
                'unique:manufacturers,name' .
                    ($this->editMode ? (','.$this->manufacturer->id) : ''),
            ],

        ];
    }

    public function validationAttributes()
    {
        return[
            'name'=> Str::lower(__('manufacturers.attributes.name')),
        ];
    }

    public function mount (Manufacturer $manufacturer, Bool $editMode)
    {
        $this->manufacturer = $manufacturer;
        $this->editMode = $editMode;
    }
    public function render()
    {
        return view('livewire.manufacturers.manufacturer-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update',$this->manufacturer);
        } else{
            $this->authorize('create',Manufacturer::class);
        }
        sleep(1);
        $this->validate();
        $this->manufacturer->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('translation.messages.success.updated_title')
            : __('translation.messages.success.stored_title'),
        $description = $this->editMode
            ? __('manufacturers.messages.success.updated',['name'=>$this->manufacturer->name])
            : __('manufacturers.messages.success.stored',['name'=>$this->manufacturer->name])
        );
        $this->editMode = true;
    }
}
