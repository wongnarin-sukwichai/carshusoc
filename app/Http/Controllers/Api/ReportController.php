<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function reportSearch(Request $request)
    {
        // dd($request->all());

        $data = DB::table('enrolls')
            ->where('enrolls.section_id', $request['section_id'])
            ->where('enrolls.start', $request['start'])
            ->where('enrolls.end', $request['end'])
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.id',
                'enrolls.cert',
                'users.name',
                'users.surname'
            )
            ->get();

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
