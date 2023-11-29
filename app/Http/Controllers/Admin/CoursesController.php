<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Trainers;
use Illuminate\Http\Request;

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
