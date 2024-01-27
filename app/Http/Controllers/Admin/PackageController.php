<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NameFeature;
use App\Models\PackageFeatures;
use App\Models\Packages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Packages::query()->with('packageFeature')->get();
        $features = NameFeature::query()->get();
        return view('admin.package.index',compact('packages','features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = NameFeature::query()->get();
        return view('admin.package.create',compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'price'     => 'required',
            'duration'  => 'required',
        ]);

        # package data store
        $package_id = Packages::query()->insertGetId([
            'title'     => $request->title,
            'tag'       => $request->tag,
            'price'     => $request->price,
            'duration'  => $request->duration,
            'created_at'=> Carbon::now(),
        ]);

        if($package_id){
            #package-feature data store
            $features = $request->feature;
            foreach ($features as $feature){
                PackageFeatures::query()->insert([
                    'package_id'  => $package_id,
                    'feature_id'  => $feature,
                    'created_at'=> Carbon::now(),
                ]);
            }
        }
        return redirect()->route('dashboard.package.index')->with('success','Package added successfully');
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
    public function edit($id)
    {
        $package = Packages::findOrFail($id);
        $features = NameFeature::all();
        return view('admin.package.edit', compact('package', 'features'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);

        $package = Packages::findOrFail($id);
        $package->update([
            'title' => $request->title,
            'tag' => $request->tag,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        // Sync package features
        $package->packageFeatures()->sync($request->input('feature', []));

        return redirect()->route('dashboard.package.index')->with('success', 'Package updated successfully');
    }

    public function destroy($id)
    {
        $package = Packages::findOrFail($id);
        // Delete associated package features first if needed
        $package->delete();
        return redirect()->route('dashboard.package.index')->with('success', 'Package deleted successfully');
    }}
