<?php

namespace App\Http\Livewire\Movies;

use App\Models\Movie;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class MovieForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;

    public Movie $movie;
    public $categoriesIds;
    public $image;

    public $imageUrl;
    public $imageExists;
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
            'movie.categoriesIds'=>[
                'required',
                'array',
            ],
            'image'=>[
              'nullable',
              'image',
              'max:1024',
            ],
        ];
    }

    public function validationAttributes()
    {
        return[
            'name'=>Str::lower(__('movies.attributes.name')),
            'description'=>Str::lower(__('movies.attributes.description')),
            'information'=>Str::lower(__('movies.attributes.information')),
            'manufacturer_id'=>Str::lower(__('movies.attributes.manufacturer')),
            'categoriesIds'=>Str::lower(__('movies.attributes.categories')),
            'image'=>Str::lower(
                __('products.attributes.image')
            )
        ];
    }

    public function mount(Movie $movie, Bool $editMode)
    {
        $this->movie = $movie;
        $this->categoriesIds = $this->movie->categories->toArray();
        $this->imageChange();
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

        $image=$this->image;
        $categoriesIds = $this->categoriesIds;

        $movie = $this->movie;
        DB::transaction(function() use ($movie, $categoriesIds,$image){
            $movie->save();
            if ($image !== null) {
                $movie->image = $movie->id
                    . '.' . $this->image->getClientOriginalExtension();
                $movie->save();
            }
            $movie->categories()->sync($categoriesIds);
        });

        if($this->image !== null) {
            $this->image->storeAs(
                '',
                $this->movie->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('movies.messages.successes.updated',['name' => $this->movie->name])
                : __('movies.messages.successes.updated',['name' => $this->movie->name])
        );

        $this->editMode = true;
        $this->imageChange();
    }

    public function deleteImageConfirm()
    {
        dd('deleteImage');
    }

    protected function imageChange()
    {
        $this->imageExists = $this->movie->imageExists();
        $this->imageUrl = $this->movie->imageUrl();
    }
}
