<?php

namespace App\Http\Controllers;

use App\Models\AuthorProfile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthorProfileController extends Controller
{
    public function index()
    {
        $profiles = AuthorProfile::select(
            'id',
            'author_id',
            'bio'
        )
            ->with([
                'author:id,name,publisher_id',
            ])
            ->get();

        return Inertia::render('author_profiles/index', [
            'profiles' => $profiles,
        ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
