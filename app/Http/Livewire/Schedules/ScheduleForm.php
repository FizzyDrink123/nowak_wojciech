<?php

namespace App\Http\Livewire\Schedules;

use Livewire\Component;
use App\Models\Schedule;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
            'schedule.movie_id' => [
                'required',
                'integer',
                'exists:movies,id'
            ],
            'schedule.information_id' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'schedule.date'=>[
                'nullable',
                'string',
                'max:1000',
            ]
        ];
    }

    public function validationAttributes()
    {
        return[
            'movie_id'=>Str::lower(__('schedules.attributes.movie.name')),
            'information_id'=>Str::lower(__('schedules.attributes.movie.information')),
            'date'=>Str::lower(__('schedules.attributes.date')),
        ];
    }

    public function mount(Schedule $schedule, Bool $editMode)
    {
        $this->schedule = $schedule;
        $this->schedule->load('movie');
        $this->editMode = $editMode;
    }

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
        if($this->editMode){
            $this->authorize('update', $this->schedule);
        } else {
            $this->authorize('create', Schedule::class);
        }
        sleep(1);
        $this->validate();

        $schedule = $this->schedule;
        DB::transaction(function() use ($schedule){
            $schedule->save();
        });

        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('schedules.messages.successes.updated',['movie_id' => $this->schedule->movie_id])
                : __('schedules.messages.successes.updated',['movie_id' => $this->schedule->movie_id])
        );

        $this->editMode = true;
    }
}
