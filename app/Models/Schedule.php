<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'movie_id',
        'information_id',
        'date',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
