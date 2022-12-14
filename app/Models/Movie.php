<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Schedule;
use App\Models\Manufacturer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function image(): Attribute
    {
        return Attribute::make(
            get: function($value){
                if($value === null){
                    return null;
                }
                return config('filesystems.images_dir')
                    . '/' . $value;
            },
        );
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function imageUrl():string
    {
        return $this->imageExists()
            ? Storage::url($this->image)
            : Storage::url(config('app.no_image'));
    }

    public function imageExists(): bool
    {
        return $this->image !== null
            && Storage::disk('public')->exists($this->image);
    }
}
