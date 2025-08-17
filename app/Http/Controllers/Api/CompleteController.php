<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Complete;
use App\Models\Enroll;

class CompleteController extends Controller
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
        if (!empty($request['filename'])) {
            $res = new Complete();

            $res->enroll_id = $request['id'];
            $res->title = $request['filename'];
            $res->owner = Auth::user()->id;

            $res->save();
        }
        ////////////////////////////////////////////////////////////
        $data = Enroll::find($request['id']);

        $data->pay = $request['pay'];
        $data->tag = $request['tag'];
        $data->complete = $request['complete'];
        $data->other = $request['other'];
        $data->status = $request['status'];
        $data->alert = $request['alert'];

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
        $data = Complete::where('enroll_id', $id)->get();

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
