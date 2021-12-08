<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PetResource::collection(Pet::with('taxonomy')->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        return Pet::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pet = Pet::findOrFail($id)->first();
        return [
            'name' => $pet->name,
            'gender' => $pet->gender,
            'weight' => $pet->weight,
            'description' => $pet->description,
            'status' => $pet->status,
            'taxonomy' => [
                'kingdom' => $pet->taxonomy->kingdom,
                'class' =>  $pet->taxonomy->class,
                'family' =>  $pet->taxonomy->family,
                'genus' =>  $pet->taxonomy->genus,
                'species' =>  $pet->taxonomy->species,
            ]
        ];
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
        $pet = Pet::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $pet->update($request->all());

        return [
            'name' => $pet->name,
            'gender' => $pet->gender,
            'weight' => $pet->weight,
            'description' => $pet->description,
            'status' => $pet->status,
            'taxonomy' => [
                'kingdom' => $pet->taxonomy->kingdom,
                'class' =>  $pet->taxonomy->class,
                'family' =>  $pet->taxonomy->family,
                'genus' =>  $pet->taxonomy->genus,
                'species' =>  $pet->taxonomy->species,
            ]
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Pet::destroy($id);
    }
}
