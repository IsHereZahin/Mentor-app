<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\CoursesFeatures;
use Illuminate\Http\Request;

class CoursesFeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $course = Courses::find($id);

        // Load only the features for the specific course using where clause
        $coursesfeatures = CoursesFeatures::where('course_id', $id)->get();

        return view('admin.courses.feature.index', compact('id', 'coursesfeatures', 'course'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $course = Courses::query()->find($id);
        return view('admin.courses.feature.create', compact('id', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //
        $request->validate([
            'title'      => 'required|string',
            'name'       => 'required',
            'desc'       => 'required',
            'image'      => 'required|image|mimes:png,jpg,jpeg',
        ]);

        # image
        $image = null;
        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/course/feature'), $image);
        }

        # store
        CoursesFeatures::query()->create([
            'course_id' => $id,
            'title'     => $request->title,
            'name'      => $request->name,
            'desc'      => $request->desc,
            'image'     => $image,
        ]);

        $course = Courses::find($id);

        // Load only the features for the specific course using where clause
        $coursesfeatures = CoursesFeatures::where('course_id', $id)->get();

        return view('admin.courses.feature.index', compact('id', 'coursesfeatures', 'course'))->with('success','Feature added successfully!');
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
