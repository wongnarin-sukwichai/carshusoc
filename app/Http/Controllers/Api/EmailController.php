<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Models\Email;
use App\Models\Section;
use App\Models\Enroll;

use App\Mail\WarnMail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Email::all();

        return response()->json($data);
    }

    public function warnMail()
    {
        $data = Section::where('content_id', '!=', 3)->get();

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
        //
    }

    public function sendWarnMail(Request $request)
    {
        $data = DB::table('enrolls')
            ->where('enrolls.section_id', $request['section_id'])
            ->whereBetween('enrolls.created_at', [$request['start'], $request['end']])
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select('email')
            ->get();

        $code = (object) [
            'title' => $request['title'],
            'old' => $request['old'],
            'new' => $request['new'],
            'meet' => $request['meet'],
            'examdate' => $request['examdate'],
            'examtime' => $request['examtime']
        ];

        foreach ($data as $r) {
            Mail::to($r->email)->send(new WarnMail($code));
        }
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
    public function edit(string $id)
    {
        $data = Email::find($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Email::find($id);

        $data->topic = $request['topic'];
        $data->th = $request['th'];
        $data->eng = $request['eng'];
        $data->owner = Auth::user()->name . " " . Auth::user()->surname;

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
