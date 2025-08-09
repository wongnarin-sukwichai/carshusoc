<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Enroll;
use App\Models\Section;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        $data = User::where('name', 'like', "%" . $request['search'] . "%")
            ->orWhere('surname', 'like', "%" . $request['search'] . "%")
            ->paginate(5);

        return response()->json($data);
    }

    public function searchEnroll(Request $request)
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
                'sections.status',
                'users.email',
                'users.pic',
                'users.name',
                'users.surname'
            )
            ->where('name', 'like', "%" . $request['search'] . "%")
            ->orWhere('surname', 'like', "%" . $request['search'] . "%")
            ->orderBy('id', 'DESC')
            ->paginate(1);

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function chkSearch(Request $request)
    {
        if ($request['chkAdmin'] == true && $request['chkMember'] == false) {

            $data = User::where('level', 'admin')->paginate(5);
        } else if ($request['chkAdmin'] == false && $request['chkMember'] == true) {

            $data = User::where('level', null)->paginate(5);
        } else {

            $data = User::paginate(5);
        }

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
