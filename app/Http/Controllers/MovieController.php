<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $this->authorize('ViewAny',Movie::class);
            return view(
                'movies.index'
            );
    }

    public function async(Request $request)
    {
        $this->authorize('viewAny',Movie::class);
        return Movie::query()
            ->select('id','name','information')
            ->orderBy('name')
            ->when(
                $request->search,
                fn (Builder $query) => $query->where('name','like',"%{$request->serach}%"),
                fn (Builder $query) => $query->where('information','like',"%{$request->serach}%")
            )->when(
                $request->exists('selected'),
                fn(Builder $query)=>$query->WhereIn(
                    'id',
                    array_map(
                        fn(array $item)=>$item['id'],
                        array_filter(
                            $request->input('selected',[]),
                            fn($item)=>(is_array($item) && isset($item['id']))
                        )
                    )
                        ),
                        fn(Builder $query)=>$query->limit(10)
            )->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Movie::class);
        return view(
            'movies.form'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $this->authorize('update',$movie);
        return view(
            'movies.form',
            [
                'movie' => $movie
            ]
            );
    }
}
