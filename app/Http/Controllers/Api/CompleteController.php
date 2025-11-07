<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Complete;
use App\Models\Enroll;
use App\Models\Cert;
use App\Models\Receipt;
use App\Models\User;
use App\Models\Email;

use App\Mail\SendMail;
use App\Mail\ThankMail;

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
        if (!empty($request['certname'])) {
            $res = new Cert();

            $res->enroll_id = $request['id'];
            $res->title = $request['certname'];
            $res->owner = Auth::user()->id;

            $res->save();
        }
        ////////////////////////////////////////////////////////////
        if (!empty($request['filename'])) {
            $result = new Complete();

            $result->enroll_id = $request['id'];
            $result->title = $request['filename'];
            $result->owner = Auth::user()->id;

            $result->save();
        }
        ////////////////////////////////////////////////////////////
        if (!empty($request['receiptname'])) {
            $result = new Receipt();

            $result->enroll_id = $request['id'];
            $result->title = $request['receiptname'];
            $result->owner = Auth::user()->id;

            $result->save();
        }
        ////////////////////////////////////////////////////////////

        if($request['status'] == 2) {

            $res = User::where('id', $request->user_id)->select('name', 'surname', 'email')->first();
            $code = (object) [
                'name'      => $res->name . ' ' . $res->surname,
            ];
            Mail::to($res->email)->send(new ThankMail($code));
        }

        ////////////////////////////////////////////////////////////
        $data = Enroll::find($request['id']);

        $data->cert = $request['cert'];
        $data->pay = $request['pay'];
        $data->tag = $request['tag'];
        $data->complete = $request['complete'];
        $data->other = $request['other'];
        $data->status = $request['status'];
        $data->alert = $request['alert'];
        $data->receipt = $request['receipt'];

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
