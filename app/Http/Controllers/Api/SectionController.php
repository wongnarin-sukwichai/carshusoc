<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = Section::all();
        //ชั่วคราว
        $data = Section::where('mode', null)->get();

        return response()->json($data);
    }

    public function sectionTrain()
    {
        $data = Section::where('content_id', 2)->get();

        return response()->json($data);
    }

    public function sectionTest()
    {
        $data = Section::where('content_id', 1)->get();

        return response()->json($data);
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
        $data = new Section();

        $data->content_id = $request['content_id'];
        $data->event_id = $request['event_id'];
        $data->title = $request['title'];
        if (!empty($request['start'])) {
            $data->start = Carbon::parse($request['start'])->format('Y-m-d');
        }
        if (!empty($request['end'])) {
            $data->end = Carbon::parse($request['end'])->format('Y-m-d');
        }
        if (!empty($request['examdate'])) {
            $data->examdate = Carbon::parse($request['examdate'])->format('Y-m-d');
        }
        $data->examtime = $request['examtime'];
        $data->meet = $request['meet'];
        $data->price = $request['price'];
        $data->postage = $request['postage'];
        $data->other = $request['other'];
        $data->created = Auth::user()->id;

        $data->save();

        return response()->json([
            'message' => 'Success!!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$data = Section::where('content_id', $id)->get();
        //ชั่วคราว
        $data = Section::where('content_id', $id)->where('mode', null)->get();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Section::find($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Section::find($id);

        $data->content_id = $request['content_id'];
        $data->event_id = $request['event_id'];
        $data->title = $request['title'];
        if (!empty($request['start'])) {
            $data->start = Carbon::parse($request['start'])->format('Y-m-d');
        }
        if (!empty($request['end'])) {
            $data->end = Carbon::parse($request['end'])->format('Y-m-d');
        }
        if (!empty($request['examdate'])) {
            $data->examdate = Carbon::parse($request['examdate'])->format('Y-m-d');
        }
        $data->examtime = $request['examtime'];
        $data->meet = $request['meet'];
        $data->price = $request['price'];
        $data->postage = $request['postage'];
        $data->other = $request['other'];
        $data->created = Auth::user()->id;

        $data->save();

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
