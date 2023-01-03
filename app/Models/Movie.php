<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Schedule;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'information',
        'manufacturer_id',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
