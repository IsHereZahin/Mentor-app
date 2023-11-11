<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'description1' => 'required',
            'image' =>'required|image|mimes:png,jpg',
        ]);

        $image = null;
        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/about'), $image);
            //$image->storeAs('images', $imageName);
        }

        About::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'description1' => $request->description1,
            'image'  => $image,
        ]);
        return redirect()->route('dashboard.about')->with('success','Data added successfully!');
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
    public function edit()
    {
        //
        $about = About::query()->first();
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'description1' => 'required',
        ]);

        # image
        $OldImage=About::query()->select('image')->first();
        if(!empty($request->image))
        {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/about'), $image);
            #delete old image
            if(File::exists(public_path('images/about/'.$OldImage->image))) {
                File::delete(public_path('images/about/'.$OldImage->image));
            }
        }
        else
            $image=$OldImage->image;

        About::query()->update([
            'title' => $request->title,
            'description' => $request->description,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'description1' => $request->description1,
            'image'  => $image,
        ]);
        return redirect()->route('dashboard.about')->with('success','Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //

        $OldImage=About::query()->select('image')->first();
        File::delete(public_path('images/about/'.$OldImage->image));

        About::query()->first()->delete();
        return redirect()->back()->with('success','Data delete successfully!');
    }
}
