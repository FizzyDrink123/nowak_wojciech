<?php

namespace App\Http\Livewire\Schedules;

use Livewire\Component;
use App\Models\Schedule;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ScheduleForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Schedule $schedule;
    public Bool $editMode;

    public function rules()
    {
        return [
            'schedule.movie.name' => [
                'required',
                'intiger',
                'exists:movies,id'
            ],
            'schedule.date'=>[
                'required',
            ]
        ];
    }

    public function validationAttributes()
    {
        return[
            'movie.name'=>Str::lower(__('schedules.attributes.movie.name')),
            'movie.information'=>Str::lower(__('schedules.attributes.movie.information')),
            'date'=>Str::lower(__('schedules.attributes.date')),
        ];
    }

    // public function mount(Schedule $schedule, Bool $editMode)
    // {
    //     $this->schedule = $schedule;
    //     //$this->schedule->load('movies');
    //     $this->editMode = $editMode;
    // }

    public function render()
    {
        return view('livewire.schedules.schedule-form');
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        dd('save');
    }
}
