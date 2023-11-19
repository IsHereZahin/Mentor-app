<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer = Trainers::all();
        return view('admin.trainer.index', compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required',
            'department' =>'required',
            'description' =>'required',
            'image' =>'required|image|mimes:png,jpg',
            'twitterurl' =>'required',
            'facebookurl' =>'required',
            'instagramurl' =>'required',
            'linkedinurl' =>'required',
        ]);

        $image = null;
        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/trainer'), $image);
        }

        Trainers::query()->create([
            'name' => $request->name,
            'department' => $request->department,
            'description' => $request->description,
            'image' => $image,
            'twitterurl' => $request->twitterurl,
            'facebookurl' => $request->facebookurl,
            'instagramurl' => $request->instagramurl,
            'linkedinurl' => $request->linkedinurl,
        ]);
        return redirect()->route('dashboard.trainer.index')->with('success','Data added successfully!');
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
        $trainer = Trainers::find($id);
        // dd ($trainer);
        return view('admin.trainer.edit',compact('trainer', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'department' =>'required',
            'description' =>'required',
            'twitterurl' =>'required',
            'facebookurl' =>'required',
            'instagramurl' =>'required',
            'linkedinurl' =>'required',
        ]);

        $trainer = Trainers::find($request->id);

        if(!empty($request->image))
        {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/trainer'), $image);
            #delete old image
            if(File::exists(public_path('images/trainer/'.$trainer->image))) {
                File::delete(public_path('images/trainer/'.$trainer->image));
            }
        }
        else
            $image=$trainer->image;

        $trainer->update([
            'name' => $request->name,
            'department' => $request->department,
            'description' => $request->description,
            'image' => $image,
            'twitterurl' => $request->twitterurl,
            'facebookurl' => $request->facebookurl,
            'instagramurl' => $request->instagramurl,
            'linkedinurl' => $request->linkedinurl,

        ]);
        return redirect()->route('dashboard.trainer.index')->with('success','Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Trainers::query()->find($id);
        // dd ($data);
        File::delete(public_path('images/trainer/'.$data->image));

        Trainers::query()->find($id)->delete();
        return redirect()->back()->with('success','Data delete successfully!');
    }
}
