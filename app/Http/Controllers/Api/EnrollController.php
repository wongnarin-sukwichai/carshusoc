<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use App\Models\Enroll;
use App\Models\Work;
use App\Models\Payment;
use App\Models\Email;
use App\Models\User;
use App\Models\Content;

use App\Models\Section;

use App\Mail\EnrollMail;
use App\Mail\UploadMail;
use App\Mail\PaymentMail;

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

        dd($request->all());

        $data = new Enroll();

        $data->content_id = $request['content_id'];
        $data->section_id = $request['section_id'];
        if (!empty($request['course_id'])) {
            $data->course_id = $request['course_id'];
        }
        $data->title = $request['title'];
        if (!empty($request['start'])) {
            $data->start = $request['start'];
        }
        if (!empty($request['end'])) {
            $data->end = $request['end'];
        }
        $data->pay = $request['price'];
        $data->tag = $request['postage'];
        $data->user_id = Auth::user()->id;

        $data->save();

        $res = User::where('id', $data->user_id)->select('name', 'surname', 'email')->first();
        $result = Content::where('id', $data->content_id)->first()->title;
        $meet = Section::where('id', $data->section_id)->first()->meet;
        $code = (object) [
            'name'      => $res->name . ' ' . $res->surname,
            'content'     => $result,
            'title'        => $data->title,
            'start'       => Carbon::parse($data->start)->format('d/m/Y'),
            'end'      => Carbon::parse($data->end)->format('d/m/Y'),
            'meet'      => $meet
        ];
        // Mail::to($res->email)->send(new EnrollMail($code));

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

    public function chkPass()
    {
        $data = Enroll::where('content_id', 2)
            ->where('user_id', Auth::user()->id)
            ->where('certTrain', 1)
            ->select('section_id')
            ->get();

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

        $check = false;

        if (!empty($request['filename'])) {
            $res = new Work();

            $res->enroll_id = $request['id'];
            $res->title = $request['filename'];

            $res->save();

            $res = User::where('id', $request['user_id'])->select('name', 'surname', 'email')->first();
            $code = (object) [
                'name'      => $res->name . ' ' . $res->surname,
            ];
            Mail::to($res->email)->send(new UploadMail($code));
        }
        ////////////////////////////////////////////////////////////
        if (!empty($request['paymentname'])) {
            $result = new Payment();

            $result->enroll_id = $request['id'];
            $result->title = $request['paymentname'];

            $result->save();

            $check = true;

            $res = User::where('id', $request['user_id'])->select('name', 'surname', 'email')->first();
            $code = (object) [
                'name'      => $res->name . ' ' . $res->surname,
            ];
            Mail::to($res->email)->send(new PaymentMail($code));
        }

        $data = Enroll::find($id);

        $data->submit = Carbon::parse($request['submit'])->format('Y-m-d');
        $data->payment = $request['payment'];
        $data->work = $request['work'];
        $data->comment = $request['comment'];
        if ($request['slip'] == true) {
            $data->slip = 1;
        } else {
            $data->slip = null;
        }
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
