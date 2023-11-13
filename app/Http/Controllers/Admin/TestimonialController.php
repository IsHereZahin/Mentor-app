<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

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
        return view('admin.about.testimonial.edit',compact('testimonial', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' =>'required',
            'title' =>'required',
            'comment' =>'required',
        ]);



        #error there ------------------------------------------------------------------------------------------------   

        # image
        $OldImage=Testimonial::query()->select('image')->id();
        if(!empty($request->image))
        {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/testimonial'), $image);
            #delete old image
            if(File::exists(public_path('images/testimonial/'.$OldImage->image))) {
                File::delete(public_path('images/testimonial/'.$OldImage->image));
            }
        }
        else
            $image=$OldImage->image;

        testimonial::query()->update([
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
    public function destroy(string $id)
    {
        //
    }
}
