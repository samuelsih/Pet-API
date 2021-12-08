<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaxonomyResource;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaxonomyResource::collection(Taxonomy::paginate(20));
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
            'kingdom' => 'required',
            'class' => 'required',
            'family' => 'required',
            'genus' => 'required',
            'species' => 'required',
        ]);

        return Taxonomy::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Taxonomy::findOrFail($id)->only(['kingdom', 'class', 'family', 'genus', 'species']);
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
        $taxonomy = Taxonomy::findOrFail($id);

        $request->validate([
            'kingdom' => 'required',
            'class' => 'required',
            'family' => 'required',
            'genus' => 'required',
            'species' => 'required',
        ]);

        $taxonomy->update($request->only(['kingdom', 'class', 'family', 'genus', 'species']));

        return $taxonomy;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Taxonomy::destroy($id);
    }
}
