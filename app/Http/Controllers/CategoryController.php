<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Category::class);
        return view(
            'categories.index'
        );
    }

    public function async(Request $request)
    {
        $this->authorize('viewAny',Category::class);
        return Category::query()
            ->select('id','name')
            ->orderBy('name')
            ->when(
                $request->search,
                fn (Builder $query) => $query->where('name','like',"%{request->search}%")
            )->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn(
                    'id',
                    array_map(
                        fn (array $item) => $item['id'],
                        array_filter(
                            $request->input('selected',[]),
                            fn ($item) => (is_array($item) && isset($item['id']))
                        )
                    )
                        ),
                        fn (Builder $query) => $query->limit(10)
            )->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'categories.form'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update',$category);
        return view(
            'categories.form',
            [
                'category'=>$category
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
