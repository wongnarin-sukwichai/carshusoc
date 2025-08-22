<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Cert;

class CertController extends Controller
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
        $data = Cert::where('enroll_id', $id)->get();

        return response()->json($data);
    }

    public function showCert()
    {
        $data = DB::table('enrolls')
            ->where('enrolls.user_id', Auth::user()->id)
            ->where('enrolls.status', '2')
            ->join('contents', 'enrolls.content_id', 'contents.id')
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'contents.title AS content_title',
                'contents.short_name',
                'sections.event_id',
                'sections.title',
                'users.email',
                'users.pic',
                'users.name',
                'users.surname'
            )
            ->orderBy('id', 'DESC')
            ->paginate(5);

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
