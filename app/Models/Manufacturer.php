<?php

namespace App\Models;

use App\Models\Movies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $filable = [
        'name',
    ];

    public function __toString()
    {
        return $this -> name;
    }

    public function movies()
    {
        return $this->hasMany(Movies::class);
    }
}
