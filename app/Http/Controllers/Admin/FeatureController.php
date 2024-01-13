<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NameFeature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = NameFeature::query()->get();
        return view('admin.package.feature.index',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        NameFeature::query()->create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Data added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feature = NameFeature::findOrFail($id);
        return view('admin.package.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'      => 'required',
        ]);

        $features = NameFeature::find($request->id);

        if ($features)
        {
            $features->update([
                'name'      => $request->name,
            ]);

            return redirect()->route('dashboard.package.feature.index')->with('success', 'Data updated successfully!');
        }
        else
        {
            return redirect()->route('dashboard.package.feature.index')->with('error', 'Record not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        NameFeature::query()->find($id)->delete();
        return redirect()->back()->with('success', 'Data deleted successfully!');
    }
}
