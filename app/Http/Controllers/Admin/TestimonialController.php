<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial = Testimonial::all();
        return view('admin.about.testimonial.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.about.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required',
            'title' =>'required',
            'comment' =>'required',
            'image' =>'required|image|mimes:png,jpg',
        ]);

        $image = null;
        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/testimonial'), $image);
        }

        Testimonial::query()->create([
            'name' => $request->name,
            'title' => $request->title,
            'comment' => $request->comment,
            'image' => $image
        ]);
        return redirect()->route('dashboard.testimonial.index')->with('success','Data added successfully!');
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
        $testimonial = Testimonial::find($id);
        // dd ($testimonial);
        return view('admin.about.testimonial.edit',compact('testimonial', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'title' =>'required',
            'comment' =>'required',
        ]);

        $testimonial = Testimonial::find($request->id);

        if(!empty($request->image))
        {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/testimonial'), $image);
            #delete old image
            if(File::exists(public_path('images/testimonial/'.$testimonial->image))) {
                File::delete(public_path('images/testimonial/'.$testimonial->image));
            }
        }
        else
            $image=$testimonial->image;
        
        $testimonial->update([
            'name' => $request->name,
            'title' => $request->title,
            'comment'    => $request->comment,
            'image'  => $image,
        ]);
        return redirect()->route('dashboard.testimonial.index')->with('success','Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Testimonial::query()->find($id);
        // dd ($data);
        File::delete(public_path('images/testimonial/'.$data->image));

        Testimonial::query()->find($id)->delete();
        return redirect()->back()->with('success','Data delete successfully!');
    }
}
