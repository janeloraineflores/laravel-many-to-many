<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Requests\Technology\StoreTechnologyRequest;
use App\Http\Requests\Technology\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;


class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $formData = $request->validated();

        $technology = Technology::create([
            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
        ]);

        return redirect()->route('admin.technologies.show', compact('technology'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {   
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $formData = $request->validated();

        $technology->update([

            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
            
        ]);

        return redirect()->route('admin.technologies.show', compact('technology'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
