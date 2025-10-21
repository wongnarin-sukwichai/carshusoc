<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use App\Models\Enroll;
use App\Models\Cert;
use App\Models\Canva;

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

    public function reportSearchTrain(Request $request)
    {
        $start = Carbon::parse($request['start'])->startOfDay();
        $end = Carbon::parse($request['end'])->startOfDay();

        $data = DB::table('enrolls')
            ->where('enrolls.section_id', $request['section_id'])
            ->whereBetween('enrolls.created_at', [$start, $end])
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.id',
                'enrolls.certTrain',
                'users.name',
                'users.surname'
            )
            ->orderBy('users.name', 'asc')
            ->get();

        return response()->json($data);
    }

    public function reportTrain(Request $request)
    {

        $data = Carbon::parse($request['send'])->format('Y-m-d');
        $res = Canva::where('section_id', $request['section_id'])
                ->orderBy('id', 'DESC')
                ->first()->id;

        foreach ($request['enrolls'] as $r) {
            Enroll::where('id', $r['id'])
                ->update([
                    'enddate' => $request['examdate'],
                    'send' => $data,
                    'certTrain' => $r['certTrain'],
                    'canva_id' => $res
                ]);
        }

        return response()->json([
            'message' => 'Success!!'
        ]);
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
