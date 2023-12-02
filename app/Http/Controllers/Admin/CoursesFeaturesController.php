<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\CoursesFeatures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $course = Courses::find($id);
        return view('admin.courses.feature.create', compact('id', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = null;
        if (!empty($request->image)) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/course/feature'), $image);
        }

        CoursesFeatures::create([
            'course_id' => $id,
            'title' => $request->title,
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $image,
        ]);

        $course = Courses::find($id);
        $coursesfeatures = CoursesFeatures::where('course_id', $id)->get();

        return view('admin.courses.feature.index', compact('id', 'coursesfeatures', 'course'))->with('success', 'Feature added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courseFeature = CoursesFeatures::findOrFail($id);
        $course = Courses::find($courseFeature->course_id);

        return view('admin.courses.feature.edit', compact('course', 'courseFeature', 'id'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'desc' => 'required',
        ]);

        $coursesfeature = CoursesFeatures::find($id);

        if (!$coursesfeature) {
            // Handle the case where the record is not found, e.g., redirect back with an error message.
            return redirect()->back()->with('error', 'Record not found.');
        }

        $image = $coursesfeature->image; // Default to the current image

        if (!empty($request->image)) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/course/feature/'), $image);

            if (File::exists(public_path('images/course/feature/' . $coursesfeature->image))) {
                File::delete(public_path('images/course/feature/' . $coursesfeature->image));
            }
        }

        $coursesfeature->update([
            'title' => $request->title,
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $image,
        ]);

        $course = Courses::find($coursesfeature->course_id);

        return redirect()->route('dashboard.coursesfeatures.index', ['id' => $course->id])->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Assuming you want to delete the feature
        $coursesfeature = CoursesFeatures::findOrFail($id);

        if (File::exists(public_path('images/course/feature/' . $coursesfeature->image))) {
            File::delete(public_path('images/course/feature/' . $coursesfeature->image));
        }

        $course = Courses::find($coursesfeature->course_id);
        $coursesfeature->delete();

        return redirect()->route('dashboard.coursesfeatures.index', ['id' => $course->id])->with('success', 'Feature deleted successfully!');
    }
}
