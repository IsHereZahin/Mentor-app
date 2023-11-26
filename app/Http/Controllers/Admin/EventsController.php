<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events =  Events::query()->get();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'       => 'required',
            'time'        => 'required',
            'image'       => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);

        $image = null;
        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/events'), $image);
        }

        Events::query()->create([
            'title' => $request->title,
            'time'  => $request->time,
            'image' => $image,
            'description' => $request->description,
        ]);
        return redirect()->route('dashboard.event.index')->with('success','Data added successfully!');
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
        $event = Events::find($id);

        return view('admin.event.edit', compact( 'event', 'id'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'title'       => 'required',
            'time'        => 'required',
            'description' => 'required',
        ]);

        $event = Events::find($request->id);

        if(!empty($request->image)){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/events'), $image);

            #delete old image
            if(File::exists(public_path('images/events/'.$event->image))) {
                File::delete(public_path('images/events/'.$event->image));
            }
        }
        else
        $image = $event->image;

        $event->update([
            'title' => $request->title,
            'time'  => $request->time,
            'image' => $image,
            'description' => $request->description,
        ]);
        return redirect()->route('dashboard.event.index')->with('success','Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Events::query()->find($id);
        File::delete(public_path('images/events/' . $data->image));

        Events::query()->find($id)->delete();

        return redirect()->back()->with('success', 'Data deleted successfully!');
    }
}
