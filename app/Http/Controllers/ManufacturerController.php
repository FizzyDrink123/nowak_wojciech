<?php

namespace App\Http\Controllers;

use App\Facades\ManufacturerRepository;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Manufacturer::class);
        return view('manufacturers.index');
    }

    public function async(Request $request)
    {
        $this->authorize('viewAny',Manufacturer::class);
        return ManufacturerRepository::async(
            $request->search,
            $request->input('selected',[]),
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
     * Show the form for editing the specified resource.
     *
     * @param  Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Manufacturer::class);
        return view('manufacturers.form');
    }

    public function edit(Manufacturer $manufacturer)
    {
        $this->authorize('update',$manufacturer);
        return view(
            'manufacturers.form',
            [
                'manufacturer'=>$manufacturer
            ]
        );
    }

}
