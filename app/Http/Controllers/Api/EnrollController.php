<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Enroll;
use App\Models\Work;
use App\Models\Payment;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('enrolls')
            ->join('contents', 'enrolls.content_id', 'contents.id')
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'contents.title AS content_title',
                'contents.short_name',
                'sections.event_id',
                'sections.title AS section_title',
                'sections.start',
                'sections.end',
                'sections.examdate',
                'sections.examtime',
                'sections.meet',
                'sections.postage',
                'sections.other AS section_other',
                'sections.alert',
                'sections.status AS section_status',
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

        $data = new Enroll();

        $data->content_id = $request['content_id'];
        $data->section_id = $request['section_id'];
        $data->pay = $request['price'];
        $data->tag = $request['postage'];
        $data->user_id = Auth::user()->id;

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
        $data = DB::table('enrolls')
            ->where('enrolls.id', $id)
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'sections.event_id',
                'sections.title',
                'sections.start',
                'sections.end',
                'sections.examdate',
                'sections.examtime',
                'sections.meet',
                'sections.other AS section_other',
                'sections.alert',
                'sections.status AS section_status',
                'users.name',
                'users.surname'
            )
            ->get();

        return response()->json($data);
    }

    public function detailEnroll(string $id)
    {
        $data = DB::table('enrolls')
            ->where('enrolls.id', $id)
            ->where('enrolls.user_id', Auth::user()->id)
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'sections.event_id',
                'sections.title',
                'sections.start',
                'sections.end',
                'sections.examdate',
                'sections.examtime',
                'sections.meet',
                'sections.other AS section_other',
                'sections.alert',
                'sections.status AS section_status',
                'users.name',
                'users.surname'
            )
            ->get();

        return response()->json($data);
    }

    public function showEnroll()
    {
        $data = DB::table('enrolls')
            ->where('enrolls.user_id', Auth::user()->id)
            ->join('contents', 'enrolls.content_id', 'contents.id')
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'contents.title AS content_title',
                'contents.short_name',
                'sections.event_id',
                'sections.title',
                'sections.start',
                'sections.end',
                'sections.examdate',
                'sections.examtime',
                'sections.meet',
                'sections.postage',
                'sections.other AS section_other',
                'sections.alert',
                'sections.status AS section_status',
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
        $data = DB::table('enrolls')
            ->where('enrolls.id', $id)
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'sections.event_id',
                'sections.title',
                'sections.start',
                'sections.end',
                'sections.examdate',
                'sections.examtime',
                'sections.meet',
                'sections.other AS section_other',
                'sections.alert',
                'sections.status AS section_status',
                'users.name',
                'users.surname'
            )
            ->get();

        return response()->json($data);
    }

    public function editEnroll(string $id)
    {
        $data = DB::table('enrolls')
            ->where('enrolls.id', $id)
            ->where('enrolls.user_id', Auth::user()->id)
            ->join('sections', 'enrolls.section_id', 'sections.id')
            ->join('users', 'enrolls.user_id', 'users.id')
            ->select(
                'enrolls.*',
                'sections.event_id',
                'sections.title',
                'sections.start',
                'sections.end',
                'sections.examdate',
                'sections.examtime',
                'sections.meet',
                'sections.other AS section_other',
                'sections.alert',
                'sections.status AS section_status',
                'users.name',
                'users.surname'
            )
            ->get();

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!empty($request['filename'])) {
            $res = new Work();

            $res->enroll_id = $request['id'];
            $res->title = $request['filename'];

            $res->save();
        }
        ////////////////////////////////////////////////////////////
        if (!empty($request['paymentname'])) {
            $result = new Payment();

            $result->enroll_id = $request['id'];
            $result->title = $request['paymentname'];

            $result->save();

            $check = true;
        }
        ////////////////////////////////////////////////////////////
        $data = Enroll::find($id);

        $data->submit = Carbon::parse($request['submit'])->format('Y-m-d');
        $data->payment = $request['payment'];
        $data->work = $request['work'];
        $data->comment = $request['comment'];
        if ($check == true) {
            $data->status = 1;
        }

        $data->save();

        return response()->json([
            'message' => 'Success!!'
        ]);
    }

    public function updateEnroll(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
