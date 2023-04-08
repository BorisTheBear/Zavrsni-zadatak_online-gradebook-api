<?php

namespace App\Http\Controllers;

use App\Models\Gradebook;
use Illuminate\Http\Request;

class GradebooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->query('name', '');
        $per_page = $request->query('per_page', 10);

        $gradebooks = Gradebook::searchByName($name)
            ->paginate($per_page);

        return response()->json($gradebooks);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
