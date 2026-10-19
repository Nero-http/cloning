<?php

namespace App\Http\Controllers;

use App\Services\PublisherService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PublisherController extends Controller
{

    public function __construct(
        private readonly PublisherService $publisherService 
    )
    {}

    public function index(Request $req): Response
    {
        $search = $req -> search;
        $publishers = $this -> 
        publisherService -> paginate(is_string($search) ? $search : null);

        return Inertia::render ('products/index', [
            'publisher' => $publishers,
            'filters' => [
                'search' => is_String ($search) ? $search : ''
            ]
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render ('publishers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublisherRequest $request)
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
