<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

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
