<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Content::all();

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
        $data = new Content();

        $data->pic = $request['pic'];
        $data->title = $request['title'];
        $data->short_name = $request['short_name'];
        $data->event_id = $request['event_id'];
        $data->detail = $request['detail'];
        $data->mission = $request['mission'];
        $data->scope = $request['scopr'];
        $data->facebook = $request['facebook'];
        $data->email = $request['email'];
        $data->website = $request['website'];
        $data->tel = $request['tel'];
        $data->owner = $request['owner'];
        $data->other = $request['other'];
        $data->created_by = Auth::user()->id;

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
        //
    }

    public function detail(string $id)
    {
        $data = Content::find($id);

        return response()->json($data);
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
