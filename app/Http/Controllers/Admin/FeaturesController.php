<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $features = Features::all();
        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'      => 'required',
            'classname' => 'required',
            'color'     => 'required',
        ]);

        Features::query()->create([
            'name'      => $request->name,
            'classname' => $request->classname,
            'color'     => $request->color,
        ]);

        return redirect()->route('dashboard.features.index')->with('success', 'Data added successfully!');
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
    public function edit(Request $request)
    {
        //
        $id = $request->id;
        $features = Features::find($id);
        return view('admin.features.edit', compact('features', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'name'      => 'required',
            'classname' => 'required',
            'color'     => 'required',
        ]);

        // Find the record by ID
        $features = Features::find($request->id);

        // Check if the record exists
        if ($features) {
            // Update the record
            $features->update([
                'name'      => $request->name,
                'classname' => $request->classname,
                'color'     => $request->color,
            ]);

            return redirect()->route('dashboard.features.index')->with('success', 'Data updated successfully!');
        } else {
            // Redirect with an error message if the record is not found
            return redirect()->route('dashboard.features.index')->with('error', 'Record not found');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Features::query()->find($id)->delete();
        return redirect()->back()->with('success','Data delete successfully!');
    }
}
