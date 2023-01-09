<?php

namespace App\Http\Repositories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ManufacturerRepository
{
    public function async(string|null $search, array|null $selected):Collection
{
    return Manufacturer::query()
        ->select('id','name')
        ->orderBy('name')
        ->when(
            $search,
            fn (Builder $query)
                => $query->where('name','like',"%{$search}%")
        )
        ->when(
            $selected,
            fn (Builder $query)=>$query->whereIn('id',$selected),
            fn (Builder $query) => $query->limit(Manufacturer::count())
        )
        ->get();
    }
}
