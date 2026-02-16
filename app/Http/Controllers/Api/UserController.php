<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        if (auth('sanctum')->check()) {
            return response()->json(auth('sanctum')->user());
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function userAdmin()
    {
        $data = User::where('level', 'admin')->get();

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
        $data = User::find($id);

        return response()->json([
            "message" => $data->name . ' ' . $data->surname
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

        $data = User::find($id);

        $data->name = $request['name'];
        $data->surname = $request['surname'];
        $data->firstname = $request['firstname'];
        $data->lastname = $request['lastname'];
        $data->born = Carbon::parse($request['born'])->format('Y-m-d');
        $data->gender = $request['gender'];
        $data->type = $request['type'];
        $data->degree = $request['degree'];
        $data->nation = $request['nation'];
        $data->ident = $request['ident'];
        $data->idcard = $request['idcard'];
        $data->tel = $request['tel'];
        $data->status = 1;

        if ($request['chgPass'] == true) {
            $data->password = Hash::make($request['pass']);
        }

        $data->save();

        return response()->json([
            'message' => 'Success!!'
        ]);
    }

    public function userPic(Request $request, string $id)
    {
        $data = User::find($id);

        $data->pic = $request['pic'];

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
