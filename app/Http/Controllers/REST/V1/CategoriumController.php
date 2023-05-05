<?php

namespace App\Http\Controllers\REST\V1;

use App\Models\Categorium;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\CategoriumCollection;
use App\Http\Resources\V1\CategoriumResource;

class CategoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CategoriumCollection(Categorium::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorium $categorium)
    {
        return new CategoriumResource($categorium);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorium $categorium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorium $categorium)
    {
        //
    }
}
