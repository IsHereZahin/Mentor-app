<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Trainers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::query()->with(['totalFeature' => function ($query) {
            $query->select('course_id');
        }])->get();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = Trainers::query()->select('id','name','department')->get();
        return view('admin.courses.create',compact('trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'      => 'required|string',
            'name'          => 'required',
            'short_desc'    => 'required',
            'long_desc'     => 'required',
            'fee'           => 'required',
            'total_seat'    => 'required',
            'schedule'      => 'required',
            'trainer_id'    => 'required',
            'image'         => 'required|image|mimes:png,jpg,jpeg',
        ]);

        # image
        $image = null;
        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/course'), $image);
        }

        # data store
        Courses::query()->create([
            'category'      => $request->category,
            'name'          => $request->name,
            'short_desc'    => $request->short_desc,
            'long_desc'     => $request->long_desc,
            'fee'           => $request->fee,
            'total_seat'    => $request->total_seat,
            'schedule'      => $request->schedule,
            'trainer_id'    => $request->trainer_id,
            'image'         => $image,
        ]);

        # message
        return redirect()->route('dashboard.courses.index')->with('success','Data added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $course = Courses::query()->with('feature')->find($id);
        return view('admin.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Courses::findOrFail($id);
        $trainer = Trainers::select('id', 'name', 'department')->get();

        return view('admin.courses.edit', compact('course', 'trainer'));
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'category'      => 'required|string',
    //         'name'          => 'required',
    //         'short_desc'    => 'required',
    //         'long_desc'     => 'required',
    //         'fee'           => 'required',
    //         'total_seat'    => 'required',
    //         'schedule'      => 'required',
    //         'trainer_id'    => 'required',
    //     ]);

    //     $course = Courses::findOrFail($id);

    //     $image = $course->image; // Keep the old image by default

    //     if ($request->hasFile('image') && $request->file('image')->isValid()) {
    //         // Process the image only if it's present and valid
    //         $image = time().'.'.$request->image->getClientOriginalExtension();
    //         $request->image->move(public_path('images/course'), $image);

    //         // Delete the old image after successfully moving the new one
    //         if (File::exists(public_path('images/course/' . $course->image))) {
    //             File::delete(public_path('images/course/' . $course->image));
    //         }
    //     }

    //     $course->update($request->only([
    //         'category', 'name', 'short_desc', 'long_desc', 'fee', 'total_seat', 'schedule', 'trainer_id'
    //     ]) + ['image' => $image]);

    //     return redirect()->route('dashboard.courses.index')->with('success', 'Data updated successfully!');
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category'      => 'required|string',
            'name'          => 'required',
            'short_desc'    => 'required',
            'long_desc'     => 'required',
            'fee'           => 'required',
            'total_seat'    => 'required',
            'schedule'      => 'required',
            'trainer_id'    => 'required',
        ]);

        $course = Courses::find($request->id);

        if(!empty($request->image))
        {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/course'), $image);
            #delete old image
            if(File::exists(public_path('images/course/'.$course->image))) {
                File::delete(public_path('images/course/'.$course->image));
            }
        }
        else
            $image=$course->image;

        $course->update([
            'category' => $request->category,
            'name' => $request->name,
            'short_desc'    => $request->short_desc,
            'long_desc'    => $request->long_desc,
            'fee'    => $request->fee,
            'total_seat'    => $request->total_seat,
            'schedule'    => $request->schedule,
            'trainer_id'    => $request->trainer_id,
            'image'  => $image,
        ]);
        return redirect()->route('dashboard.courses.index')->with('success','Data updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $course = Courses::findOrFail($id);

        // Delete all features associated with the course
        $course->features()->delete();

        // Delete the course image file (if any)
        if (!empty($course->image)) {
            $imagePath = public_path('images/course/') . $course->image;

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete the course
        $course->delete();

        return redirect()->route('dashboard.courses.index')->with('success', 'Course and associated features deleted successfully!');
    }

}
