<?php

namespace App\Http\Livewire\Movies;

use App\Models\Movie;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MovieForm extends Component
{
    use Actions;
    use AuthorizesRequests;

    public Movie $movie;
    public Bool $editMode;

    public function rules()
    {
        return [
            'movie.name'=>[
                'required',
                'string',
                'min:2',
                'max:100',

            ],
            'movie.description'=>[
                'nullable',
                'string',
                'max:1000',
            ],
            'movie.information'=>[
                'nullable',
                'string',
                'max:1000',
            ],
            'movie.manufacturer_id'=>[
                'required',
                'integer',
                'exists:manufacturers,id'
            ],
            'movie.categories'=>[
                'required',
                'array',
            ]
        ];
    }

    public function validationAttributes()
    {
        return[
            'name'=>Str::lower(__('movies.attributes.name')),
            'description'=>Str::lower(__('movies.attributes.description')),
            'information'=>Str::lower(__('movies.attributes.information')),
            'manufacturer_id'=>Str::lower(__('movies.attributes.manufacturer')),
            'categories'=>Str::lower(__('movies.attributes.categories')),
        ];
    }

    public function mount(Movie $movie, Bool $editMode)
    {
        $this->movie = $movie;
        $this->movie->load('categories');
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view ('livewire.movies.movie-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode){
            $this->authorize('update', $this->movie);
        } else {
            $this->authorize('create', Movie::class);
        }
        sleep(1);
        $this->validate();

        $categoriesIds = $this->movie->categories;
        unset($this->movie->categories);

        $movie = $this->movie;
        DB::transaction(function() use ($movie, $categoriesIds){
            $movie->save();
            $movie->categories()->sync($categoriesIds);
        });

        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('movies.messages.successes.updated',['name' => $this->movie->name])
                : __('movies.messages.successes.updated',['name' => $this->movie->name])
        );

        $this->editMode = true;
        $this->movie->load('categories');
    }
}
