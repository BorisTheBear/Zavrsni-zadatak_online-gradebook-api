<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->query('first_name', '');
        $lastName = $request->query('last_name', '');
        $per_page = $request->query('per_page', 50);

        $teachers = User::with('gradebook')->searchByName($name)
            ->searchByLastName($lastName)
            ->paginate($per_page);

        return response()->json($teachers);
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
        $user = User::with(['gradebook' => function ($query)
        {
            $query->withCount('students');
        }])->findOrFail($id);

        return response()->json($user);
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

    public function me() {
        return response()->json(User::with(['gradebook' => function ($query)
        {
            $query->with('students');
        }])->findOrFail(Auth::user()->id));
    }
}
