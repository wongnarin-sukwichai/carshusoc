<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Courses;
use App\Models\Section;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Courses();

        $data->section_id = $request['section_id'];
        $data->title = $request['title'];
        $data->price = $request['price'];
        $data->postage = $request['postage'];
        $data->other = $request['other'];

        $data->save();

        Section::where('id', $request['section_id'])->update([
            'course' => 1
        ]);

        return response()->json([
            'message' => 'Success!!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Courses::where('section_id', $id)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Courses::find($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        Courses::where('id', $id)->update([
            'title' => $request['title'],
            'price' => $request['price'],
            'postage' => $request['postage'],
            'other' => $request['other']
        ]);

        return response()->json([
            'message' => 'Success!!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
