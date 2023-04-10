<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGradebookRequest;
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

        $gradebooks = Gradebook::with('user')->searchByName($name)
            ->orderByDesc('created_at')
            ->paginate($per_page);

        return response()->json($gradebooks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGradebookRequest $request)
    {
        $gradebook = Gradebook::create($request->validated());

        return response()->json($gradebook);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gradebook = Gradebook::with('user','students')->findOrFail($id);
        return response()->json($gradebook);
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
